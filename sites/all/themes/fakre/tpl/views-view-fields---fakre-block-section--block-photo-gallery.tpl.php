<?php
	$nid = $row->nid;
	$node = node_load($nid);
	//print_r($node->field_images);
	$i = 0;
	if (isset($node->field_images) && !empty($node->field_images)) {
		foreach ($node->field_images['und'] as $key => $value) {
			$alt = $node->field_images['und'][$key]['alt'];
			$img_url = file_create_url($node->field_images['und'][$key]['uri']);
			$i++;
			if ($i < 11) {
				if ($i == 1 || $i == 7):
					$img = image_style_url('image_568x566', $node->field_images['und'][$key]['uri']);
					print '<div class="box half item"><img src="'.$img.'" alt="'.$alt.'" class="img-responsive">';
					print '<div class="over"><a href="'.$img_url.'" class="lightbox"><i class="fa fa-search-plus"></i></a>';
					print '</div></div>';
				else:
					$img = image_style_url('image_270x270', $node->field_images['und'][$key]['uri']);
					print '<div class="box item"><img src="'.$img.'" alt="'.$alt.'" class="img-responsive">';
					print '<div class="over"><a href="'.$img_url.'" class="lightbox"><i class="fa fa-search-plus"></i></a>';
					print '</div></div>';
				endif;
			} else break;
		}
	}
?>