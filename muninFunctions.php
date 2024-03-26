<?php
// (c) kamilbaranski.com
// v. 20240326

function sendMuninResponse($array, $onlyKeys, $PLUGINNAME, $PLUGINID, $convertToInt = false, $debug = false) {
    if (isset($_SERVER['REQUEST_METHOD'])) {
        // in case we're started from HTTP server
        header('Content-Type: text/plain; charset=utf-8');
    }

    $filteredArray = filterArray($array, $onlyKeys, $debug);

    global $argv;
    if (isset($argv[1]) && ($argv[1] == 'config')) {
        showConfig($filteredArray, $PLUGINNAME, $PLUGINID);
    } else if ((isset($argv[1]) && ($argv[1] == 'debug')) || ($debug)) {
        showValues($array, $PLUGINID, false);
    } else {
        showValues($filteredArray, $PLUGINID, $convertToInt);
    }
}

function showConfig($array, $PLUGINNAME, $PLUGINID) {
    echo 'graph_title ' . $PLUGINNAME . "\n";
    foreach ($array as $name => $value) {
        echo 'graph_vlabel ' . $PLUGINID . '_' . $name . "\n";
        echo $PLUGINID . '_' . $name . '.label ' . $PLUGINID . '_' . $name . "\n";
        echo $PLUGINID . '_' . $name . ".graph_category network\n";
    }
}

function showValues($array, $PLUGINID, $convertToInt) {
    foreach ($array as $name => $value) {
        if ($convertToInt) {
            $type = 'value';
            $value = intval($value);
        } else {
            if (is_numeric($value)) {
                $type = 'value';
            } else {
                $type = 'extinfo';
            }
        }
        echo $PLUGINID . '_' . $name . '.' . $type . ' ' . $value . "\n";
    }
}

function filterArray($array, $onlyKeys = false, $debug = false) {
    $error = false;     // todo

    if (!is_array($array)) {
        $error = $array;
        $array = array();
        if ($onlyKeys) {
            foreach ($onlyKeys as $key) {
                // undefined(?), according to https://munin.readthedocs.io/en/latest/reference/plugin.html#fieldname-value
                $array[$key] = 'U';
            }
        }
    }

    if ($debug) {
        print_r($error);
        print_r($array);
        exit;
    }

    if ($onlyKeys) {
        $array = array_filter($array, function ($v) use ($onlyKeys) {
            return in_array($v, $onlyKeys);
        }, ARRAY_FILTER_USE_KEY);
    }

    return $array;
}
