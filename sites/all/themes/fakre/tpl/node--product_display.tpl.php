<?php
/**
 * @file
 * Default theme implementation to display a node.
 */
	global $base_root, $base_url;

  	if(isset($content['product:field_images'])) {
    	$ni = count($content['product:field_images']['#items']);
    	$img_uri  = $content['product:field_images']['#items'][0]['uri'];
	    $full_img = file_create_url($img_uri);
	    $img_crop = image_style_url('image_440x700', $img_uri);
  	} else{
  		$imageone = '';
  		$ni = 0;
  	}
  	$i = 0;
  	$j = 0;
  	if(!$page){ ?>
	<article class="new-product">
		<div class="product-img">
			<img src="<?php print $img_crop; ?>" alt="<?php print $title; ?>">
			<div class="product-over">
				<div class="frame">
					<div class="box">
						<a href="<?php print $node_url; ?>" class="btn btn-f-default"><?php print t('QUICK VIEW'); ?></a>
					</div>
				</div>
			</div>
		</div>
		<h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
		<?php print rate_embed($node, 'product_rating', RATE_DISABLED); ?>
		<?php
			hide($content['links']);
			hide($content['comments']);
			hide($content['field_product_colors']);
			hide($content['product:field_images']);
			hide($content['product:commerce_price']);
			hide($content['product:field_product_size']);
			hide($content['field_product_tags']);
			hide($content['product:sku']);
			hide($content['field_product_categories']);
			hide($content['body']);
			print render($content['field_product']); 
        ?>
		<span class="amount"><?php print render($content['product:commerce_price']); ?></span>
	</article>
  	<?php } else { ?>
	<div class="row shop-description">
		<div class="col-sm-6 col-xs-12">
			<!-- beans-stepslider2 -->
			<div class="beans-stepslider2 description">
				<div class="beans-mask">
					<div class="beans-slideset">
					<?php foreach ($content['product:field_images']['#items'] as $key => $value) {
	                    $img_uri  = $content['product:field_images']['#items'][$key]['uri'];
	                    $img_url = file_create_url($img_uri);
	                    $image_thumb = image_style_url('image_125x146', $img_uri);
                  	?>
						<!-- beans-slide -->
						<div class="beans-slide">
							<img class="img-responsive" alt="<?php print $content['product:field_images']['#items'][$key]['alt']; ?>" src="<?php print $img_url; ?>" >
						</div>
					<?php
						$i++;
	                    if($i == $ni) break;
					}
					?>
					</div>
				</div>
				<div class="beans-pagination">
					<ul class="list-inline">
					<?php foreach ($content['product:field_images']['#items'] as $key => $value) {
	                    $img_uri  = $content['product:field_images']['#items'][$key]['uri'];
	                    $image_thumb = image_style_url('image_125x146', $img_uri);
                  	?>
						<li><a href="#"><img class="img-responsive" alt="<?php print $title; ?>" src="<?php print $image_thumb; ?>" ></a></li>
					<?php
						$j++;
	                    if($j == $ni) break;
					}
					?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xs-12 description-block">
			<header class="description-header">
				<div class="holder">
					<h2><?php print $title; ?></h2>
					<div class="block">
						<?php print rate_embed($node, 'product_rating', RATE_COMPACT); ?>
						<a href="#" class="review">(<?php print $comment_count; ?> <?php print t('Reviews'); ?>)</a>
					</div>
				</div>
				<span class="amount"><?php print str_replace('$', '<sup>$</sup>', render($content['product:commerce_price'])); ?></span>
			</header>
			<?php print render($content['product:field_short_description']); ?>
			<div class="info-items">
              <ul>
                <li class="list-tags"><span><?php print t('Colours'); ?>:</span><p><?php print strip_tags(render($content['field_product_colors']), '<a>') ?></p></li>
                <li class="list-tags"><span><?php print t('Size'); ?>:</span><p><?php print strip_tags(render($content['field_product_size']), '<a>') ?></p></li>
              </ul>
            </div>
            <div class="cart-form">
				<?php
                  hide($content['links']);
                  hide($content['comments']);
                  hide($content['field_product_colors']);
                  hide($content['product:field_images']);
                  hide($content['product:commerce_price']);
                  hide($content['product:field_product_size']);
                  hide($content['field_product_tags']);
                  hide($content['product:sku']);
                  hide($content['field_product_categories']);
                  hide($content['body']);
                  print render($content);
                ?>
            </div>
			<div class="buttons-block">
				<i class="fa fa-heart-o"></i><?php print flag_create_link('wishlist', $node->nid); ?>
				<i class="fa fa-envelope-o"></i> <a target="_blank" href="mailto:youremailaddress@email.com"><?php print t('SEND TO FRIEND') ?></a> 
			</div>
			<ul class="list-inline footer-social">
				<li class="facebook"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php print $base_root.$node_url; ?>"><i class="fa fa-facebook"></i></a></li>
				<li class="twitter"><a target="_blank" href="https://twitter.com/intent/tweet?source=webclient&amp;text=<?php print $title; ?>+<?php print $base_root.$node_url; ?>"><i class="fa fa-twitter"></i></a></li>
				<li class="google-plus"><a target="_blank" href="https://plus.google.com/share?url=<?php print $base_root.$node_url; ?>"><i class="fa fa-google-plus"></i></a></li>
				<li class="pinteres"><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php print $base_root.$node_url; ?>&amp;media=<?php print $full_img; ?>&amp;description=<?php print $title; ?>"><i class="fa fa-pinterest"></i></a></li>
			</ul>
		</div>
	</div>
	<div class="row descriptio-tabs review">
		<div class="col-xs-12">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"><?php print t('DESCRIPTION'); ?></a></li>
				<li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab"><?php print t('REVIEW') ?>  (<?php print $comment_count; ?>)</a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="description">
				<?php
					hide($content['links']);
					hide($content['comments']);
					hide($content['field_product_colors']);
					hide($content['product:field_images']);
					hide($content['product:commerce_price']);
					hide($content['product:field_product_size']);
					hide($content['field_product_tags']);
					hide($content['product:sku']);
					hide($content['field_product_categories']);
					print render($content['body']);
                ?>
				</div>
				<!-- tabpanel -->
				<div role="tabpanel" class="tab-pane" id="review">
					<?php print render($content['comments']);?>
				</div>
			</div>
		</div>
	</div>
  	<?php } ?>
