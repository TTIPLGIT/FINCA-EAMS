<?php
namespace App\Http\Transformers;

use App\Models\Buildings;
use Gate;
use Illuminate\Database\Eloquent\Collection;
use App\Helpers\Helper;

class BuildingsTransformer
{

    public function transformBuildings (Collection $buildings, $total)
    {
        $array = array();
        foreach ($buildings as $building) {
            $array[] = self::transformBuilding($building);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformBuilding (Buildings $buildings)
    {
        $array = [
            'id' => $buildings->id,
            'name' => e($buildings->name),
            'company' => ($buildings->company) ? ['id' => $buildings->company->id,'name'=> e($buildings->company->name)] : null,              
            'category' => ($buildings->category) ? ['id' => $buildings->category->id,'name'=> e($buildings->category->name)] : null,            
            'stock_holder_code' => ($buildings->stock_holder_code) ? e($buildings->stock_holder_code) : null,           
            'description' => ($buildings->description) ? e($buildings->description) : null,
            'revenue_village' => ($buildings->revenue_village) ? e($buildings->revenue_village) : null,
            'dimension' => ($buildings->revenue_village) ? e($buildings->revenue_village) : null,
             'no_of_floor' => ($buildings->no_of_floor) ? e($buildings->no_of_floor) : null,           
            'year_of_acquisition' => ($buildings->year_of_acquisition) ? e($buildings->year_of_acquisition) : null, 
            'total_cost' => Helper::formatCurrencyOutput($buildings->total_cost),
            'purchase_date' => ($buildings->purchase_date) ? Helper::getFormattedDateObject($buildings->purchase_date, 'date') : null,
            'life_of_assets' => ($buildings->life_of_assets) ? e($buildings->life_of_assets) : null,
            'no_of_years_assets_use' => ($buildings->no_of_years_assets_use) ? (int) $buildings->no_of_years_assets_use : null,
            'remaining_life' => ($buildings->remaining_life) ? e($buildings->remaining_life) : null,
            'rate_of_depreciation' => ($buildings->rate_of_depreciation) ? (float) $buildings->rate_of_depreciation : null,
            'currunt_use_of_building' => ($buildings->currunt_use_of_building) ? e($buildings->currunt_use_of_building) : null,
            'remarks' => ($buildings->remarks) ? e($buildings->remarks) : null,
            'image' => ($buildings->image) ? url('/').'/uploads/infrastructures/'.e($buildings->image) : null,
            'created_at' => Helper::getFormattedDateObject($buildings->created_at, 'datetime'),
            'updated_at' => Helper::getFormattedDateObject($buildings->updated_at, 'datetime'),
            'deleted_at' => Helper::getFormattedDateObject($buildings->deleted_at, 'datetime'),

        ];

        $permissions_array['available_actions'] = [
            'update' => Gate::allows('update', Buildings::class) ? true : false,
            'delete' => Gate::allows('delete', Buildings::class) ? true : false,
        ];        

        $array += $permissions_array;

        return $array;
    } 

}
