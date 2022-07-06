<?php
namespace App\Http\Transformers;

use App\Models\Furnitures;
use Gate;
use Illuminate\Database\Eloquent\Collection;
use App\Helpers\Helper;

class FurnituresTransformer
{

    public function transformFurnitures (Collection $furnitures, $total)
    {
        $array = array();
        foreach ($furnitures as $furniture) {
            $array[] = self::transformFurniture($furniture);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformFurniture (Furnitures $furniture)
    {
        $array = [
            'id' => $furniture->id,
            'name' => e($furniture->name),
            'company' => ($furniture->company) ? ['id' => $furniture->company->id,'name'=> e($furniture->company->name)] : null,
            'manufacturer' => ($furniture->manufacturer) ? ['id' => $furniture->manufacturer->id,'name'=> e($furniture->manufacturer->name)] : null,
            'supplier' => ($furniture->supplier) ? ['id' => $furniture->supplier->id,'name'=> e($furniture->supplier->name)] : null,
            'model_number' => ($furniture->model_number) ? e($furniture->model_number) : null,
            'category' => ($furniture->category) ? ['id' => $furniture->category->id,'name'=> e($furniture->category->name)] : null,
            'location' => ($furniture->location) ? ['id' => $furniture->location->id,'name'=> e($furniture->location->name)] : null,
            'notes' => ($furniture->notes) ? e($furniture->notes) : null,
            'qty' => ($furniture->qty) ? (int) $furniture->qty : null,
            'purchase_date' => ($furniture->purchase_date) ? Helper::getFormattedDateObject($furniture->purchase_date, 'date') : null,
            'purchase_cost' => Helper::formatCurrencyOutput($furniture->purchase_cost),
            'order_number' => ($furniture->order_number) ? e($furniture->order_number) : null,
            'min_qty' => ($furniture->min_amt) ? (int) $furniture->min_amt : null,
            'remaining_qty' => $furniture->numRemaining(),
            'image' => ($furniture->image) ? url('/').'/uploads/furnitures/'.e($furniture->image) : null,
            'created_at' => Helper::getFormattedDateObject($furniture->created_at, 'datetime'),
            'updated_at' => Helper::getFormattedDateObject($furniture->updated_at, 'datetime'),

        ];

        $permissions_array['available_actions'] = [
            'checkout' => Gate::allows('checkout', Furnitures::class) ? true : false,
            'checkin' =>  false,
            'update' => Gate::allows('update', Furnitures::class) ? true : false,
            'delete' => Gate::allows('delete', Furnitures::class) ? true : false,
        ];

        $permissions_array['user_can_checkout'] = false;

        if ($furniture->numRemaining() > 0) {
            $permissions_array['user_can_checkout'] = true;
        }

        $array += $permissions_array;

        return $array;
    }


    public function transformCheckedoutFurnitures ($furnitures_users, $total)
    {


        $array = array();
        foreach ($furnitures_users as $user) {
            $array[] = [
                'assigned_pivot_id' => $user->pivot->id,
                'id' => (int) $user->id,
                'username' => e($user->username),
                'name' => e($user->getFullNameAttribute()),
                'first_name'=> e($user->first_name),
                'last_name'=> e($user->last_name),
                'employee_number' =>  e($user->employee_num),
                'type' => 'user',
                'available_actions' => ['checkin' => true]
            ];

        }

        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }



}
