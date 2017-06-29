<?php print render($title_prefix); ?>
<?php if ($header): ?>
<header class="page-heading">
	<?php print $header; ?>
</header>
<?php endif; ?>
<?php if ($rows): ?>
<!-- icotop holder -->
<div class="icotop-holder">
	<?php print $rows; ?>
	<?php if($footer): ?>
		<?php print $footer; ?>
	<?php endif; ?>
	<?php if ($attachment_after): ?>
      	<?php print $attachment_after; ?>
  	<?php endif; ?>
</div>
<?php endif; ?>