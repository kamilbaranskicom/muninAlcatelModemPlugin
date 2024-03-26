<?php
// (c) kamilbaranski.com
// v. 20240326

function getAlcatelDataFromApi($modemUrl = 'http://192.168.7.1', $apiMethod = 'GetSystemStatus', $key = '') {
    global $PLUGINID;
    $modemGetSessionUrl = $modemUrl . '/jrd/webapi?api=' . $apiMethod;
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        // 'POST /jrd/webapi?api=' . $apiMethod . ' HTTP/1.1'."\n".
        // 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8'."\n".
        '_TclRequestVerificationKey: '.$key."\n".
        // '_TclRequestVerificationToken: null'."\n".
        // 'X-Requested-With: XMLHttpRequest'."\n".
        // 'Content-Length: 70'."\n".
        // 'Origin: '.$modemUrl.''."\n".
        // 'DNT: 1'."\n".
        // 'Sec-GPC: 1'."\n".
        // 'Connection: keep-alive'."\n".
        'Referer: '.$modemUrl.'/index.html'."\n".
        'Pragma: no-cache'."\n".
        'Cache-Control: no-cache'
    ));

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, $modemGetSessionUrl);
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"jsonrpc":"2.0","method":"' . $apiMethod . '","params":null,"id":"13.4"}');

    $result = curl_exec($ch);
    if (curl_error($ch)) {
        exit($PLUGINID . ' curl ERROR: ' . curl_error($ch) . chr(10));
    };

    $array = json_decode($result, TRUE);

    // print_r($array);
    // exit;

    return $array['result'];
};
