<?php

/* @var \Aura\Router\Map $map */

/*
 * Resource\App\Weekday::class
 */
$map->route('/weekday', '/weekday/{year}/{month}/{day}');

/*
 * Resource\App\Customers::classes
 */
$map->route('/customers/index', '/customers{/id}');
