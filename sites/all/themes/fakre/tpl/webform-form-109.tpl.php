<?php $form['actions']['submit']['#attributes']['class'][] = 'btn btn-f-default' ;?>
<div class="rsvp-form">
	<fieldset>
		<?php print drupal_render($form['submitted']['full_name']); ?>
		<?php print drupal_render($form['submitted']['no_of_guest']); ?>
		<?php print drupal_render($form['submitted']['attending']); ?>
		<?php print drupal_render($form['actions']); ?>
		<?php print drupal_render_children($form); ?>
	</fieldset>
</div>