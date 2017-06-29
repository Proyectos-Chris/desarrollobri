<?php print render($title_prefix); ?>
<div class=" <?php print $classes; ?>">
<?php if ($header): ?>
	<header class="page-heading">
		<?php print $header; ?>
	</header>
<?php endif; ?>
<?php if ($rows): ?>
<?php
	$old1 = '<div class="col-xs-12 col-sm-6 col-md-3 first">';
	$new1 = '<div class="row padding-bottom-60"><div class="col-xs-12 col-sm-6 col-md-3 first">';
	$old2 = '<div class="row padding-bottom-60"><div class="col-xs-12 col-sm-6 col-md-3 first">';
	$new2 = '</div><div class="row padding-bottom-60"><div class="col-xs-12 col-sm-6 col-md-3 first">';
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
<?php if($pager): ?>
	<?php
		$old1 = '/<li class="pager-previous first"\>(.*?)<\/li\>/';
		$new1 = '&nbsp;';
		$old2 = 'next ›';
		$new2 = 'Load more';
		$old3 = '/<li class="pager-current">(.*?)<\/li\>/';
		$new3 = '&nbsp;';
		$pager = preg_replace($old1, $new1, $pager);
		$pager = preg_replace($old3, $new3, $pager);
		$pager = str_replace($old2, $new2, $pager);
	?>
	<nav class="blog-footer style2 text-center loadmore">
		<?php print $pager; ?>
	</nav>
<?php endif; ?>
</div>