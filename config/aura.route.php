<?php


use Aura\Router\Map;

/* @var Map $map */

$map->route('/weekday', '/weekday/{year}/{month}/{day}');

/*
 * Resource\App\Customers::classes
 */
$map->route('/customers/index', '/customers{/id}');


$map->route('/whois', '/whois/{domain}{/servername}');