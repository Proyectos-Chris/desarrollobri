<?php $form['actions']['submit']['#attributes']['class'][] = 'btn-submit btn-block' ;?>
<fieldset>
	<div class="row">
		<?php print drupal_render($form['submitted']['name']); ?>
	</div>
	<div class="row">
		<?php print drupal_render($form['submitted']['phone']); ?>
	</div>
	<div class="row">
		<?php print drupal_render($form['submitted']['date_from']); ?>
	</div>
	<div class="row">
		<?php print drupal_render($form['submitted']['date_to']); ?>
	</div>
	<div class="row">
		<?php print drupal_render($form['submitted']['hourly']); ?>
	</div>
	<div class="row text-center">
		<div class="col-xs-12 col-md-6 col-md-push-3">
			<?php print drupal_render($form['actions']); ?>
		</div>
	</div>
	<?php print drupal_render_children($form); ?>
</fieldset>