<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\CostCentre;
use App\Http\Transformers\CostCentreTransformer;
use App\Http\Transformers\SelectlistTransformer;

class CostCentresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0]
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', CostCentre::class);
        $allowed_columns = ['id','costcode','created_at'];

        $costcentres = CostCentre::select('id','costcode','dept_id','note','created_at','updated_at');

        if ($request->has('search')) {
            $costcentres = $costcentres->TextSearch($request->input('search'));
        }

        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 50);
        $order = $request->input('order') === 'asc' ? 'asc' : 'desc';
        $sort = in_array($request->input('sort'), $allowed_columns) ? $request->input('sort') : 'created_at';
        $costcentres->orderBy($sort, $order);

        $total = $costcentres->count();
        $costcentres = $costcentres->skip($offset)->take($limit)->get();
        return (new CostCentreTransformer)->transformCostCentres($costcentres, $total);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0]
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', CostCentre::class);
        $costcentre = new CostCentre;
        $costcentre->fill($request->all());

        if ($costcentre->save()) {
            return response()->json(Helper::formatStandardApiResponse('success', $costcentre, trans('admin/costcentres/message.create.success')));
        }
        return response()->json(Helper::formatStandardApiResponse('error', null, $costcentre->getErrors()));

    }

    /**
     * Display the specified resource.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', CostCentre::class);
        $costcentre = CostCentre::findOrFail($id);
        return (new CostCentreTransformer)->transformCostCentre($costcentre);
    }


    /**
     * Update the specified resource in storage.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0]
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Depreciation::class);
        $depreciation = Depreciation::findOrFail($id);
        $depreciation->fill($request->all());

        if ($depreciation->save()) {
            return response()->json(Helper::formatStandardApiResponse('success', $depreciation, trans('admin/depreciations/message.update.success')));
        }

        return response()->json(Helper::formatStandardApiResponse('error', null, $depreciation->getErrors()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Depreciation::class);
        $depreciation = Depreciation::findOrFail($id);
        $this->authorize('delete', $depreciation);

        if ($depreciation->has_models() > 0) {
            return response()->json(Helper::formatStandardApiResponse('error', trans('admin/depreciations/message.assoc_users')));
        }

        $depreciation->delete();
        return response()->json(Helper::formatStandardApiResponse('success', null,  trans('admin/depreciations/message.delete.success')));

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
            $costcentre->use_text = $costcentre->costcode;
            $costcentre->use_text = $costcentre->dept_id;
            $costcentre->use_text = $costcentre->note;
            
        }

        return (new SelectlistTransformer)->transformSelectlist($costcentres);

    }



}
