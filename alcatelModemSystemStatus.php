#!/usr/bin/env php
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('alcatelConfig.php');
require_once('alcatelApi.php');
require_once('muninFunctions.php');

$PLUGINNAME = 'Alcatel Modem System Status';
$PLUGINID = strtr($PLUGINNAME, array(' ' => ''));

sendMuninResponse(
    getAlcatelDataFromApi($alcatelModemUrl, 'GetSystemStatus', $key),
    array(
        'bat_cap',
        'NetworkType',
        'SignalStrength',
        'ConnectionStatus',
        'TotalConnNum'
    ),
    $PLUGINNAME,
    $PLUGINID,
    false
);


/*
  NetworkType:
  
  var MACRO_NETWORKTYPE_NO_SERVICE = 0;
  var MACRO_NETWORKTYPE_GPRS = 1;
  var MACRO_NETWORKTYPE_EDGE = 2;
  var MACRO_NETWORKTYPE_HSPA = 3;
  var MACRO_NETWORKTYPE_HSUPA = 4;
  var MACRO_NETWORKTYPE_UMTS = 5;
  var MACRO_NETWORKTYPE_HSPA_PLUS = 6;
  var MACRO_NETWORKTYPE_DC_HSPA_PLUS = 7;
  var MACRO_NETWORKTYPE_LTE = 8;
  var MACRO_NETWORKTYPE_LTE_PLUS = 9;
*/