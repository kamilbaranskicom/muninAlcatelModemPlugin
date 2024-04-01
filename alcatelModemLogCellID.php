#!/usr/bin/env php
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('alcatelConfig.php');
require_once('alcatelApi.php');
require_once('muninFunctions.php');

$PLUGINNAME = 'Alcatel Modem Log CellID';
$PLUGINID = strtr($PLUGINNAME, array(' ' => ''));

sendMuninResponse(
    getAlcatelDataFromApi($alcatelModemUrl, 'GetNetworkInfo', $key),
    array(
        'CellId',
    ),
    $PLUGINNAME,
    $PLUGINID,
    false
);
