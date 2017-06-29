<?php
	$form['mail']['#attributes']['placeholder'] = 'Please Enter Your Email';
	$form['mail']['#attributes']['class'] = array('email');
	$form['submit']['#attributes']['class'] = array('button');
	$form['submit']['#value'] = 'Subcribe Now';
?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<!-- app-subform -->
			<div class="app-subform">
				<!-- page heading -->
				<header class="page-heading">
					<h2 class="lime text-capitalize font-medium margin-bottom-20">Fakre Newsletter</h2>
					<p>Ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam</p>
				</header>
				<div class="input-box">
					<?php print render($form); ?>
				</div>
			</div>
		</div>
	</div>
</div>
