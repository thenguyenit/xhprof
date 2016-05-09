<?php

global $xhprof;
$cookieXhprof = 'A9v3XUsnKX3aEiNsUDZzV';

if (!isset($_REQUEST[$cookieXhprof]) && !isset($_COOKIE[$cookieXhprof])) {
    $xhprof = false;
} else {
  // Remove trace of the special variable from REQUEST_URI
    $_SERVER['REQUEST_URI'] = str_replace(array('?' . $cookieXhprof, '&' . $cookieXhprof), '', $_SERVER['REQUEST_URI']);

    setcookie($cookieXhprof, 1);
    $xhprof = true;
}

if (isset($_REQUEST['no-' . $cookieXhprof])) {
    setcookie($cookieXhprof, 0, time() - 86400);
    $xhprof = false;
}

if ($xhprof && extension_loaded('xhprof')) {
    include_once 'xhprof/xhprof_lib/utils/xhprof_lib.php';
    include_once 'xhprof/xhprof_lib/utils/xhprof_runs.php';
    xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
}
