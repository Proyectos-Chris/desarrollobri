<?php print render($title_prefix); ?>

<?php if ($header): ?>
 	<header class="page-heading">
		<?php print $header; ?>
	</header>
<?php endif; ?>
		
<?php if ($rows): ?>
	<div class="row">
		<div class="col-xs-12 col-md-4 col-md-push-4">
		<?php print $rows; ?>
		</div>
		<?php if ($attachment_after): ?>
		<div class="col-xs-12 col-md-4 col-md-push-4">
			<?php print $attachment_after; ?>
		</div>
		<?php endif; ?>
		<?php if ($footer): ?>		
		<?php print $footer; ?>
		<?php endif; ?>
	</div>
<?php endif; ?>

