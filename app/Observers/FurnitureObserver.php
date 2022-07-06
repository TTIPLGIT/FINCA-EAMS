<?php

namespace App\Observers;

use App\Models\Furnitures;
use App\Models\Setting;
use App\Models\Actionlog;
use Auth;

class FurnitureObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  Furnitures  $furniture
     * @return void
     */
    public function updated(Furnitures $furniture)
    {

        $logAction = new Actionlog();
        $logAction->item_type = Furnitures::class;
        $logAction->item_id = $furniture->id;
        $logAction->created_at =  date("Y-m-d H:i:s");
        $logAction->user_id = Auth::id();
        $logAction->logaction('update');
    }


    /**
     * Listen to the Furnitures created event when
     * a new accessory is created.
     *
     * @param  Furnitures  $furniture
     * @return void
     */
    public function created(Furnitures $furniture)
    {
        $logAction = new Actionlog();
        $logAction->item_type = Furnitures::class;
        $logAction->item_id = $furniture->id;
        $logAction->created_at =  date("Y-m-d H:i:s");
        $logAction->user_id = Auth::id();
        $logAction->logaction('create');

    }

    /**
     * Listen to the Furnitures deleting event.
     *
     * @param  Furnitures  $furniture
     * @return void
     */
    public function deleting(Furnitures $furniture)
    {
        $logAction = new Actionlog();
        $logAction->item_type = Furnitures::class;
        $logAction->item_id = $furniture->id;
        $logAction->created_at =  date("Y-m-d H:i:s");
        $logAction->user_id = Auth::id();
        $logAction->logaction('delete');
    }
}
