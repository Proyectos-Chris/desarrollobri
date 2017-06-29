<?php print render($title_prefix); ?>

<?php if ($header): ?>

<header class="page-heading small">

	<div class="heading">

		<?php print $header; ?>

	</div>

</header>

<?php endif; ?>

<?php if ($rows): ?>

<div class="row">

	<div class="col-xs-12">

		<!-- products-holder -->

		<div class="products-holder">

			<?php print $rows; ?>

		</div>

	</div>

</div>

<?php endif; ?>
