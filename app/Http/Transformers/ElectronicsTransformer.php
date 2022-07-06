<?php
namespace App\Http\Transformers;

use App\Models\Electronics;
use Gate;
use Illuminate\Database\Eloquent\Collection;
use App\Helpers\Helper;

class ElectronicsTransformer
{

    public function transformElectronics (Collection $electronics, $total)
    {
        $array = array();
        foreach ($electronics as $electronic) {
            $array[] = self::transformElectronic($electronic);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformElectronic (Electronics $electronic)
    {
        $array = [
            'id' => $electronic->id,
            'name' => e($electronic->name),
            'company' => ($electronic->company) ? ['id' => $electronic->company->id,'name'=> e($electronic->company->name)] : null,
            'manufacturer' => ($electronic->manufacturer) ? ['id' => $electronic->manufacturer->id,'name'=> e($electronic->manufacturer->name)] : null,
            'supplier' => ($electronic->supplier) ? ['id' => $electronic->supplier->id,'name'=> e($electronic->supplier->name)] : null,
            'model_number' => ($electronic->model_number) ? e($electronic->model_number) : null,
            'category' => ($electronic->category) ? ['id' => $electronic->category->id,'name'=> e($electronic->category->name)] : null,
            'location' => ($electronic->location) ? ['id' => $electronic->location->id,'name'=> e($electronic->location->name)] : null,
            'notes' => ($electronic->notes) ? e($electronic->notes) : null,
            'qty' => ($electronic->qty) ? (int) $electronic->qty : null,
            'purchase_date' => ($electronic->purchase_date) ? Helper::getFormattedDateObject($electronic->purchase_date, 'date') : null,
            'purchase_cost' => Helper::formatCurrencyOutput($electronic->purchase_cost),
            'order_number' => ($electronic->order_number) ? e($electronic->order_number) : null,
            'min_qty' => ($electronic->min_amt) ? (int) $electronic->min_amt : null,
            'remaining_qty' => $electronic->numRemaining(),
            'image' => ($electronic->image) ? url('/').'/uploads/electronics/'.e($electronic->image) : null,
            'created_at' => Helper::getFormattedDateObject($electronic->created_at, 'datetime'),
            'updated_at' => Helper::getFormattedDateObject($electronic->updated_at, 'datetime'),

        ];

        $permissions_array['available_actions'] = [
            'checkout' => Gate::allows('checkout', Electronics::class) ? true : false,
            'checkin' =>  false,
            'update' => Gate::allows('update', Electronics::class) ? true : false,
            'delete' => Gate::allows('delete', Electronics::class) ? true : false,
        ];

        $permissions_array['user_can_checkout'] = false;

        if ($electronic->numRemaining() > 0) {
            $permissions_array['user_can_checkout'] = true;
        }

        $array += $permissions_array;

        return $array;
    }


    public function transformCheckedoutElectronics ($electronic_users, $total)
    {


        $array = array();
        foreach ($electronic_users as $user) {
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
