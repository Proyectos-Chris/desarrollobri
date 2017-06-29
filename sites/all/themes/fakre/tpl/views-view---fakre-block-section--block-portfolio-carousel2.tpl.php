<?php print render($title_prefix); ?>
<?php if ($header): ?>
<header class="page-heading small">
	<?php print $header; ?>
</header>
<?php endif; ?>
<?php if ($rows): ?>
<!-- beans-stepslider -->
<div class="beans-stepslider work-slider" data-rotate="true">
	<div class="text-center container padding-bottom-60">
		<a class="btn-prev no-float margin-zero" href="#"><i class="fa fa-angle-left"></i></a> &nbsp; &nbsp;
		<a class="btn-next no-float margin-zero" href="#"><i class="fa fa-angle-right"></i></a>
	</div>
	<div class="beans-mask">
		<div class="beans-slideset">
			<?php print $rows; ?>
		</div>
	</div>
</div>
<?php endif; ?>