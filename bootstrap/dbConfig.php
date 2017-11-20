<?php

$capsule= new \Illuminate\Database\Capsule\manager;

$capsule->addConnection($container['settings']['db']);

$capsule->setAsGlobal();

$capsule->bootEloquent();