<?php print render($title_prefix); ?>
<div class="<?php print $classes; ?>">	
<?php if ($rows): ?>
	<div class="icotop-holder margin-bottom-60">
		<?php print $rows; ?>
	</div>
<?php endif; ?>
<?php if($pager): ?>
	<?php
		$old1 = '/<li class="pager-previous first"\>(.*?)<\/li\>/';
		$new1 = '&nbsp;';
		$old3 = '/<li class="pager-current">(.*?)<\/li\>/';
		$new3 = '&nbsp;';
		$pager = preg_replace($old1, $new1, $pager);
		$pager = preg_replace($old3, $new3, $pager);
		//$pager = str_replace($old2, $new2, $pager);
	?>
	<div class="text-center">
		<?php print $pager; ?>
	</div>
<?php endif; ?>
</div>