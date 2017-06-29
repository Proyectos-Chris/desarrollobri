<?php print render($title_prefix); ?>
<div class="container">
	<?php if ($header): ?>
	<!-- page heading -->
	<header class="page-heading">
		<?php print $header; ?>
	</header>
	<?php endif; ?>	
	<?php if ($rows): ?>
	<div class="row">
		<?php print $rows; ?>
	</div>
	<?php endif; ?>
</div>