<?php print render($title_prefix); ?>
<?php if ($header): ?>
	<header class="page-heading">
		<?php print $header; ?>
	</header>
<?php endif; ?>
<?php if ($rows): ?>
<?php
	if ($footer):
		$old = '<div class="portfolio-block coll-6 nospace last">';
		$new = $footer.'<div class="portfolio-block coll-6 nospace last">';
		$tmpOldStrLength = strlen($old);
		$offset =strpos($rows, $old);
		$rows = substr_replace($rows, $new, $offset, $tmpOldStrLength);
	endif;
?>
	<div class="icotop-holder">
		<?php print $rows; ?>
	</div>
<?php endif; ?>
