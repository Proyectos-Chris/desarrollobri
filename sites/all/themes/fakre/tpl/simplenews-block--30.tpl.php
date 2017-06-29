<?php
	$form['mail']['#attributes']['placeholder'] = 'E-MAIL ADDRESS';
	$form['mail']['#attributes']['class'] = array('form-control');
	$form['submit']['#attributes']['class'] = array('btn btn-slider');
	$form['submit']['#value'] = 'SIGN UP';
?>
<div class="error-form">
	<fieldset>
		<?php print render($form); ?>
	</fieldset>
</div>
