<?php

// Get all pages to list here
$pages = scandir(SITE . '/pages');

// Remove . and .. present on Linux
$pages = array_diff($pages, array('.', '..'));

?>

<h2>Pages</h2>

<ul class="va-list">
	<?php
		foreach ($pages as $page):
		$modification_time = date('d/m/Y, H:i', filemtime(SITE . '/pages/' . $page));
	?>
		<li>
			<a href="/admin/pages/edit/<?php echo str_replace('.md', '', $page); ?>"><?php echo $page; ?></a>
			<time>Modified: <?php echo $modification_time; ?></time>
		</li>
	<?php endforeach; ?>
</ul>
