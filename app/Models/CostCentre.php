<?php
namespace App\Models;

use App\Http\Traits\UniqueUndeletedTrait;
use App\Models\SnipeModel;
use App\Models\Traits\Searchable;
use App\Presenters\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Watson\Validating\ValidatingTrait;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\CostCentre;



class CostCentre extends SnipeModel
{
    use SoftDeletes;
    protected $presenter = 'App\Presenters\CostCentrePresenter';
    use Presentable;
    protected $dates = ['deleted_at'];
    protected $table = 'costcentres';

    protected $rules = array(
        'costcode'              => 'required|min:1|max:255|unique_undeleted',
        'dept_id'           => 'max:500|nullable',
        'note'          => 'max:500|nullable',       
        
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
    use UniqueUndeletedTrait;

    use Searchable;
    
    /**
     * The attributes that should be included when searching the model.
     * 
     * @var array
     */
    protected $searchableAttributes = ['costcode'];

    /**
     * The relations and their attributes that should be included when searching the model.
     * 
     * @var array
     */
    protected $searchableRelations = [];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['costcode','dept_id','note'];


    // Eager load counts.
    // We do this to eager load the "count" of seats from the controller.  Otherwise calling "count()" on each model results in n+1
    public function assetsRelation()
    {
        return $this->hasMany(Asset::class)->whereNull('deleted_at')->selectRaw('costcentre_id, count(*) as count')->groupBy('costcentre_id');
    }

    public function getLicenseSeatsCountAttribute()
    {
        if ($this->licenseSeatsRelation->first()) {
            return $this->licenseSeatsRelation->first()->count;
        }

        return 0;
    }
    public function assets()
    {
        return $this->hasMany('\App\Models\Asset', 'costcentre_id');
    }

     public function department()
    {
        return $this->belongsTo('\App\Models\Department', 'dept_id');
    }

    // public function accessories()
    // {
    //     return $this->hasMany('\App\Models\Accessory', 'supplier_id');
    // }

    // public function asset_maintenances()
    // {
    //     return $this->hasMany('\App\Models\AssetMaintenance', 'supplier_id');
    // }

    public function num_assets()
    {
        if ($this->assetsRelation->first()) {
            return $this->assetsRelation->first()->count;
        }

        return 0;
    }

    // public function licenses()
    // {
    //     return $this->hasMany('\App\Models\License', 'costcentre_id');
    // }

    // public function num_licenses()
    // {
    //     return $this->licenses()->count();
    // }

     public function has_models()
    {
        return $this->hasMany('\App\Models\Asset', 'costcentre_id')->count();
    }


    public function addhttp($url)
    {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }
}
