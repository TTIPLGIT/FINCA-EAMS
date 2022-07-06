<?php

namespace App\Observers;

use App\Models\Electronics;
use App\Models\Setting;
use App\Models\Actionlog;
use Auth;

class ElectronicObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  Electronic  $electronic
     * @return void
     */
    public function updated(Electronics $electronic)
    {

        $logAction = new Actionlog();
        $logAction->item_type = Electronics::class;
        $logAction->item_id = $electronic->id;
        $logAction->created_at =  date("Y-m-d H:i:s");
        $logAction->user_id = Auth::id();
        $logAction->logaction('update');
    }


    /**
     * Listen to the Accessory created event when
     * a new accessory is created.
     *
     * @param  Accessory  $accessory
     * @return void
     */
    public function created(Electronics $electronic)
    {
        $logAction = new Actionlog();
        $logAction->item_type = Electronics::class;
        $logAction->item_id = $electronic->id;
        $logAction->created_at =  date("Y-m-d H:i:s");
        $logAction->user_id = Auth::id();
        $logAction->logaction('create');

    }

    /**
     * Listen to the Accessory deleting event.
     *
     * @param  Accessory  $accessory
     * @return void
     */
    public function deleting(Electronics $electronic)
    {
        $logAction = new Actionlog();
        $logAction->item_type = Electronics::class;
        $logAction->item_id = $electronic->id;
        $logAction->created_at =  date("Y-m-d H:i:s");
        $logAction->user_id = Auth::id();
        $logAction->logaction('delete');
    }
}
