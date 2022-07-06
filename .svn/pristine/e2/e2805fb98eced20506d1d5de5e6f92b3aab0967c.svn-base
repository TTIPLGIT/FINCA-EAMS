<?php
namespace App\Presenters;

use App\Helpers\Helper;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

/**
 * Class CostCentrePresenter
 * @package App\Presenters
 */
class CostCentrePresenter extends Presenter
{
    /**
     * Json Column Layout for bootstrap table
     * @return string
     */
    public static function dataTableLayout()
    {
        $layout = [
            [
                "field" => "id",
                "searchable" => false,
                "sortable" => true,
                "switchable" => true,
                "title" => trans('general.id'),
                "visible" => false
            ],[
                "field" => "costcode",
                "searchable" => false,
                "sortable" => true,
                "switchable" => true,
                "title" => trans('admin/costcentres/table.costcode'),
                "visible" => true
                
            ], [
                "field" => "dept_id",
                "searchable" => true,
                "sortable" => true,
                "switchable" => true,
                "title" => trans('admin/costcentres/table.dept_id'),
                "visible" => true
                
            ], [
                "field" => "note",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('admin/costcentres/table.note'),                
            ],
            [
            "field" => "actions",
            "searchable" => false,
            "sortable" => false,
            "switchable" => false,
            "title" => trans('table.actions'),
            "formatter" => "costcentresActionsFormatter",
            ],
        ];

        return json_encode($layout);
    }


    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('costcentres.show', $this->id);
    }

    /**
     * Generate html link to this items name.
     * @return string
     */
    public function nameUrl()
    {
        return (string) link_to_route('costcentres.show', e($this->name), $this->id);
    }

 

    
}
