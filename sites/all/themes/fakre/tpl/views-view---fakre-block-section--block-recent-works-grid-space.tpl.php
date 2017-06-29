<?php print render($title_prefix); ?>

<?php if ($header): ?>
<header class="page-heading style2">
	<div class="heading">
		<?php print $header; ?>
	</div>
</header>
<?php endif; ?>
<?php if ($rows):
	$old = '<div class="col-sm-4 col-xs-12 first">';
	$old2 = '<div class="row"><div class="col-sm-4 col-xs-12 first">';
	$new1 = '<div class="row"><div class="col-sm-4 col-xs-12 first">';
	$new2 = '</div><div class="row"><div class="col-sm-4 col-xs-12">';
	$rows = str_replace($old, $new1, $rows);
	$rows = str_replace($old2, $new2, $rows);
	$rows = trim($rows);
	$rows = substr($rows, 6).'</div>';							
?>	
    <?php print $rows; ?>          
<?php endif; ?>
