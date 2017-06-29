<?php $form['actions']['submit']['#attributes']['class'][] = 'btn btn-submit' ;?>
<div class="signup-form">
	<fieldset>
		<div class="frame">
			<?php print drupal_render($form['submitted']['name']); ?>
			<?php print drupal_render($form['submitted']['your_email']); ?>
			<?php print drupal_render($form['submitted']['phone']); ?>
			<?php print drupal_render($form['submitted']['address']); ?>
		</div>
		<?php print drupal_render($form['actions']); ?>
		<?php print drupal_render_children($form); ?>
	</fieldset>
</div>