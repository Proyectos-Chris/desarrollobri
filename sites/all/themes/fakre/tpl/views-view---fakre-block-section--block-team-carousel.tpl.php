<?php if($header): ?>
	<?php print $header; ?>
<?php endif; ?>
<?php if($rows): ?>
<div class="row">
	<div class="col-xs-12">
		<!-- beans-stepslide -->
		<div class="beans-stepslider chef-carousel">

			<div class="beans-mask">

				<div class="beans-slideset">

				<?php print $rows; ?>

				</div>

			</div>

			<div class="beans-pagination"></div>
		</div>
	</div>
</div>
<?php endif; ?>