<?php if($rows): ?>
<!-- beans-stepslider -->
<div class="beans-stepslider work-slider">
	<div class="beans-mask margin-bottom-60">
		<div class="beans-slideset">
    		<?php print $rows; ?>
		</div>
	</div>
	<div class="beans-pagination"></div>
</div>
<?php endif; ?>