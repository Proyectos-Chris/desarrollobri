<?php print render($title_prefix); ?>
<div class="container">
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
			<!-- beans-slider -->
			<div class="beans-slider">
				<div class="beans-mask">
					<div class="beans-slideset">
						<?php print $rows; ?>
					</div>
				</div>
				<div class="beans-pagination hidden-xs"></div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>