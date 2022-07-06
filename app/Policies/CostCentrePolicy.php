<?php

namespace App\Policies;

use App\Policies\SnipePermissionsPolicy;

class CostCentrePolicy extends SnipePermissionsPolicy
{
    protected function columnName()
    {
        return 'costcentres';
    }
}
