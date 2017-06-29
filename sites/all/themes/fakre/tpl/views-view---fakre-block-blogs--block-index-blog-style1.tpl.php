<?php print render($title_prefix); ?>
<div class="container-fluid blogs-block">
<?php if ($rows): ?>
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<!-- blog alignleft -->
				<div class="blog-alignleft">
					<div class="beans-slider" data-rotate="true">
						<div class="beans-mask">
							<div class="beans-slideset">
								<?php print $rows; ?>
							</div>
						</div>
						<div class="beans-pagination"></div>
					</div>
				</div>
			<?php if ($attachment_before): ?>
				<div class="blog-content">
					<div class="towcolumns">
						<?php print  $attachment_before;?>
					</div>
					<?php if ($footer): ?>
					<div class="other-blogs">
						<?php print $footer; ?>
					</div>
					<?php endif; ?>	
				</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
</div>