<?php
	global $base_url;
	$rows = trim ($rows);
	$rows = str_replace(' ', '', $rows);
	$rows = explode ( ',' , $rows);
	$i = 0;
	$l = count($rows) - 1;
	$img_style1 = 'image_960x960';
	$img_style2 = 'image_480x480';
	$img_style3 = 'image_960x480';
?>
<div class="container onepage-client">
	<div class="row">
		<div class="col-xs-12">
		<?php if ($header): ?>
			<header class="page-heading">
				<?php print $header; ?>
			</header>
		<?php endif; ?>
		<?php if($rows): ?>
			<div class="tab-content">
			<?php
			for ($i=0; $i < $l; $i++) {
				$nid = $rows[$i];
				$node = node_load($nid);
				$title = $node->title;
				$summary = $node->body['und'][0]['summary'];				
			?>
				<div id="tab6-<?php print $i; ?>">
					<!-- onepage blockquote -->
					<blockquote class="onepage-blockquote">
						<q><?php print $summary; ?></q>
						<cite><?php print $title; ?></cite>
					</blockquote>
				</div>
			<?php
			}
			?>
			</div>
			<ul class="tabset list-unstyled margin-zero">
				<?php
				for ($i=0; $i < $l; $i++) {
					$nid = $rows[$i];
					$node = node_load($nid);
					if(isset($node->field_image) && !empty($node->field_image)) {
						$img_uri = $node->field_image['und'][0]['uri'];
						$img_url = file_create_url($img_uri);
					} else $img_url = '';

				?>
				<li <?php if($i == 0) print 'class="active"';?>>
					<a href="#tab6-<?php print $i; ?>">
						<div class="holder">
							<div class="frame"><img src="<?php print $img_url; ?>" alt="<?php print $title; ?>"></div>
						</div>
					</a>
				</li>
				<?php
				}
				?>
			</ul>
		<?php endif; ?>
		</div>
	</div>
</div>