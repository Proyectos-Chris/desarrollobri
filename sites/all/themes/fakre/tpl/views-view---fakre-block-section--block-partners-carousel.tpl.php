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
	<div class="col-xs-12">
		<?php print $rows; ?>
	</div>
</div>
<?php endif; ?>