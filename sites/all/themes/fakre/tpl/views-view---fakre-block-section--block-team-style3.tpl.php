<?php print render($title_prefix); ?>
<div class="container style3">
<?php if ($header): ?>
	<header class="page-heading">
		<?php print $header; ?>
	</header>
<?php endif; ?>
<?php if ($rows): ?>
<?php
	$old1 = '<div class="col-xs-12 col-sm-6 first">';
	$new1 = '<div class="row"><div class="col-xs-12 col-sm-6 first">';
	$old2 = '<div class="row"><div class="col-xs-12 col-sm-6 first">';
	$new2 = '</div><div class="row"><div class="col-xs-12 col-sm-6 first">';
	$rows = str_replace($old1, $new1, $rows);
	$rows = trim(str_replace($old2, $new2, $rows));
	$rows = substr($rows, 6).'</div>';
?>
	<?php print $rows; ?>
	<?php if ($attachment_after): ?>
	<?php
		$old = '<ul class="social-network list-inline">';
		$new = '<ul class="list-unstyled socialnetworks">';
		$attachment_after = str_replace($old, $new, $attachment_after);
	?>
	<div class="popup-holder">
		<?php print $attachment_after; ?>
	</div>
	<?php endif; ?>
<?php endif; ?>
</div>