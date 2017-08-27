<?php
/**
 * @desc - get plugin pages according to URL
 */

$tmpl_path = get_plugin_path('v-admin') . '/templates';

if (isset(url_params()[1])) {
	$page = url_params()[1];

	if ($page === 'logout') {
		va_logout();
	} elseif (is_dir($tmpl_path . "/$page")) {
		$file = '';

		foreach (url_params() as $key => $filepath) {
			if ($key === 0) { continue; }

			if (is_file($tmpl_path . "/${filepath}.php")) {
				require $tmpl_path . "/${filepath}.php";
			} elseif(is_dir($tmpl_path . "/${filepath}")) {
				$file .= $filepath . '/';
			} else {
				if (file_exists($tmpl_path . "/${file}/${filepath}.php")) {
					$file .= "${filepath}.php";
				}
			}
		}

		if (substr($file, -1) === '/') {
			require $tmpl_path . "/$file/index.php";
		} elseif ($file !== '') {
			require $tmpl_path . "/$file";
		}
	} elseif (!file_exists($tmpl_path . "/${page}.php")) {
		die("Plugin page named $page doesn't exist.");
	} else {
		require $tmpl_path . "/${page}.php";
	}
} else {
	require $tmpl_path . '/home.php';
}
