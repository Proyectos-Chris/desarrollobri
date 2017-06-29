<?php
global $base_url;

function fakre_preprocess_html(&$variables) {
	// GOOGLE FONT
	drupal_add_css('https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic%7CPlayfair+Display:400,400italic,700,700italic,900,900italic%7CRoboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900%7CRaleway:400,100,200,300,500,600,700,800,900%7CGreat+Vibes%7CPoppins:400,300,500,600,700', array('type' => 'external','scope' => 'header'));
	drupal_add_js('https://maps.googleapis.com/maps/api/js', array('type' => 'external','scope' => 'footer'));
	if (arg(0) == 'node' && is_numeric(arg(1))) {
      $node = entity_load_unchanged('node', arg(1));

      if (isset($node ->field_body_class['und'][0]['value']) && $node ->field_body_class['und'][0]['value']) {
        $variables['home_body_class'] = $node ->field_body_class['und'][0]['value'];
      }
      if (isset($node ->field_header_layout['und'][0]['value']) && $node ->field_header_layout['und'][0]['value']) {
        $variables['menu_layout'] = $node ->field_header_layout['und'][0]['value'];
      }
      if (isset($node ->field_color_stylesheet) && $node ->field_color_stylesheet['und'][0]['value']) {
        $setting_skin = $node ->field_color_stylesheet['und'][0]['value'];
      } else {
      	$setting_skin = theme_get_setting('built_in_skins', 'fakre');
      }
    } else {
    	$setting_skin = theme_get_setting('built_in_skins', 'fakre');
    }

    // Add css skind

	if(!empty($setting_skin)){
		$skin_color = '/css/color/'.$setting_skin;
	}else{
		$skin_color = '/css/color/color.css';
	}
	$css_skin = array(
		'#tag' => 'link', // The #tag is the html tag - <link />
		'#attributes' => array( // Set up an array of attributes inside the tag
		'href' => base_path().path_to_theme().$skin_color,
		'rel' => 'stylesheet',
		'type' => 'text/css',
		'id' => 'skin',
		'data-baseurl'=>base_path().path_to_theme()
		),
		'#weight' => 1,
	);
	drupal_add_html_head($css_skin, 'skin');
}



function fakre_form_comment_form_alter(&$form, &$form_state) {
  $form['comment_body']['#after_build'][] = 'fakre_customize_comment_form';
	// echo '<pre>'; print_r($form['#id']);echo '</pre>';
   	$form['#action']=false;
	$form['author']['name']['#required'] = TRUE;
}

function fakre_customize_comment_form(&$form) {
  $form[LANGUAGE_NONE][0]['format']['#access'] = FALSE;
  return $form;
}

function fakre_preprocess_page(&$vars) {

	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
	}

	//404 page
	$status = drupal_get_http_header("status");
	if($status == "404 Not Found") {
		$vars['theme_hook_suggestions'][] = 'page__404';
	}

	//Taxonomy page
	if (arg(0) == 'taxonomy') {
    	$vars['theme_hook_suggestions'][] = 'page__taxonomy';
  	}
  	if (arg(0) == 'taxonomy' && arg(1) == 'term') {
    	$term = taxonomy_term_load(arg(2));
	    $vocabulary = taxonomy_vocabulary_load($term->vid);
	    $vars['theme_hook_suggestions'][] = 'page__taxonomy_' . $vocabulary->machine_name;
  	}

  	$views_page = views_get_page_view();
	//View portfolio template
  	if(isset($views_page) && $views_page->name =='_fakre_portfolio') {
    	$vars['theme_hook_suggestions'][] = 'page__views_portfolio';
	}

	//View shop template
  	if(isset($views_page) && $views_page->name =='_fakre_shop')   {
    	$vars['theme_hook_suggestions'][] = 'page__shop';
	}

}


// Remove superfish css files.
function fakre_css_alter(&$css) {
	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);

//	unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
}

function fakre_form_alter(&$form, &$form_state, $form_id) {
	if ($form_id == 'search_block_form') {
		//print_r($form);
		$form['actions']['submit']['#value'] = decode_entities('&#xf002;');
		$form['actions']['submit']['#attributes']['class'][] = 'submit';
		$form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
		$form['search_block_form']['#default_value'] = t(''); // Set a default value for the textfield
		$form['search_block_form']['#attributes']['id'] = array("m_search");
		$form['search_block_form']['#attributes']['placeholder'] = t('Search...');
		$form['search_block_form']['#attributes']['class'][] = 'search-field form-control';
		//disabled submit button
		//unset($form['actions']['submit']);
		unset($form['search_block_form']['#title']);
		$form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
	}
	if($form_id == 'contact_site_form'){
		$form['mail']['#attributes']['class'] = array("input-contact-form");
		$form['name']['#attributes']['class'] = array("input-contact-form");
		$form['subject']['#attributes']['class'] = array("input-contact-form");
		$form['message']['#attributes']['class'] = array("message-contact-form");
		$form['actions']['submit']['#attributes']['class'] = array('btn btn-success contact-form-button');
	}
	if ($form_id == 'comment_form') {
		$form['comment_filter']['format'] = array(); // nuke wysiwyg from comments
		
	}


}


