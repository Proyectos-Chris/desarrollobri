<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<div id="lancer-footer" class="style2">
	<div class="container">
	<?php
		$old = '<ul class="social-network list-inline">';
		$new = '<ul class="list-inline f-social">';
		$rows = str_replace($old, $new, $rows);
	?>
		<?php print $rows; ?>
	</div>
</div>
<?php endif; ?>