<?php $form['actions']['submit']['#attributes']['class'][] = 'btn btn-f-info' ;?>
<div class="contact-form2">
	<fieldset>
		<div class="row">
			<?php print drupal_render($form['submitted']['name']); ?>
			<?php print drupal_render($form['submitted']['email']); ?>
		</div>
		<div class="row">
			<?php print drupal_render($form['submitted']['website']); ?>
			<?php print drupal_render($form['submitted']['subject']); ?>
		</div>
		<div class="row">
			<?php print drupal_render($form['submitted']['message']); ?>
		</div>
		<div class="row text-center">
			<div class="col-xs-12">
				<?php print drupal_render($form['actions']); ?>
			</div>
		</div>
		<?php print drupal_render_children($form); ?>
	</fieldset>
</div>