function fakre_textarea($variables) {
  $element = $variables['element'];
  $element['#attributes']['name'] = $element['#name'];
  $element['#attributes']['id'] = $element['#id'];
  $element['#attributes']['cols'] = $element['#cols'];
  $element['#attributes']['rows'] = $element['#rows'];
  _form_set_class($element, array('form-textarea'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper'),
  );

  // Add resizable behavior.
  if (!empty($element['#resizable'])) {
    $wrapper_attributes['class'][] = 'resizable';
  }

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}
function fakre_breadcrumb($variables) {
	$crumbs ='<ul class="list-inline breadcrumbs">';
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		if(isset($breadcrumb[2])) unset($breadcrumb[2]);		
		foreach($breadcrumb as $value) {

			$crumbs .= '<li>'.$value.'</li>';
		}
		$crumbs .= '<li class="active">'.drupal_get_title().'</li>';
		return $crumbs.'</ul>';
	}else{
		return NULL;
	}
}
//custom main menu
function fakre_menu_tree__main_menu(array $variables) {
	$str = '';
	$str .= '<ul class="list-inline nav-top">';
		$str .= $variables['tree'];
	$str .= '</ul>';

	return $str;
}


/**Override Menu theme */

function fakre_menu_tree__menu_top_menu($variables) {
	$str = '<nav class="top-nav">';
	$str .= '<ul class="list-inline">';
		$str .= $variables['tree'];
	$str .= '</ul>';

	return $str.'</nav>';
}

function fakre_menu_tree__menu_one_menu($variables) {
	$str = '';
	$str .= '<ul class="list-inline nav-top onemenu">';
		$str .= $variables['tree'];
	$str .= '</ul>';

	return $str;
}

function fakre_menu_tree__menu_footer_menu($variables) {
	$str = '';
	$str .= '<ul class="list-inline footer-nav">';
		$str .= $variables['tree'];
	$str .= '</ul>';

	return $str;
}

function fakre_menu_tree__menu_pages_menu($variables) {
	$str = '';
	$str .= '<ul class="list-unstyled widget-nav">';
		$str .= $variables['tree'];
	$str .= '</ul>';

	return $str;
}

function fakre_menu_tree__menu_side_menu($variables) {
	$str = '';
	$str .= '<ul class="list-unstyled">';
		$str .= $variables['tree'];
	$str .= '</ul>';

	return $str;
}

function fakre_theme() {
  	return array(
	    'comment_form' => array(
	      'arguments' => array('form' => NULL),
	      'template' => 'tpl/comment-form',
	      'render element' => 'form'
	    ),
  	);

}

//Themming comment form product


//Themming form add to cart

function fakre_form_commerce_cart_add_to_cart_form_alter(&$form, &$form_state, $form_id) {

  //drupal_set_message($form_id);
	// print_r($form['quantity']);
	// $form['quantity']['#title'] == 'numberfield';
	// $form['submit']['#attributes']['value'] = decode_entities('&#xf217;');
	$form['submit']['#attributes']['class'] = array("btn btn-primary btn-theme");
	// $form['submit']['#attributes']['data-toggle'] = "tooltip";


}

function hook_preprocess_page(&$variables) {
       if (arg(0) == 'node' && is_numeric($nid)) {
    if (isset($variables['page']['content']['system_main']['nodes'][$nid])) {
      $variables['node_content'] =& $variables['page']['content']['system_main']['nodes'][$nid];
      if (empty($variables['node_content']['field_show_page_title'])) {
        $variables['node_content']['field_show_page_title'] = NULL;
      }
    }
  }
}


function getRelatedPosts($ntype,$nid,$image){
	$nids = db_query("SELECT n.nid, title FROM {node} n WHERE n.status = 1 AND n.type = :type AND n.nid <> :nid ORDER BY RAND() LIMIT 0,6", array(':type' => $ntype, ':nid' => $nid))->fetchCol();
	$nodes = node_load_multiple($nids);
	$return_string = '<div class="row related-posts">' ;
	$i = 0;
	if (!empty($nodes)):
		foreach ($nodes as $node) :
			$field_image = field_get_items('node', $node, $image);
		if (!empty($field_image[0]) && $i < 3) {
			$i++;
			$return_string .= '<div class="col-sm-6 col-md-4 col-lg-4 wow fadeIn pb-50" >';
			$return_string .= '<div class="post-prev-img">';
			$return_string .= '<a href="'.url("node/" . $node->nid).'">';
			$return_string .= theme('image_style', array('style_name' => 'image_650x415', 'path' => $field_image[0]['uri'], 'attributes'=>array('alt'=>$node->title)));
			$return_string .= '</a></div>';
			$return_string .= '<div class="post-prev-title"><h3>';
			$return_string .= '<a href="'.url("node/" . $node->nid).'">'.$node->title.'</a></h3></div>';
			$return_string .= '<div class="post-prev-info">'.format_date($node->created, 'custom', 'F d').'<span class="slash-divider">/</span>';
			$return_string .= $node->name.'</div></div>';
		}
		endforeach;
	endif;
	return $return_string.'</div>';
}

