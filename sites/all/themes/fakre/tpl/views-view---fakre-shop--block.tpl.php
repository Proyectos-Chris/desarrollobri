<?php
	if ($rows):
		$rows = str_replace('$', '<sub>$</sub>', $rows);
		$rows = str_replace('Add to cart', '[ Add to cart ]', $rows);
		print $rows;
	endif;
?>
<?php if ($pager): ?>
	<?php print $pager; ?>	
<?php endif; ?>