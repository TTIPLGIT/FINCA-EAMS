<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Furnitures;
use App\Http\Transformers\FurnituresTransformer;
use App\Models\Company;


class FurnituresController extends Controller
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
        $this->authorize('view', Furnitures::class);
        $allowed_columns = ['id','name','model_number','eol','notes','created_at','min_amt','company_id'];

        $furnitures = Furnitures::with('category', 'company', 'manufacturer', 'users', 'location');

        if ($request->has('search')) {
            $furnitures = $furnitures->TextSearch($request->input('search'));
        }

        if ($request->has('company_id')) {
            $furnitures->where('company_id','=',$request->input('company_id'));
        }

        if ($request->has('category_id')) {
            $furnitures->where('category_id','=',$request->input('category_id'));
        }

        if ($request->has('manufacturer_id')) {
            $furnitures->where('manufacturer_id','=',$request->input('manufacturer_id'));
        }

        if ($request->has('supplier_id')) {
            $furnitures->where('supplier_id','=',$request->input('supplier_id'));
        }

        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 50);
        $order = $request->input('order') === 'asc' ? 'asc' : 'desc';
        $sort = in_array($request->input('sort'), $allowed_columns) ? $request->input('sort') : 'created_at';

        switch ($sort) {
            case 'category':
                $furnitures = $furnitures->OrderCategory($order);
                break;
            case 'company':
                $furnitures = $furnitures->OrderCompany($order);
                break;
            default:
                $furnitures = $furnitures->orderBy($sort, $order);
                break;
        }

        $furnitures->orderBy($sort, $order);

        $total = $furnitures->count();
        $furnitures = $furnitures->skip($offset)->take($limit)->get();
        return (new FurnituresTransformer)->transformFurnitures($furnitures, $total);
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
        $this->authorize('create', Furnitures::class);
        $furnitures = new Furnitures;
        $furnitures->fill($request->all());

        if ($furnitures->save()) {
            return response()->json(Helper::formatStandardApiResponse('success', $furnitures, trans('admin/furnitures/message.create.success')));
        }
        return response()->json(Helper::formatStandardApiResponse('error', null, $furnitures->getErrors()));

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
        $this->authorize('view', Furnitures::class);
        $furnitures = Furnitures::findOrFail($id);
        return (new FurnituresTransformer)->transformFurnitures($furnitures);
    }


    /**
     * Display the specified resource.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function furnitures_detail($id)
    {
        $this->authorize('view', Furnitures::class);
        $furnitures = Furnitures::findOrFail($id);
        return (new FurnituresTransformer)->transformFurnitures($furnitures);
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
        $this->authorize('view', Furnitures::class);

        $furnitures = Furnitures::findOrFail($id);
        if (!Company::isCurrentUserHasAccess($furnitures)) {
            return ['total' => 0, 'rows' => []];
        }
        $furnitures_users = $furnitures->users;
        $total = $furnitures_users->count();

        return (new FurnituresTransformer)->transformCheckedoutFurnitures($furnitures_users, $total);
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
        $this->authorize('edit', Furnitures::class);
        $furnitures = Furnitures::findOrFail($id);
        $furnitures->fill($request->all());

        if ($furnitures->save()) {
            return response()->json(Helper::formatStandardApiResponse('success', $furnitures, trans('admin/furnitures/message.update.success')));
        }

        return response()->json(Helper::formatStandardApiResponse('error', null, $furnitures->getErrors()));
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
        $this->authorize('delete', Furnitures::class);
        $furnitures = Furnitures::findOrFail($id);
        $this->authorize($furnitures);

        if ($furnitures->hasUsers() > 0) {
            return response()->json(Helper::formatStandardApiResponse('error', null,  trans('admin/furnitures/message.assoc_users', array('count'=> $furnitures->hasUsers()))));
        }

        $furnitures->delete();
        return response()->json(Helper::formatStandardApiResponse('success', null,  trans('admin/furnitures/message.delete.success')));

    }
}
