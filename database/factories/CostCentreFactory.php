<?php

/*
|--------------------------------------------------------------------------
| Asset Model Factories
|--------------------------------------------------------------------------
|
| Factories related exclusively to creating models ..
|
*/

$factory->define(App\Models\CostCentre::class, function (Faker\Generator $faker) {
    return [
        'id' => 1,
    ];
});

$factory->state(App\Models\CostCentre::class, 'costcentres', function ($faker) {
    return [
        'costcode' => 'Computer Depreciation',
        'dept_id' => 1,
        'note' =>'some test',
    ];
});

$factory->state(App\Models\CostCentre::class, 'display', function ($faker) {
    return [
        'costcode' => 'Computer Depreciation',
        'dept_id' => 1,
        'note' =>'some test',
    ];
});

$factory->state(App\Models\CostCentre::class, 'mobile-phones', function ($faker) {
    return [
        'name' => 'Mobile Phone Depreciation',
        'months' => 24,
    ];
});




