<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Buildings;
use App\Http\Transformers\BuildingsTransformer;
use App\Models\Company;


class BuildingsController extends Controller
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
        $this->authorize('view', Buildings::class);
        $allowed_columns = ['id','name','stock_holder_code','description','no_of_floor','created_at','company_id'];

        $buildings = Buildings::with('category', 'company', 'users');

        if ($request->has('search')) {
            $buildings = $buildings->TextSearch($request->input('search'));
        }

        if ($request->has('company_id')) {
            $buildings->where('company_id','=',$request->input('company_id'));
        }

        if ($request->has('category_id')) {
            $buildings->where('category_id','=',$request->input('category_id'));
        }        

      

        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 50);
        $order = $request->input('order') === 'asc' ? 'asc' : 'desc';
        $sort = in_array($request->input('sort'), $allowed_columns) ? $request->input('sort') : 'created_at';

        switch ($sort) {
            case 'category':
                $buildings = $buildings->OrderCategory($order);
                break;
            case 'company':
                $buildings = $buildings->OrderCompany($order);
                break;
            default:
                $buildings = $buildings->orderBy($sort, $order);
                break;
        }

        $buildings->orderBy($sort, $order);

        $total = $buildings->count();
        $buildings = $buildings->skip($offset)->take($limit)->get();
        return (new BuildingsTransformer)->transformBuildings($buildings, $total);
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
        $this->authorize('create', Buildings::class);
        $buildings = new Buildings;
        $buildings->fill($request->all());

        if ($buildings->save()) {
            return response()->json(Helper::formatStandardApiResponse('success', $buildings, trans('admin/buildings/message.create.success')));
        }
        return response()->json(Helper::formatStandardApiResponse('error', null, $buildings->getErrors()));

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
        $this->authorize('view', Buildings::class);
        $buildings = Buildings::findOrFail($id);
        return (new BuildingsTransformer)->transformBuilding($buildings);
    }


    /**
     * Display the specified resource.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buildings_detail($id)
    {
        $this->authorize('view', Buildings::class);
        $buildings = Buildings::findOrFail($id);
        return (new BuildingsTransformer)->transformBuilding($buildings);
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
        $this->authorize('edit', Buildings::class);
        $buildings = Buildings::findOrFail($id);
        $buildings->fill($request->all());

        if ($buildings->save()) {
            return response()->json(Helper::formatStandardApiResponse('success', $buildings, 
                trans('admin/buildings/message.update.success')));
        }

        return response()->json(Helper::formatStandardApiResponse('error', null, $buildings->getErrors()));
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
        $this->authorize('delete', Buildings::class);
        $buildings = Buildings::findOrFail($id);
        $this->authorize($buildings);

        if ($buildings->hasUsers() > 0) {
            return response()->json(Helper::formatStandardApiResponse('error', null,  trans('admin/buildings/message.assoc_users', array('count'=> $buildings->hasUsers()))));
        }

        $buildings->delete();
        return response()->json(Helper::formatStandardApiResponse('success', null,  trans('admin/buildings/message.delete.success')));

    }
}
