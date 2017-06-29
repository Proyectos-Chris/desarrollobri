<?php 
	global $base_url;
	if (!isset($footer_layout) || empty($footer_layout)) {
		if (isset($node->field_footer_layout) && !empty($node->field_footer_layout)) {
			$footer_layout = $node->field_footer_layout['und'][0]['value'];
		} else $footer_layout = theme_get_setting('footer_layout', 'fakre');
		if (empty($footer_layout)) $footer_layout = 'footer1';
	}
	$footer_copyright = theme_get_setting('footer_copyright_message', 'fakre');
	if(isset($node->field_footer_background) && !empty($node->field_footer_background)) {
		$footer_bg_uri = $node->field_footer_background['und'][0]['uri'];
		$footer_bg = file_create_url($footer_bg_uri);
	} else {
		$footer_bg = theme_get_setting('footer_background','fakre');
		if(!empty($footer_bg)) {
			$footer_bg = file_create_url(file_load($footer_bg)->uri);
		} else $footer_bg = '';
	}
	if(isset($node->field_footer_class) && !empty($node->field_footer_class)) {
		$footer_class = $node->field_footer_class['und'][0]['value'];
	} else $footer_class = theme_get_setting('footer_class', 'fakre');
	if(empty($footer_class)) $footer_class = '';
