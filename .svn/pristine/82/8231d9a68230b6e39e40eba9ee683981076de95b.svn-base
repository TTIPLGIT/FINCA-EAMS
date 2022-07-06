<?php
namespace App\Models;

use App\Models\Traits\Searchable;
use App\Presenters\Presentable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Watson\Validating\ValidatingTrait;


/**
 * Model for Buildings.
 *
 * @version    v1.0
 */
class Buildings extends SnipeModel
{
    protected $presenter = 'App\Presenters\BuildingsPresenter';
    use CompanyableTrait;
    use Loggable, Presentable;
    use SoftDeletes;

    protected $dates = ['deleted_at', 'purchase_date'];
    protected $table = 'infra_buildings';
    protected $casts = [
        'requestable' => 'boolean'
    ];

    use Searchable;
    
    /**
     * The attributes that should be included when searching the model.
     * 
     * @var array
     */
    protected $searchableAttributes = ['name', 'purchase_date'];

    /**
     * The relations and their attributes that should be included when searching the model.
     * 
     * @var array
     */
    protected $searchableRelations = [
        'category'     => ['name'],
        'company'      => ['name']
    ];
   
    

    /**
    * Infrastructures validation rules
    */
    public $rules = array(
        'name'              => 'required|min:3|max:255',
        'category_id'       => 'required|integer|exists:categories,id',
        'company_id'        => 'integer|nullable',        
        'total_cost'     => 'numeric|nullable',
    );


    /**
    * Whether the model should inject it's identifier to the unique
    * validation rules before attempting validation. If this property
    * is not set in the model it will default to true.
    *
    * @var boolean
    */
    protected $injectUniqueIdentifier = true;
    use ValidatingTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'company_id',        
        'name',
        'stock_holder_code',
        'description',
        'revenue_village',
        'dimension',
        'length',
        'breadth',
        'no_of_floor',
        'year_of_acquisition',
        'improvement',        
        'total_cost',
        'purchase_date',
        'life_of_assets',
        'no_of_years_assets_use',        
        'rate_of_depreciation',
        'currunt_use_of_building',
        'remarks',
        'image',        
        'requestable'
    ];




       

    public function setRequestableAttribute($value)
    {
        if ($value == '') {
            $value = null;
        }
        $this->attributes['requestable'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
        return;
    }

    public function company()
    {
        return $this->belongsTo('\App\Models\Company', 'company_id');
    }

   
    public function category()
    {
        return $this->belongsTo('\App\Models\Category', 'category_id')->where('category_type', '=', 'infrastructures');
    }

    /**
    * Get action logs for this infrastructures
    */
    public function assetlog()
    {
        return $this->hasMany('\App\Models\Actionlog', 'item_id')->where('item_type', Infrastructures::class)->orderBy('created_at', 'desc')->withTrashed();
    }

    public function getImageUrl() {
        if ($this->image) {
            return url('/').'/uploads/infrastructures/'.$this->image;
        }
        return false;

    }

    public function users()
    {
        return $this->belongsToMany('\App\Models\User', 'buildings_users', 'buildings_id', 'assigned_to')->withPivot('id')->withTrashed();
    }

    public function hasUsers()
    {
        return $this->belongsToMany('\App\Models\User', 'buildings_users', 'buildings_id', 'assigned_to')->count();
    }
   

    public function checkin_email()
    {
        return $this->category->checkin_email;
    }

    public function requireAcceptance()
    {
        return $this->category->require_acceptance;
    }
   


    public function getEula()
    {

        $Parsedown = new \Parsedown();

        if ($this->category->eula_text) {
            return $Parsedown->text(e($this->category->eula_text));
        } elseif ((Setting::getSettings()->default_eula_text) && ($this->category->use_default_eula=='1')) {
            return $Parsedown->text(e(Setting::getSettings()->default_eula_text));
        }
            return null;
    }

   

    /**
    * Query builder scope to order on company
    *
    * @param  \Illuminate\Database\Query\Builder  $query  Query builder instance
    * @param  text                              $order       Order
    *
    * @return \Illuminate\Database\Query\Builder          Modified query builder
    */
    public function scopeOrderCompany($query, $order)
    {
        return $query->leftJoin('companies', 'buildings.company_id', '=', 'companies.id')
        ->orderBy('companies.name', $order);
    }

    /**
    * Query builder scope to order on category
    *
    * @param  \Illuminate\Database\Query\Builder  $query  Query builder instance
    * @param  text                              $order       Order
    *
    * @return \Illuminate\Database\Query\Builder          Modified query builder
    */
    public function scopeOrderCategory($query, $order)
    {
        return $query->leftJoin('categories', 'buildings.category_id', '=', 'categories.id')
        ->orderBy('categories.name', $order);
    }
    

   
}
