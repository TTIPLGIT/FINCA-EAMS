<?php
namespace App\Http\Transformers;

use App\Models\CostCentre;
use Illuminate\Database\Eloquent\Collection;
use Gate;
use App\Helpers\Helper;

class CostCentreTransformer
{

    public function transformCostCentres (Collection $costcentres)
    {
        $array = array();
        foreach ($costcentres as $costcentre) {
            $array[] = self::transformCostCentre($costcentre);
        }
        return (new DatatablesTransformer)->transformDatatables($array);
    }

    public function transformCostCentre (CostCentre $costcentre = null)
    {

       if ($costcentre) {
        $array = [
            'id' => (int) $costcentre->id,
            'costcode' => e($costcentre->costcode),
            'dept_id' => e($costcentre->dept_id),
            'note' => e($costcentre->note),            
            'created_at' => Helper::getFormattedDateObject($costcentre->created_at, 'datetime'),
            'updated_at' => Helper::getFormattedDateObject($costcentre->updated_at, 'datetime'),
        ];

        $permissions_array['available_actions'] = [
            'update' => Gate::allows('update', CostCentre::class) ? true : false,
            'delete' => Gate::allows('delete', CostCentre::class) ? true : false,
        ];

        $array += $permissions_array;

        return $array;
    }


    }
}
