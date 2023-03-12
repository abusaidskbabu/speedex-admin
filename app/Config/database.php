<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    // 'database'  => 'speehjae_main',
    // 'username'  => 'speehjae_main',
    // 'password'  => 'BxJ@[rdU4&j^',

    'database'  => 'speehjae_main',
    'username'  => 'root',
    'password'  => '',
]);
// 'driver'    => 'mysql',
// 'host'      => 'localhost',
// 'database'  => 'speehjae_main',
// 'username'  => 'speehjae_main',
// 'password'  => 'BxJ@[rdU4&j^',

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();