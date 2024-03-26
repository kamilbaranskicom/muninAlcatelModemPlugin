<?php

/**
 *  Usage:
 * 
 *  1. Open a browser and go to the modem's admin page
 *  2. Open your browser's developer tools, go to the `network` tab and look
 *     for requests to `http://<MODEM_ADDRESS>/jrd/webapi`
 *  3. Take any request, copy the value of the header
 *    `_TclRequestVerificationKey` and assign it to below variable
 *    `$key`
 */

$alcatelModemUrl = 'http://192.168.7.1';
$key = '';