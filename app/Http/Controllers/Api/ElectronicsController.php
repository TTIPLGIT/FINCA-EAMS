<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Electronics;
use App\Http\Transformers\ElectronicsTransformer;
use App\Models\Company;


class ElectronicsController extends Controller
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
        $this->authorize('view', Electronics::class);
        $allowed_columns = ['id','name','model_number','eol','notes','created_at','min_amt','company_id'];

        $electronics = Electronics::with('category', 'company', 'manufacturer', 'users', 'location');

        if ($request->has('search')) {
            $electronics = $electronics->TextSearch($request->input('search'));
        }

        if ($request->has('company_id')) {
            $electronics->where('company_id','=',$request->input('company_id'));
        }

        if ($request->has('category_id')) {
            $electronics->where('category_id','=',$request->input('category_id'));
        }

        if ($request->has('manufacturer_id')) {
            $electronics->where('manufacturer_id','=',$request->input('manufacturer_id'));
        }

        if ($request->has('supplier_id')) {
            $electronics->where('supplier_id','=',$request->input('supplier_id'));
        }

        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 50);
        $order = $request->input('order') === 'asc' ? 'asc' : 'desc';
        $sort = in_array($request->input('sort'), $allowed_columns) ? $request->input('sort') : 'created_at';

        switch ($sort) {
            case 'category':
                $electronics = $electronics->OrderCategory($order);
                break;
            case 'company':
                $electronics = $electronics->OrderCompany($order);
                break;
            default:
                $electronics = $electronics->orderBy($sort, $order);
                break;
        }

        $electronics->orderBy($sort, $order);

        $total = $electronics->count();
        $electronics = $electronics->skip($offset)->take($limit)->get();
        return (new ElectronicsTransformer)->transformElectronics($electronics, $total);
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
        $this->authorize('create', Electronics::class);
        $electronic = new Electronics;
        $electronic->fill($request->all());

        if ($electronic->save()) {
            return response()->json(Helper::formatStandardApiResponse('success', $electronic, trans('admin/electronics/message.create.success')));
        }
        return response()->json(Helper::formatStandardApiResponse('error', null, $electronic->getErrors()));

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
        $this->authorize('view', Electronics::class);
        $electronic = Electronics::findOrFail($id);
        return (new ElectronicsTransformer)->transformElectronics($electronic);
    }


    /**
     * Display the specified resource.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function electronic_detail($id)
    {
        $this->authorize('view', Electronics::class);
        $electronic = Electronics::findOrFail($id);
        return (new ElectronicsTransformer)->transformElectronics($electronic);
    }


    /**
     * Display the specified resource.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkedout($id)
    {
        $this->authorize('view', Electronics::class);

        $electronics = Electronics::findOrFail($id);
        if (!Company::isCurrentUserHasAccess($electronics)) {
            return ['total' => 0, 'rows' => []];
        }
        $electronics_users = $electronics->users;
        $total = $electronics_users->count();

        return (new ElectronicsTransformer)->transformCheckedoutElectronics($electronics_users, $total);
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
        $this->authorize('edit', Electronics::class);
        $electronics = Electronics::findOrFail($id);
        $electronics->fill($request->all());

        if ($electronics->save()) {
            return response()->json(Helper::formatStandardApiResponse('success', $electronics, trans('admin/electronics/message.update.success')));
        }

        return response()->json(Helper::formatStandardApiResponse('error', null, $electronics->getErrors()));
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
        $this->authorize('delete', Electronics::class);
        $electronics = Electronics::findOrFail($id);
        $this->authorize($electronics);

        if ($electronics->hasUsers() > 0) {
            return response()->json(Helper::formatStandardApiResponse('error', null,  trans('admin/electronics/message.assoc_users', array('count'=> $electronics->hasUsers()))));
        }

        $electronics->delete();
        return response()->json(Helper::formatStandardApiResponse('success', null,  trans('admin/electronics/message.delete.success')));

    }
}
