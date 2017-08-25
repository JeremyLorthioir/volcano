<?php
if (!va_logged_in()) {
	require get_plugin_path('v-admin') . '/pages/login.php';
} else {
	get_plugin_partial('v-admin', 'header');
?>
	<main class="va-main">
		<?php require 'router.php'; ?>
	</main>
<?php
	get_plugin_partial('v-admin', 'footer');
}
?>
