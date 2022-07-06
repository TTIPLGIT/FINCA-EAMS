<?php

namespace App\Observers;

use App\Models\Buildings;
use App\Models\Setting;
use App\Models\Actionlog;
use Auth;

class BuildingObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  Building  $buildings
     * @return void
     */
    public function updated(Buildings $buildings)
    {

        $logAction = new Actionlog();
        $logAction->item_type = Buildings::class;
        $logAction->item_id = $buildings->id;
        $logAction->created_at =  date("Y-m-d H:i:s");
        $logAction->user_id = Auth::id();
        $logAction->logaction('update');
    }


    /**
     * Listen to the Infrastructures created event when
     * a new Infrastructures is created.
     *
     * @param  Building  $buildings
     * @return void
     */
    public function created(Buildings $buildings)
    {
        $logAction = new Actionlog();
        $logAction->item_type = Buildings::class;
        $logAction->item_id = $buildings->id;
        $logAction->created_at =  date("Y-m-d H:i:s");
        $logAction->user_id = Auth::id();
        $logAction->logaction('create');

    }

    /**
     * Listen to the Buildings deleting event.
     *
     * @param  Buildings  $buildings
     * @return void
     */
    public function deleting(Buildings $buildings)
    {
        $logAction = new Actionlog();
        $logAction->item_type = Buildings::class;
        $logAction->item_id = $buildings->id;
        $logAction->created_at =  date("Y-m-d H:i:s");
        $logAction->user_id = Auth::id();
        $logAction->logaction('delete');
    }
}
