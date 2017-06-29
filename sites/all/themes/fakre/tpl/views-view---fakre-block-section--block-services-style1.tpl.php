<?php print render($title_prefix); ?>

<?php if ($header): ?>
 	<header class="page-heading small">
        <div class="heading">
			<?php print $header; ?>
		</div>
	</header>
<?php endif; ?>
		
<?php if ($rows): ?>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-4 padding-top-60 padding-sm-topzero">
		<?php print $rows; ?>
		</div>
		<?php if ($footer): ?>		
		<?php print $footer; ?>
		<?php endif; ?>
		<?php if ($attachment_after): ?>
		<div class="col-xs-12 col-sm-6 col-md-4 padding-top-60 padding-sm-topzero">
			<?php print $attachment_after; ?>
		</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