?>
<!-- footer of the page -->
<?php if($footer_layout == 'footer1'): ?>
<footer id="footer" class="<?php print $footer_class; ?>">
	<?php if($page['footer_top']): ?>
	<!-- footer top -->
	<div class="footer-top bg-shark">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="holder">
						<?php print render($page['footer_top']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?> 
	<!-- footer cent -->
	<?php if ($page['footer']): ?>
	<div class="footer-cent bg-dark-jungle">
		<div class="container">
			<div class="row">
				<?php print render($page['footer']); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="footer-bottom bg-shark">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box1">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?> <a href="http://www.dayscript.com" target="_blank"><img class="by" src="http://globalcdb.demodayscript.com/sites/default/files/by-day.png" alt="by day"></a></span>
                        
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer2'): ?>
<footer id="footer" class="<?php print $footer_class; ?>">
	<?php if($page['footer_top']): ?>
	<!-- socialize holder -->
	<div class="row indicadores">
		<div class="container">
			<div class="socialize-holder">
				<?php print render($page['footer_top']); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
<!-- end -->
	<div class="container">
		<div class="row">
	<?php if($page['footer_center']): ?>
		<?php print render($page['footer_center']); ?>
	<?php endif; ?>
</div>
</div>
	<!-- footer cent -->
	<?php if ($page['footer']): ?>
	<div class="footer-cent bg-shark">
		<div class="container">
			<div class="row">
				<?php print render($page['footer']); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="footer-bottom bg-dark-jungle">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box1">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?><a href="http://www.dayscript.com" target="_blank"><img class="by" src="http://globalcdb.demodayscript.com/sites/default/files/by-day.png" alt="by day"></a></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer3'): ?>
<footer id="footer" class="style3 <?php print $footer_class; ?>">
	<?php if($page['footer_top']): ?>
	<!-- footer top -->
	<div class="footer-top bg-dark-jungle">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="holder">
						<?php print render($page['footer_top']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- footer cent -->
	<?php if ($page['footer']): ?>
	<div class="footer-cent bg-shark">
		<div class="container">
			<div class="row">
				<?php print render($page['footer']); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="bg-dark-jungle footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box1">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer4'): ?>
<footer id="footer" class="style4 <?php print $footer_class; ?>">
<?php if($page['footer_top']): ?>
	<!-- footer top -->
	<div class="footer-top bg-dark-jungle">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php print render($page['footer_top']); ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- footer cent -->
	<?php if ($page['footer']): ?>
	<div class="footer-cent bg-shark">
		<div class="container">
			<div class="row">
				<?php print render($page['footer']); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="bg-dark-jungle footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box2">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer5'): ?>
<footer id="footer" class="style9 <?php print $footer_class; ?>">
	<!-- footer cent -->
	<?php if ($page['footer']): ?>
	<div class="footer-cent bg-shark">
		<div class="container">
			<div class="row">
				<?php print render($page['footer']); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="footer-bottom bg-dark-jungle">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box5">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer6'): ?>
<footer id="footer" class="style5 <?php print $footer_class; ?>">
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="footer-bottom bg-shark">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box3">
						<?php if($logo): ?>
					 	<div class="logo">
					 		<a href="<?php print $base_url; ?>"><img src="<?php print $logo; ?>" height="49" width="196" alt="<?php print $site_name; ?>"></a>
					 	</div>
					 	<?php endif; ?>
                        <?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
						<?php print render($page['footer_bottom']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer7'): ?>
<footer id="footer" class="style12 <?php print $footer_class; ?>">
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="footer-bottom">
		<?php print render($page['footer_bottom']); ?>
		<?php if(!empty($footer_copyright)): ?>
		<span class="copyrights"><?php print $footer_copyright; ?></span>
		<?php endif; ?>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer8'): ?>
<footer id="lancer-footer" class="<?php print $footer_class; ?>">
	<?php if($page['footer_top']): ?>
	<!-- footer top -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php print render($page['footer_top']); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="container footer-bottom">
		<div class="row">
			<div class="col-xs-12">
				<?php print render($page['footer_bottom']); ?>
				<?php if(!empty($footer_copyright)): ?>
				<span class="copyright"><?php print $footer_copyright; ?></span>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- parallax-holder -->
	<?php if(!empty($footer_bg)): ?>
	<div class="parallax-holder">
		<div class="parallax-frame">
			<img src="<?php print $footer_bg; ?>" alt="image description">
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer9'): ?>
<footer id="footer" class="<?php print $footer_class; ?>">
<?php if($logo): ?>
	<div class="wed-logo">
		<div class="logo">
			<a href="<?php print $base_url; ?>">
			<?php if(!empty($blogo)): ?>
				<img src="<?php print $blogo; ?>" alt="<?php print $site_name; ?>" class="img-responsive">
			<?php else: ?>
				<img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" class="img-responsive">
			<?php endif; ?>
			</a>
		</div>
	</div>
<?php endif; ?>
	<?php if($page['footer_top']): ?>
		<?php print render($page['footer_top']); ?>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<div class="bg-dark-jungle footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box1">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer20'): ?>
<footer id="footer" class="style25 <?php print $footer_class; ?>">
	<?php if($page['footer_top']): ?>
	<!-- footer top -->
	<div class="footer-top bg-shark">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="holder">
						<?php print render($page['footer_top']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="footer-bottom bg-dark-jungle">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box1">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer12'): ?>
<footer id="footer" class="style15 <?php print $footer_class; ?>">
	<!-- footer cent -->
	<?php if ($page['footer']): ?>
	<div class="footer-cent">
		<div class="container">
			<div class="row">
				<?php print render($page['footer']); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box1">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if(!empty($footer_bg)): ?>
	<div class="parallax-holder">
		<div class="parallax-frame">
			<img src="<?php print $footer_bg; ?>" alt="<?php print $site_name; ?>">
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer13'): ?>
<footer id="footer" class="style23 <?php print $footer_class; ?>" <?php if(!empty($footer_bg)) print 'style="background:url('.$footer_bg.');"'; ?>>
	<?php if($page['footer_top']): ?>
	<!-- socialize holder -->
	<div class="socialize-holder">
		<?php print render($page['footer_top']); ?>
	</div>
	<?php endif; ?>
	<?php if($page['footer_center']): ?>
	<div class="footer-app">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<!-- bottom box3 -->
					<div class="bottom-box3">
						<?php print render($page['footer_center']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<div class="container footer-bottom">
		<div class="row">
			<div class="col-xs-12">
				<div class="bottom-box1">
					<?php print render($page['footer_bottom']); ?>
					<?php if(!empty($footer_copyright)): ?>
					<span class="copyright"><?php print $footer_copyright; ?></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer14'): ?>
<footer id="footer" class="style13 <?php print $footer_class; ?>">
	<?php if($page['footer_top']): ?>
	<div class="footer-app bg-shark">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<!-- bottom box3 -->
					<div class="bottom-box3" <?php if(!empty($footer_bg)) print 'style="background:url('.$footer_bg.');"'; ?>>
						<?php print render($page['footer_top']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<div class="footer-bottom bg-shark">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box1">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer15'): ?>
<footer id="footer" class="style26 <?php print $footer_class; ?>" <?php if(!empty($footer_bg)) print 'style="background-image:url('.$footer_bg.');"'; ?>>
	<?php if($page['footer_top']): ?>
	<div class="footer-app bg-shark">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<!-- bottom box3 -->
					<div class="bottom-box3" >
						<?php print render($page['footer_top']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<div class="footer-bottom bg-dark-jungle">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box1">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer16'): ?>
<footer id="footer" class="style16 <?php print $footer_class; ?>">
	<?php if($page['footer_top']): ?>
	<!-- footer top -->
	<div class="footer-top bg-shark">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="holder">
						<?php print render($page['footer_top']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="footer-bottom bg-dark-jungle">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box1">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer17'): ?>
<footer id="footer" class="style16 <?php print $footer_class; ?>">
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="bg-shark footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box1">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_top']): ?>
	<!-- footer top -->
	<div class="footer-top bg-dark-jungle">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="holder">
						<?php print render($page['footer_top']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer18'): ?>
<footer id="footer" class="style7 <?php print $footer_class; ?>">
	<?php if($page['footer_top']): ?>
	<!-- footer top -->
	<div class="footer-top bg-shark">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="holder">
						<?php print render($page['footer_top']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="footer-bottom bg-dark-jungle">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box4">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'footer19'): ?>
<footer id="footer" class="style8 <?php print $footer_class; ?>">
	<?php if($page['footer_top']): ?>
	<!-- footer top -->
	<div class="footer-top bg-shark">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="holder">
						<?php print render($page['footer_top']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="footer-bottom bg-dark-jungle">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box5">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php elseif ($footer_layout == 'default'): ?>
<footer id="footer" class="<?php print $footer_class; ?>">
	<?php if($page['footer_top']): ?>
	<!-- footer top -->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="holder">
						<?php print render($page['footer_top']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_center']): ?>
	<div class="footer-app">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<!-- bottom box3 -->
					<div class="bottom-box3">
						<?php print render($page['footer_center']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- footer cent -->
	<?php if ($page['footer']): ?>
	<div class="footer-cent">
		<div class="container">
			<div class="row">
				<?php print render($page['footer']); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($page['footer_bottom'] || !empty($footer_copyright)): ?>
	<!-- footer bottom -->
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bottom-box1">
						<?php print render($page['footer_bottom']); ?>
						<?php if(!empty($footer_copyright)): ?>
						<span class="copyright"><?php print $footer_copyright; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- parallax-holder -->
	<?php if(!empty($footer_bg)): ?>
	<div class="parallax-holder">
		<div class="parallax-frame">
			<img src="<?php print $footer_bg; ?>" alt="image description">
		</div>
	</div>
	<?php endif; ?>
</footer>	
<?php endif; ?>