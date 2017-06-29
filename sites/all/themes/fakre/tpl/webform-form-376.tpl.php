<?php $form['actions']['submit']['#attributes']['class'][] = 'btn btn-submit' ;?>
<div class="footer-form email-form">
	<fieldset>
		<?php print drupal_render($form['submitted']['name']); ?>
		<?php print drupal_render($form['submitted']['email']); ?>
		<?php print drupal_render($form['submitted']['message']); ?>
		<?php print drupal_render($form['actions']); ?>
		<?php print drupal_render_children($form); ?>
	</fieldset>
</div>