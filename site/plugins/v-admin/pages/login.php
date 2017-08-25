<!DOCTYPE html> 
<html> 
<head>
		<meta charset="utf-8">
		<title>Volcano &mdash; <?php site_meta('title', true); ?></title>
		<meta name="description" content="<?php site_meta('description', true); ?>">
		<?php get_stylesheets(); ?>
		<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
	</head>
	<body class="<?php body_class(); ?> <?php if (!va_logged_in()): ?>not-logged-in<?php endif; ?>">
		<form class="va-login" method="post">
			<h2>Volcano</h2>

			<?php
			if (isset($_POST['va-submit'])) {
				$username = $_POST['va-username'];
				$password = $_POST['va-password'];

				if (!$username || !$password) {
					echo '<span class="va-error">You have to type in username and password.</span>';
				} else {
					va_login($username, $password);
				}
			}
			?>

			<input type="text" name="va-username" placeholder="username">
			<input type="password" name="va-password" placeholder="password">
			<input type="submit" name="va-submit" value="Let me in!">
		</form>
		
		<?php get_scripts(); ?>
	</body>
</html>
