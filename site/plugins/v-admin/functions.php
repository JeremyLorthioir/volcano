<?php
/**
 * functions for v-admin plugin
 */

function va_refresh() {
	// TODO: Find another way redirecting. Thank you!
	echo '<script type="text/javascript">window.location.href = "/admin";</script>';
}

function va_get_user($username) {
	$user_json = file_get_contents(
		get_plugin_path('v-admin') . '/user.json'
	);

	$user = json_decode($user_json);

	if ($user->username !== $username) {
		return false;
	}

	return $user;
}

function va_login($username, $password) {
	if (!$username || !$password) {
		die('$username and/or $password not set.');
	}

	$user = va_get_user($username);

	if ($user) {
		if (!password_verify($password, $user->password)) {
			echo '<span class="va-error">Password is incorrect.</span>';
		} else {
			$_SESSION['va-user'] = $user;
			va_refresh();
		}
	}
}

function va_logout() {
	unset($_SESSION['va-user']);
	va_refresh();
}

function va_logged_in() {
	if (!isset($_SESSION['va-user'])) {
		return false;
	}
	return true;
}
