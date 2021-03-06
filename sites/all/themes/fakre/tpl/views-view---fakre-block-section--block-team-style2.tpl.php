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
		<?php print $rows; ?>
	</div>
	<?php if ($attachment_after): ?>
	<?php
		$old = '<ul class="social-network list-inline">';
		$new = '<ul class="list-unstyled socialnetworks">';
		$attachment_after = str_replace($old, $new, $attachment_after);
	?>
	<div class="popup-holder">
		<?php print $attachment_after; ?>
	</div>
	<?php endif; ?>
<?php endif; ?>