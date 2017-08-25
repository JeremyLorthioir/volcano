<?php

/**
 * @desc - get a plugin
 * @param string $name - the plugin folder name
 * @param string|array $options - options to give plugin
 */
function plugin($name, $options = false) {
	if (file_exists(SITE . "/plugins/$name")) {
		if (!file_exists(SITE . "/plugins/$name/index.php")) {
			die("The plugin \"$name\" does not have an index.php file");
		}

		include SITE . "/plugins/$name/index.php";

        // dash-case into camelCase
        $fnName = str_replace('-', '', ucwords($name, '-'));
        $fnName = lcfirst($fnName);

		if (function_exists($fnName)) {
			$fnName($options);
		} else {
			die("It seems like plugin '$name' misses: '$fnName()' function");
		}
	}
}

/**
 * @desc - get plugin path
 * @param string $plugin - plugin name
 */
function get_plugin_path($plugin) {
	if (!is_dir(PLUGINS . "/$plugin")) {
		die("Plugin named $plugin does not exist");
	}

	return PLUGINS . "/$plugin";
}

/**
 * @desc - get plugin partial from $plugin/partials/$file.php
 * @param string $name - plugin name
 * @param string $file - file name
 */
function get_plugin_partial($plugin, $file) {
	if (!is_dir(PLUGINS . "/$plugin")) {
		die("Plugin named $plugin does not exist");
	}

	if (!file_exists(PLUGINS . "/$plugin/partials/${file}.php")) {
		die("Plugin partial named ${file}.php does not exist");
	}

	include PLUGINS . "/$plugin/partials/${file}.php";
}
