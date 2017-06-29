<?php print render($title_prefix); ?>

<?php if ($header): ?>
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="text-box">
				<?php print $header; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
		
<?php if ($rows): ?>
	<div class="row">
		<div class="col-xs-12 col-md-3 col-sm-6">
		<?php print $rows; ?>
		</div>
		<?php if ($attachment_after): ?>
		<div class="col-xs-12 col-md-3 col-sm-6">
			<?php print $attachment_after; ?>
		</div>
		<?php endif; ?>
		<?php if ($footer): ?>		
		<?php print $footer; ?>
		<?php endif; ?>
	</div>
<?php endif; ?>

