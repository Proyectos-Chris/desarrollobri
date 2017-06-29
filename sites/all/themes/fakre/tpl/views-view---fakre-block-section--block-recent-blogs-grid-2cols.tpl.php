<?php print render($title_prefix); ?>
<div class="container">
<?php if ($header): ?>
	<header class="page-heading">
		<?php print $header; ?>
	</header>
<?php endif; ?>
<?php if ($rows): ?>
<?php
	$old1 = '<article class="col-sm-6 col-xs-12 first">';
	$new1 = '<div class="row onepage-blogblock"><article class="col-sm-6 col-xs-12 first">';
	$old2 = '<div class="row onepage-blogblock"><article class="col-sm-6 col-xs-12 first">';
	$new2 = '</div><div class="row onepage-blogblock"><article class="col-sm-6 col-xs-12">';
	$rows = str_replace($old1, $new1, $rows);
	$rows = trim(str_replace($old2, $new2, $rows));
	$rows = substr($rows, 6).'</div>';
?>
	<?php print $rows; ?>	
<?php endif; ?>
</div>