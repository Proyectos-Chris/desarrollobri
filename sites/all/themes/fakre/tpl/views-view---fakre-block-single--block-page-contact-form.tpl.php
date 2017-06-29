<?php print render($title_prefix); ?>
<div class="contact-block container">
<?php if ($header): ?>
	<?php print $header; ?>
<?php endif; ?>
<?php if ($rows): ?>
	<!-- contact message -->
	<div class="row contact-message">
		<?php print $rows; ?>
		<?php if ($footer): ?>
			<?php print $footer; ?>
		<?php endif; ?>
	</div>
<?php endif; ?>
</div>