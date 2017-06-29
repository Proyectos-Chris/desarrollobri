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
			<span class="icon"><i class="fa fa-quote-left"></i></span>
			<!-- beans-slider -->
			<div class="beans-slider" data-rotate="true">
				<div class="beans-mask">
					<div class="beans-slideset">
						<?php print $rows; ?>
					</div>
				</div>
				<div class="beans-pagination small">
					<!-- pagination generated here -->
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>