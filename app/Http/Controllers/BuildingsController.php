<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Buildings;
use App\Models\Company;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Config;
use DB;
use Gate;
use Input;
use Lang;
use Redirect;
use Illuminate\Http\Request;
use Slack;
use Str;
use View;
use Image;
use App\Http\Requests\ImageUploadRequest;

/** This controller handles all actions related to buildings for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class BuildingsController extends Controller
{

    /**
    * Returns a view that invokes the ajax tables which actually contains
    * the content for the buildings listing, which is generated in getDatatable.
    *
    * @author [A. Gianotto] [<snipe@snipe.net>]
    * @see buildingsController::getDatatable() method that generates the JSON response
    * @since [v1.0]
    * @return View
    */
    public function index(Request $request)
    {
        $this->authorize('index', Buildings::class);
        return view('buildings/index');
    }


  /**
   * Returns a view with a form to create a new Buildings.
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @return View
   */
    public function create(Request $request)
    {
        $this->authorize('create', Buildings::class);
        $category_type = 'buildings';
        return view('buildings/edit')->with('category_type', $category_type)
          ->with('item', new Buildings);
    }


  /**
   * Validate and save new buildings from form post
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @return Redirect
   */
    public function store(ImageUploadRequest $request)
    {
        $this->authorize(Buildings::class);
        // create a new model instance
        $buildings = new Buildings();

        // Update the buildings data
        $buildings->name                = request('name');
        $buildings->category_id         = request('category_id');        
        $buildings->stock_holder_code   = request('stock_holder_code');    
        $buildings->company_id          = Company::getIdForCurrentUser(request('company_id'));
        $buildings->description         = request('description');
        $buildings->revenue_village     = request('revenue_village');
        $buildings->length              = request('length');
        $buildings->breadth             = request('breadth');
        $buildings->dimension           = request('dimension');
        $buildings->no_of_floor         = request('no_of_floor');
        $buildings->year_of_acquisition = request('year_of_acquisition');
        $buildings->improvement         = request('improvement'); 
        $buildings->total_cost          = Helper::ParseFloat(request('total_cost')); 
        $buildings->life_of_assets      = request('life_of_assets');
        $buildings->no_of_years_assets_use         = request('no_of_years_assets_use'); 
        $buildings->remaining_life      = request('remaining_life');
        $buildings->rate_of_depreciation       = Helper::ParseFloat(request('rate_of_depreciation'));
        $buildings->currunt_use_of_building = request('currunt_use_of_building');       
        $buildings->purchase_date           = request('purchase_date');
        $buildings->remarks   = request('remarks');    
        $buildings->user_id                 = Auth::user()->id;        

        if ($request->hasFile('image')) {

            if (!config('app.lock_passwords')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $file_name = "buildings-".str_random(18).'.'.$ext;
                $path = public_path('/uploads/infrastructures');
                if ($image->getClientOriginalExtension()!='svg') {
                    Image::make($image->getRealPath())->resize(null, 250, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($path.'/'.$file_name);
                } else {
                    $image->move($path, $file_name);
                }
                $buildings->image = $file_name;
            }
        }



        // Was the buildings created?
        if ($buildings->save()) {
            // Redirect to the new buildings  page
            return redirect()->route('buildings.index')->with('success', trans('admin/buildings/message.create.success'));
        }
        return redirect()->back()->withInput()->withErrors($buildings->getErrors());
    }

  /**
   * Return view for the buildings update form, prepopulated with existing data
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $buildingsId
   * @return View
   */
    public function edit(Request $request, $buildingsId = null)
    {

        if ($item = Buildings::find($buildingsId)) {
            $this->authorize($item);
            $category_type = 'buildings';
            return view('buildings/edit', compact('item'))->with('category_type', $category_type);
        }

        return redirect()->route('buildings.index')->with('error', trans('admin/buildings/message.does_not_exist'));

    }


  /**
   * Save edited buildings from form post
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $buildingsId
   * @return Redirect
   */
    public function update(ImageUploadRequest $request, $buildingsId = null)
    {
        if (is_null($buildings = Buildings::find($buildingsId))) {
            return redirect()->route('buildings.index')->with('error', trans('admin/buildings/message.does_not_exist'));
        }

        $this->authorize($buildings);

        // Update the buildings data
        $buildings->name                = request('name');
        $buildings->category_id         = request('category_id');        
        $buildings->stock_holder_code   = request('stock_holder_code');    
        $buildings->company_id          = Company::getIdForCurrentUser(request('company_id'));
        $buildings->description         = request('description');
        $buildings->revenue_village     = request('revenue_village');
        $buildings->length              = request('length');
        $buildings->breadth             = request('breadth');
        $buildings->dimension           = request('dimension');
        $buildings->no_of_floor         = request('no_of_floor');
        $buildings->year_of_acquisition = request('year_of_acquisition');
        $buildings->improvement         = request('improvement'); 
        $buildings->total_cost          = Helper::ParseFloat(request('total_cost')); 
        $buildings->life_of_assets      = request('life_of_assets');
        $buildings->no_of_years_assets_use         = request('no_of_years_assets_use'); 
        $buildings->remaining_life      = request('remaining_life');
        $buildings->rate_of_depreciation       = Helper::ParseFloat(request('rate_of_depreciation'));
        $buildings->currunt_use_of_building = request('currunt_use_of_building');       
        $buildings->purchase_date           = request('purchase_date');    
        $buildings->remarks                 = request('remarks'); 

        if ($request->hasFile('image')) {

            if (!config('app.lock_passwords')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $file_name = "buildings-".str_random(18).'.'.$ext;
                $path = public_path('/uploads/infrastructures');
                if ($image->getClientOriginalExtension()!='svg') {
                    Image::make($image->getRealPath())->resize(null, 250, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($path.'/'.$file_name);
                } else {
                    $image->move($path, $file_name);
                }
                if (($buildings->image) && (file_exists($path.'/'.$buildings->image))) {
                    unlink($path.'/'.$buildings->image);
                }

                $buildings->image = $file_name;
            }
        }


        // Was the buildings updated?
        if ($buildings->save()) {
            return redirect()->route('buildings.index')->with('success', trans('admin/buildings/message.update.success'));
        }
        return redirect()->back()->withInput()->withErrors($buildings->getErrors());
    }

  /**
   * Delete the given buildings.
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $buildingsId
   * @return Redirect
   */
    public function destroy(Request $request, $buildingsId)
    {
        if (is_null($buildings = Buildings::find($buildingsId))) {
            return redirect()->route('buildings.index')->with('error', trans('admin/buildings/message.not_found'));
        }

        $this->authorize($buildings);


        if ($buildings->hasUsers() > 0) {
             return redirect()->route('buildings.index')->with('error', trans('admin/buildings/message.assoc_users', array('count'=> $buildings->hasUsers())));
        }
        $buildings->delete();
        return redirect()->route('buildings.index')->with('success', trans('admin/buildings/message.delete.success'));
    }



  /**
  * Returns a view that invokes the ajax table which  contains
  * the content for the buildings detail view, which is generated in getDataView.
  *
  * @author [A. Gianotto] [<snipe@snipe.net>]
  * @param  int  $buildingsId
  * @see BuildingsController::getDataView() method that generates the JSON response
  * @since [v1.0]
  * @return View
  */
    public function show(Request $request, $buildingsId = null)
    {
        $buildings = Buildings::find($buildingsId);
        $this->authorize('view', $buildings);
        if (isset($buildings->id)) {
            return view('buildings/view', compact('buildings'));
        }
        return redirect()->route('buildings.index')->with('error', trans('admin/buildings/message.does_not_exist', compact('id')));
    }

}
