<?php print render($title_prefix); ?>
<?php global $base_url; ?>
<?php if ($header): ?>
<header class="page-heading">
	<?php print $header; ?>
</header>
<?php endif; ?>
<?php if ($rows): ?>
<div class="beans-stepslider work-slider">
	<div class="beans-mask">
		<div class="beans-slideset">
			<?php print $rows; ?>
		</div>
	</div>
	<div class="container padding-top-60">
		<div class="row">
			<div class="col-xs-12">
				<a class="btn btn-dark pull-left" href="<?php print $base_url; ?>/portfolio"><?php print t('VIEW ALL PROJECTS') ?></a>
				<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
				<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>