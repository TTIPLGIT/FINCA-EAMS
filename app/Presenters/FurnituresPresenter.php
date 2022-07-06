<?php
namespace App\Presenters;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Gate;

/**
 * Class FurnituresPresenter
 * @package App\Presenters
 */
class FurnituresPresenter extends Presenter
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
                "field" => "image",
                "searchable" => false,
                "sortable" => true,
                "switchable" => true,
                "title" => trans('admin/hardware/table.image'),
                "visible" => true,
                "formatter" => "imageFormatter"
            ], [
                "field" => "company",
                "searchable" => true,
                "sortable" => true,
                "switchable" => true,
                "title" => trans('admin/companies/table.title'),
                "visible" => false,
                "formatter" => "companiesLinkObjFormatter"
            ], [
                "field" => "name",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('general.name'),
                "formatter" => "furnituresLinkFormatter"
            ], [
                "field" => "category",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/furnitures/general.furnitures_category'),
                "formatter" => "categoriesLinkObjFormatter"
            ], [
                "field" => "model_number",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/models/table.modelnumber'),
                "formatter" => "furnituresLinkFormatter"
            ], [
                "field" => "manufacturer",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('general.manufacturer'),
                "formatter" => "manufacturersLinkObjFormatter",
            ], [
                "field" => "supplier",
                "searchable" => true,
                "sortable" => true,
                "switchable" => true,
                "title" => trans('general.supplier'),
                "visible" => false,
                "formatter" => "suppliersLinkObjFormatter"
            ], [
                "field" => "location",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('general.location'),
                "formatter" => "locationsLinkObjFormatter",
            ], [
                "field" => "qty",
                "searchable" => false,
                "sortable" => false,
                "title" => trans('admin/furnitures/general.total'),
            ],  [
                "field" => "min_qty",
                "searchable" => false,
                "sortable" => true,
                "title" => trans('general.min_amt'),
            ], [
                "field" => "remaining_qty",
                "searchable" => false,
                "sortable" => false,
                "title" => trans('admin/furnitures/general.remaining'),
            ], [
                "field" => "purchase_date",
                "searchable" => true,
                "sortable" => true,
                "visible" => false,
                "title" => trans('general.purchase_date'),
                "formatter" => "dateDisplayFormatter"
            ], [
                "field" => "purchase_cost",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('general.purchase_cost'),
                "footerFormatter" => 'sumFormatter',
            ], [
                "field" => "order_number",
                "searchable" => true,
                "sortable" => true,
                "visible" => false,
                "title" => trans('general.order_number'),
            ],[
                "field" => "change",
                "searchable" => false,
                "sortable" => false,
                "visible" => true,
                "title" => trans('general.change'),
                "formatter" => "furnituresInOutFormatter",
            ], [
                "field" => "actions",
                "searchable" => false,
                "sortable" => false,
                "switchable" => false,
                "title" => trans('table.actions'),
                "formatter" => "furnituresActionsFormatter",
            ]
        ];

        return json_encode($layout);
    }


    /**
     * Pregenerated link to this furnitures view page.
     * @return string
     */
    public function nameUrl()
    {
        return (string) link_to_route('furnitures.show', $this->name, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('furnitures.show', $this->id);
    }

    public function name()
    {
        return $this->model->name;
    }
}
