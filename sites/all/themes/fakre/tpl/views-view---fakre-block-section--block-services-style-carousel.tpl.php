<?php print render($title_prefix); ?>
<div class="container">
	<?php if ($header): ?>
	<header class="page-heading">
		<?php print $header; ?>
	</header>
	<?php endif; ?>
	<?php if ($rows):
		$old = '<div class="box first">';
		$old2 = '<div class="beans-slide"><div class="box first">';
		$new1 = '<div class="beans-slide"><div class="box first">';
		$new2 = '</div><div class="beans-slide"><div class="box">';
		$rows = str_replace($old, $new1, $rows);
		$rows = str_replace($old2, $new2, $rows);
		$rows = trim($rows);
		$rows = substr($rows, 6).'</div>';							
	?>	
	<div class="row">
		<div class="col-xs-12">
			<!-- beans-slider -->
			<div class="beans-slider">
				<a href="#" class="btn-prev"><i class="fa fa-angle-left"></i></a>
				<a href="#" class="btn-next"><i class="fa fa-angle-right"></i></a>
				<div class="beans-mask">
					<div class="beans-slideset">
	    				<?php print $rows; ?>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	</div>          
	<?php endif; ?>
</div>
