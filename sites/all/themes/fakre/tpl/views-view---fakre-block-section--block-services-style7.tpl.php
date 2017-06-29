<?php print render($title_prefix); ?>
<?php if ($header): ?>
<header class="page-heading margin-bottom-60">
	<?php print $header; ?>
</header>
<?php endif; ?>
<?php if ($rows): ?>
<div class="row">
	<?php print $rows; ?>
</div>
<?php endif; ?>