function fakre_menu_link(array $variables) {
  	$element = $variables['element'];
  	$sub_menu = '';
  	if($element['#original_link']['menu_name'] == 'main-menu' || $element['#original_link']['menu_name'] == 'menu-side-menu') {

	  	if ($element['#below'] && $element['#original_link']['depth'] == 1) {
	  		unset($element['#below']['#theme_wrappers']);
	  		$element['#attributes']['class'][] = 'level-' . $element['#original_link']['depth'];
	  		$sub_menu = '<ul class="list-unstyled">'.drupal_render($element['#below']).'</ul>';
	    } elseif ($element['#below'] && $element['#original_link']['depth'] != 1 ) {
	    	unset($element['#below']['#theme_wrappers']);
	    	$sub_menu = '<ul class="list-unstyled">'.drupal_render($element['#below']).'</ul>';
	  	} else {
	  		$element['#attributes']['class'][] = 'level-' . $element['#original_link']['depth'];
	  	}
	 //  	if (strpos(url($element['#href']), 'nolink')) {
	 //  		$link = substr(url($element['#href']), 13);
	 //    	$output = '<a href="'.$link.'" class="nolink">' . $element['#title'] . '</a>';
		// } else {
		//   	$output = l($element['#title'], $element['#href'], $element['#localized_options']);
		// }
		$output = l($element['#title'], $element['#href'], $element['#localized_options']);

	} elseif ($element['#original_link']['menu_name'] == 'menu-pages-menu') {
		$element['#localized_options']['html'] = TRUE;
		$element['#title'] = '<i class="fa fa-angle-right"></i>'.$element['#title'];
		$output = l($element['#title'], $element['#href'], $element['#localized_options']);
	} else {
		if ($element['#below']) {
	    $sub_menu = drupal_render($element['#below']);
	  	}
		 if (strpos(url($element['#href']), 'nolink')) {
		    $link = substr(url($element['#href']), 13);
		    $output = '<a href="'.$link.'" class="nolink">' . $element['#title'] . '</a>';
		} else {
		    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
		}
	}
	return '<li' . drupal_attributes($element ['#attributes']) . '>' . $output . $sub_menu . "</li>\n";

}

function single_navigation ($ntype,$nid, $nav) {
	$current_node = node_load($nid);
	$prev_nid = db_query("SELECT n.nid FROM {node} n WHERE n.type = :type AND n.status = 1 AND n.created < :created ORDER BY n.created DESC LIMIT 1", array(':created' => $current_node->created, ':type' => $ntype))->fetchField();
	$next_nid = db_query("SELECT n.nid FROM {node} n WHERE n.type = :type AND n.status = 1 AND n.created > :created LIMIT 1", array(':created' => $current_node->created, ':type' => $ntype))->fetchField();
	$link = '';
	if ($prev_nid > 0 && $nav == 'prev') {
		$node = node_load($prev_nid);
	  	$link .= '<a href="'.url("node/" . $node->nid).'" class="prev"><i class="fa fa-angle-left"></i></a>';
	} elseif ($next_nid > 0 && $nav == 'next') {
		$node = node_load($next_nid);
	  	$link .= '<a href="'.url("node/" . $node->nid).'" class="next"><i class="fa fa-angle-right"></i></a>';
	}
	return $link;

}

if (!function_exists('trim_text'))
{
	function trim_text($input, $length, $ellipses = true, $strip_html = true) {
	//strip tags, if desired
		if ($strip_html) {
			$input = strip_tags($input);
		}
		//no need to trim, already shorter than trim length
		if (strlen($input) <= $length) {
			return $input;
		}
		//find last space within length
		$last_space = strrpos(substr($input, 0, $length), ' ');
		$trimmed_text = substr($input, 0, $last_space);
		//add ellipses (...)
		if ($ellipses) {
			$trimmed_text .= '...';
		}
		return $trimmed_text;
	}
}
function getCountPost ($nid) {
	$sql = "SELECT count(n.uid) as num_nodes
	FROM node n
	LEFT JOIN users u ON u.uid = n.uid
	WHERE n.uid=$nid
	GROUP BY u.uid";
	if ($result = db_query($sql)) {
	  	$data = $result->fetchObject(); 
	  	$s = $data->num_nodes;
	} else $s = 0;
	return $s;
}