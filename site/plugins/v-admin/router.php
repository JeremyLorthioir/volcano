<?php
/**
 * @desc - get plugin pages according to URL
 */

$path = get_plugin_path('v-admin') . '/pages';

if (isset(url_params()[1])) {
	$page = url_params()[1];

	if ($page === 'logout') {
		va_logout();
	} elseif (!file_exists($path . "/${page}.php")) {
		die("Plugin page names $page does not exist.");
	}

	require $path . "/${page}.php";
} else {
	require $path . '/home.php';
}
