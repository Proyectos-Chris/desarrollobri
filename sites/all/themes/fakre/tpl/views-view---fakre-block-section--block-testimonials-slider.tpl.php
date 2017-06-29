<?php print render($title_prefix); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
		<?php if ($header): ?>
			<header class="page-heading">
				<?php print $header; ?>
			</header>
		<?php endif; ?>
		<?php if ($rows): ?>
			<div data-rotate="true" class="beans-slider">
				<div class="beans-mask">
					<div class="beans-slideset">
						<?php print $rows; ?>
					</div>
				</div>
				<div class="beans-pagination">
					<!-- pagination generated here -->
				</div>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>