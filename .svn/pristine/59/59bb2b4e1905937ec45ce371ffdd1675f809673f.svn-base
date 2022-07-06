<?php
namespace App\Presenters;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Gate;

/**
 * Class InfrastructuresPresenter
 * @package App\Presenters
 */
class BuildingsPresenter extends Presenter
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
                "formatter" => "buildingsLinkFormatter"
            ], [
                "field" => "category",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/general.buildings_category'),
                "formatter" => "categoriesLinkObjFormatter"
            ], [
                "field" => "stock_holder_code",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/form.stock_holder_code'),
                "formatter" => "buildingsLinkFormatter"
            ], [
                "field" => "description",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/form.description'),
                "visible" => true,
                "formatter" => "buildingsLinkFormatter"
            ], [
                "field" => "revenue_village",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/form.revenue_village'),
                "visible" => true,
                "formatter" => "buildingsLinkFormatter"
            ], [
                "field" => "dimension",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/form.dimension'),
                "visible" => true,
                "formatter" => "buildingsLinkFormatter"
            ],  [
                "field" => "no_of_floor",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/form.no_of_floor'),
                "visible" => true,
                "formatter" => "buildingsLinkFormatter"
            ], [
                "field" => "year_of_acquisition",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/form.year_of_acquisition'),
                "visible" => true,
                "formatter" => "buildingsLinkFormatter"
            ],  [
                "field" => "purchase_date",
                "searchable" => true,
                "sortable" => true,
                "visible" => false,
                "title" => trans('general.purchase_date'),
                "formatter" => "dateDisplayFormatter"
            ], [
                "field" => "total_cost",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('general.purchase_cost'),
                "footerFormatter" => 'sumFormatter'
            ], [
                "field" => "life_of_assets",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/form.life_of_assets'),
                "visible" => true,
                "formatter" => "buildingsLinkFormatter"
            ], [
                "field" => "no_of_years_assets_use",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/form.no_of_years_assets_use'),
                "visible" => true,
                "formatter" => "buildingsLinkFormatter"
            ], [
                "field" => "remaining_life",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/form.remaining_life'),
                "visible" => true,
                "formatter" => "buildingsLinkFormatter"
            ], [
                "field" => "rate_of_depreciation",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/form.depreciation'),
                "visible" => true,
                "formatter" => "buildingsLinkFormatter"
            ], [
                "field" => "currunt_use_of_building",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/form.currunt_use_of_building'),
                "visible" => true,
                "formatter" => "buildingsLinkFormatter"
            ], [
                "field" => "remarks",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/buildings/form.remarks'),
                "visible" => true,
                "formatter" => "buildingsLinkFormatter"
            ],  [
                "field" => "actions",
                "searchable" => false,
                "sortable" => false,
                "switchable" => false,
                "title" => trans('table.actions'),
                "formatter" => "buildingsActionsFormatter",
            ]
        ];

        return json_encode($layout);
    }


    /**
     * Pregenerated link to this buildings view page.
     * @return string
     */
    public function nameUrl()
    {
        return (string) link_to_route('buildings.show', $this->name, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('buildings.show', $this->id);
    }

    public function name()
    {
        return $this->model->name;
    }
}
