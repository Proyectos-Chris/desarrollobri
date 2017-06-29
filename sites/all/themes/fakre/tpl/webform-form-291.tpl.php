<?php $form['actions']['submit']['#attributes']['class'][] = 'btn btn-f-info' ;?>
<div class="contact-form2">
	<fieldset>
		<?php print drupal_render($form['submitted']['name']); ?>
		<?php print drupal_render($form['submitted']['email']); ?>
		<?php print drupal_render($form['submitted']['website']); ?>
		<?php print drupal_render($form['submitted']['message']); ?>
		<?php print drupal_render($form['actions']); ?>
		<?php print drupal_render_children($form); ?>
	</fieldset>
</div>