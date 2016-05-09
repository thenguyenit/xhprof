<?php

global $xhprof;

if (!isset($_REQUEST['A9v3XUsnKX3aEiNsUDZzV']) && !isset($_COOKIE['A9v3XUsnKX3aEiNsUDZzV'])) {
  $xhprof = false;
} else {
  // Remove trace of the special variable from REQUEST_URI
  $_SERVER['REQUEST_URI'] = str_replace(array('?A9v3XUsnKX3aEiNsUDZzV', '&A9v3XUsnKX3aEiNsUDZzV'), '', $_SERVER['REQUEST_URI']);

  setcookie('A9v3XUsnKX3aEiNsUDZzV', 1);
  $xhprof = true;
}

if (isset($_REQUEST['no-A9v3XUsnKX3aEiNsUDZzV'])) {
  setcookie('A9v3XUsnKX3aEiNsUDZzV', 0, time() - 86400);
  $xhprof = false;
}

if ($xhprof && extension_loaded('xhprof')) {
    include_once '/var/www/html/xhprof/xhprof_lib/utils/xhprof_lib.php';
    include_once '/var/www/html/xhprof/xhprof_lib/utils/xhprof_runs.php';
    xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
}
