<div class="<?php print $classes; ?>">
<?php if ($exposed): ?>
    <div class="view-filters">
      	<?php print $exposed; ?>
    </div>
<?php endif; ?>
<?php if ($rows): ?>
	<?php
		$rows = str_replace('$', '<sub>$</sub>', $rows);
		$rows = str_replace('Add to cart', '[ Add to cart ]', $rows);
	?>
	<div class="view-content">
		<?php print $rows; ?>
	</div>
<?php endif; ?>
<?php if ($pager): ?>
    <?php print $pager; ?>
<?php endif; ?>
</div>