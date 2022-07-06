<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Image;
use App\Models\AssetMaintenance;
use App\Http\Controllers\Controller;
use Input;
use Lang;
use App\Models\CostCentre;
use Redirect;
use App\Models\Setting;
use Str;
use View;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ImageUploadRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Transformers\SelectlistTransformer;


/**
 * This controller handles all actions related to Suppliers for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class CostCentreController extends Controller
{
    /**
     * Show a list of all Cost
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Grab all the suppliers
       $this->authorize('view', CostCentre::class);

        // Show the page
        return view('costcentres/index');
    }


    /**
     * Supplier create.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {

        $this->authorize('create', CostCentre::class);

        // Show the page
        return view('costcentres/edit')->with('item', new CostCentre);

        // if ($request->has('model_id')) {
        //     $selected_model = AssetModel::find($request->input('model_id'));
        //     $view->with('selected_model', $selected_model);
        // }
        // return $view;

        // $this->authorize('create', CostCentre::class);
        // return view('costcentre/edit')->with('item', new CostCentre);
    }


    /**
     * Supplier create form processing.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('create', CostCentre::class);
        // Create a new cost
        $costcentre = new CostCentre();
        // Save the location data
        $costcentre->costcode           = $request->input('costcode');
        $costcentre->dept_id            = $request->input('dept_id');
        $costcentre->note               = $request->input('note');       
        $costcentre->created_id         = Auth::id();
        $costcentre->modified_id         = Auth::id();


    
        if ($costcentre->save()) {
            return redirect()->route('costcentres.index')->with('success', trans('admin/costcentres/message.create.success'));
        }
        return redirect()->back()->withInput()->withErrors($costcentre->getErrors());
    }

    /**
     * Supplier update.
     *
     * @param  int  $Id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($costcentreId = null)
    {
        if (is_null($item = CostCentre::find($costcentreId))) {
            // Redirect to the blogs management page
            return redirect()->route('costcentres.index')->with('error', trans('admin/costcentres/message.does_not_exist'));
        }

        $this->authorize('update', $item);

        return view('costcentres/edit', compact('item'));
    }


   /**
     * Validates and stores the updated depreciation data.
     *
     * @author [A. Gianotto] [<snipe@snipe.net]
     * @see DepreciationsController::getEdit()
     * @param Request $request
     * @param int $costcentreId
     * @return \Illuminate\Http\RedirectResponse
     * @since [v1.0]
     */
    public function update(Request $request, $costcentreId = null)
    {
        // Check if the depreciation exists
        if (is_null($costcentre = CostCentre::find($costcentreId))) {
            // Redirect to the blogs management page
            return redirect()->route('costcentres.index')->with('error', trans('admin/costcentres/message.does_not_exist'));
        }

        $this->authorize('update', $costcentre);

        // Depreciation data
        $costcentre->costcode           = $request->input('costcode');
        $costcentre->dept_id            = $request->input('dept_id');
        $costcentre->note               = $request->input('note');
        $costcentre->created_id         = Auth::id();
        $costcentre->modified_id         = Auth::id();        
       

        // Was the asset created?
        if ($costcentre->save()) {
            // Redirect to the depreciation page
            return redirect()->route("costcentres.index")->with('success', trans('admin/costcentres/message.update.success'));
        }
        return redirect()->back()->withInput()->withErrors($costcentre->getErrors());
    }


    /**
     * Validates and deletes a selected depreciation.
     *
     * This is a hard-delete. We do not currently soft-delete depreciations.
     *
     * @author [A. Gianotto] [<snipe@snipe.net]
     * @since [v1.0]
     * @param integer $costcentreId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($costcentreId)
    {
        // Check if the depreciation exists
        if (is_null($costcentre = CostCentre::find($costcentreId))) {
            return redirect()->route('costcentres.index')->with('error', trans('admin/costcentres/message.not_found'));
        }

        $this->authorize('delete', $costcentre);

        if ($costcentre->has_models() > 0) {
            // Redirect to the asset management page
            return redirect()->route('costcentres.index')->with('error', trans('admin/costcentres/message.assoc_users'));
        }

        $costcentre->delete();
        // Redirect to the depreciations management page
        return redirect()->route('costcentres.index')->with('success', trans('admin/costcentres/message.delete.success'));
    }


    /**
     * Gets a paginated collection for the select2 menus
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0.16]
     * @see \App\Http\Transformers\SelectlistTransformer
     *
     */
    public function selectlist(Request $request)
    {

        $costcentres = CostCentre::select([
            'id',
            'costcode',
            'dept_id',
            'note',
        ]);

        if ($request->has('search')) {
            $costcentres = $costcentres->where('costcentres.costcode', 'LIKE', '%'.$request->get('search').'%');
        }

        $costcentres = $costcentres->orderBy('costcode', 'ASC')->paginate(50);

        // Loop through and set some custom properties for the transformer to use.
        // This lets us have more flexibility in special cases like assets, where
        // they may not have a ->name value but we want to display something anyway
        foreach ($costcentres as $costcentre) {
            $costcentre->use_text = $costcentres->costcode;
            $costcentre->use_text = $costcentres->dept_id;
            $costcentre->use_text = $costcentres->note;
        }

        return (new SelectlistTransformer)->transformSelectlist($costcentres);

    }


/**
     *  Get the asset information to present to the supplier view page
     *
     * @param null $costcentreId
     * @return \Illuminate\Contracts\View\View
     * @internal param int $assetId
     */
    public function show($costcentreId = null)
    {
        $costcentre = CostCentre::find($costcentreId);

        if (isset($costcentre->id)) {
                return view('costcentres/view', compact('costcentre'));
        }
        // Prepare the error message
        $error = trans('admin/costcentres/message.does_not_exist', compact('id'));

        // Redirect to the user management page
        return redirect()->route('costcentres.index')->with('error', $error);
    }


}
