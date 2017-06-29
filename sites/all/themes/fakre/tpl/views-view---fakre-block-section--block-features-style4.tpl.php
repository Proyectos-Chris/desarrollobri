<?php print render($title_prefix); ?>
<div class="container clients-grid">
<?php if ($header): ?>
	<header class="page-heading">
		<?php print $header; ?>
	</header>
<?php endif; ?>
<?php if ($rows): ?>
<?php
	$old1 = '<div class="f-iconbox light margin-bottom-30 first">';
	$new1 = '<div class="col-xs-12 col-md-4"><div class="f-iconbox light margin-bottom-30 first">';
	$old2 = '<div class="col-xs-12 col-md-4"><div class="f-iconbox light margin-bottom-30 first">';
	$new2 = '</div><div class="col-xs-12 col-md-4"><div class="f-iconbox light margin-bottom-30">';
	$rows = str_replace($old1, $new1, $rows);
	$rows = trim(str_replace($old2, $new2, $rows));
	$rows = substr($rows, 6).'</div>';
?>
	<?php print $rows; ?>
<?php endif; ?>
</div>