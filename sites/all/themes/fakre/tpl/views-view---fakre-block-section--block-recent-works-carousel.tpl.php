<?php print render($title_prefix); ?>
<?php global $base_url; ?>
<?php if ($header): ?>
<header class="page-heading small">
    <div class="heading">
		<?php print $header; ?>
	</div>
</header>
<?php endif; ?>
<?php if ($rows): ?>
<!-- beans-stepslider -->
<div class="beans-stepslider work-slider">
	<div class="beans-mask margin-bottom-30">
		<div class="beans-slideset">
			<?php print $rows; ?>
		</div>
	</div>
	<!-- container -->
	<div class="container">
		<div class="row">
			<!-- col -->
			<div class="col-xs-12">
				<a class="btn btn-dark pull-left" href="<?php print $base_url; ?>/portfolio"><?php print t('VIEW OUR PORTFOLIO'); ?></a>
				<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
				<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>