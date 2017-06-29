<?php print render($title_prefix); ?>
<div class="container">
<?php if ($header): ?>
	<header class="page-heading small">
        <div class="heading">
			<?php print $header; ?>
		</div>
	</header>
<?php endif; ?>
<?php if ($rows):
	$old = '<article class="col-xs-12 col-sm-6 blog-m-post first">';
	$old2 = '<div class="beans-slide"><div class="row">';
	$new1 = '<div class="beans-slide"><div class="row"><article class="col-xs-12 col-sm-6 blog-m-post">';
	$new2 = '</div></div><div class="beans-slide"><div class="row">';
	$rows = str_replace($old, $new1, $rows);
	$rows = str_replace($old2, $new2, $rows);
	$rows = trim($rows);
	$rows = substr($rows, 12).'</div></div>';							
?>
	<div class="beans-slider" data-rotate="true" data-pause-hover="true">
		<div class="beans-mask">
            <div class="beans-slideset">
            <?php print $rows; ?>
            </div>
        </div>
        <div class="beans-pagination">
        <!-- pagination generated here -->
        </div>
	</div>
<?php endif; ?>
</div>