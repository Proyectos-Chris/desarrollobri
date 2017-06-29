<?php print render($title_prefix); ?>
<?php if ($header): ?>
<header class="page-heading style2">
    <div class="heading">
		<?php print $header; ?>
	</div>
</header>
<?php endif; ?>
<?php if ($rows): ?>
<div class="row">
	<?php if ($footer): ?>		
		<?php print $footer; ?>
	<?php endif; ?>
	<div class="col-xs-12 col-sm-6 col-md-4">
		<?php print $rows; ?>
	</div>
	<?php if ($attachment_after): ?>
	<div class="col-xs-12 col-sm-6 col-md-4">
		<?php print $attachment_after; ?>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>