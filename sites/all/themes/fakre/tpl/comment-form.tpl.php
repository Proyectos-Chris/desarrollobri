<?php
	$form['author']['name']['#attributes']['placeholder'][] = 'Your Name *';
	$form['author']['name']['#attributes']['class'][] = 'input';
	$form['author']['mail']['#access'] = TRUE;
	$form['author']['mail']['#attributes']['placeholder'][] = 'Email *';
	$form['author']['mail']['#attributes']['class'][] = 'input';
	$form['author']['mail']['#description'] = FALSE;
	$form['author']['name']['#title'] = FALSE;
	$form['author']['mail']['#title'] = FALSE;
	$form['author']['homepage']['#title'] = FALSE;
	$form['author']['homepage']['#access'] = TRUE;
	$form['author']['homepage']['#attributes']['class'][] = 'input';
	$form['author']['homepage']['#attributes']['placeholder'][] = 'Website';
	$form['author']['comment_body']['#title'] = FALSE;
	$form['comment_body']['und'][0]['value']['#attributes']['placeholder'][] = 'Comment *';
	$form['comment_body']['und'][0]['value']['#attributes']['class'][] = 'comment-body';
	$form['comment_body']['und'][0]['value']['#rows'] = 10;
	$form['comment_body']['und'][0]['value']['#cols'] = 30;
	$form['actions']['submit']['#value'] = 'SUBMIT';
	$form['actions']['submit']['#attributes']['class'][] = 'btn btn-submit';
	$form['actions']['preview']['#access'] = FALSE;
	$form['subject']['#access'] = FALSE;
	$form['comment_body']['#required'] = TRUE;
	$form['comment_body']['und'][0]['#title'] = FALSE;
	

?>
<div class="form-row">
			<?php  print drupal_render($form['author']['name']); ?>
			<?php  print drupal_render($form['author']['mail']); ?>
			<?php  print drupal_render($form['author']['homepage']); ?>
</div>
<?php print drupal_render($form['comment_body']) ;?>
<div class="text-center">
	<?php print drupal_render($form['actions']['submit']); ?>
</div>
<?php //print_r($form); ?>
<?php print drupal_render_children($form); ?>