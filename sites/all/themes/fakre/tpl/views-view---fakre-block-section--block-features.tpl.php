<?php print render($title_prefix); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
		<?php if ($header): ?>
		<?php print $header; ?>
		<?php endif; ?>
		<?php if ($attachment_before): ?>
			<div class="img-box">
				<?php print $attachment_before; ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>
<?php if ($rows): ?>
<div class="bg-grey padding-top-90 padding-bottom-60">
	<div class="container">
		<div class="row">
		<?php print $rows; ?>
		</div>
	</div>
</div>
<?php endif; ?>