<?php



function fakre_form_system_theme_settings_alter(&$form, &$form_state) {



  $form['#submit'][] = 'fakre_settings_form_submit';



  // Get all themes.

  $themes = list_themes();

  // Get the current theme

  $active_theme = $GLOBALS['theme_key'];

  $form_state['build_info']['files'][] = str_replace("/$active_theme.info", '', $themes[$active_theme]->filename) . '/theme-settings.php';



  $theme_path = drupal_get_path('theme', 'fakre');

  $form['settings'] = array(

      '#type' => 'vertical_tabs',

      '#title' => t('Theme settings'),

      '#weight' => 2,

      '#collapsible' => TRUE,

      '#collapsed' => FALSE,

      '#attached' => array(

          'css' => array(

            drupal_get_path('theme', 'fakre') . '/css/drupalet_base/admin.css',

            drupal_get_path('theme', 'fakre') . '/css/admin/update.css'

          ),

          'js' => array(

            drupal_get_path('theme', 'fakre') . '/js/drupalet_admin/admin.js',

          ),

      ),

  );



  $form['settings']['general_setting'] = array(

      '#type' => 'fieldset',

      '#title' => t('General Settings'),

      '#collapsible' => TRUE,

      '#collapsed' => FALSE,

  );



   $form['settings']['general_setting']['onepage'] = array(



      '#title' => t('Onepage'),



      '#type' => 'select',



      '#options' => array(

        'off' => t('OFF'),

        'on' => t('ON'),

      ),



      '#default_value' => theme_get_setting('onepage', 'fakre'),



  );



  $form['settings']['general_setting']['menu_nav'] = array(



      '#title' => t('Menu nav'),



      '#type' => 'select',



      '#options' => array(

        'on' => t('ON'),

        'off' => t('OFF'),

      ),



      '#default_value' => theme_get_setting('menu_nav', 'fakre'),



  );



  $form['settings']['general_setting']['page_title_background'] = array(

    '#type'     => 'managed_file',

    '#title'    => t('Page title background image'),

    '#required' => FALSE,

    '#upload_location' => 'public://background-icon/',

    '#default_value' => theme_get_setting('page_title_background','fakre'),

    '#upload_validators' => array(

    'file_validate_extensions' => array('gif png jpg jpeg'),

    ),

  );



  $form['settings']['general_setting']['general_setting_tracking_code'] = array(

      '#type' => 'textarea',

      '#title' => t('Tracking Code'),

      '#default_value' => theme_get_setting('general_setting_tracking_code', 'fakre'),

  );





  $form['settings']['header'] = array(

      '#type' => 'fieldset',

      '#title' => t('Header settings'),

      '#collapsible' => TRUE,

      '#collapsed' => FALSE,

  );



  $form['settings']['header']['header_layout'] = array(



      '#title' => t('Header layout'),



      '#type' => 'select',



      '#options' => array(

        'header1' => t('Layout 1'),

        'header2' => t('Layout 2a'),

        'header2b' => t('Layout 2b'),

        'header3' => t('Layout 3'),

        'header4' => t('Layout 4'),

        'header5' => t('Layout 5'),

        'header6' => t('Layout 6'),

        'header7' => t('Layout 7'),

        'header8' => t('Layout 8'),

        'header9' => t('Layout 9'),

        'header10' => t('Layout 10'),

        'header11' => t('Layout 11'),

        'header12' => t('Layout 12'),

        'header13' => t('Layout 13'),

        'header14' => t('Layout 14'),

        'header15' => t('Layout 15'),

        'header16' => t('Layout 16'),

        'header17' => t('Layout 17'),

        'header18' => t('Layout 18'),

        'header19' => t('Layout 19'),

      ),



      '#default_value' => theme_get_setting('header_layout', 'fakre'),



  );



  $form['settings']['header']['header_class'] = array(

      '#type' => 'texfield',

      '#title' => t('Header class'),

      '#default_value' => theme_get_setting('header_class', 'fakre'),

  );



   $form['settings']['header']['fixedmenu_logo'] = array(

    '#type'     => 'managed_file',

    '#title'    => t('Fixed menu logo'),

    '#required' => FALSE,

    '#upload_location' => 'public://logo-icon/',

    '#default_value' => theme_get_setting('fixedmenu_logo','fakre'),

    '#upload_validators' => array(

    'file_validate_extensions' => array('gif png jpg jpeg'),

    ),

  );



  $form['settings']['footer'] = array(

      '#type' => 'fieldset',

      '#title' => t('Footer settings'),

      '#collapsible' => TRUE,

      '#collapsed' => FALSE,

  );



  $form['settings']['footer']['footer_layout'] = array(



      '#title' => t('Footer layout'),



      '#type' => 'select',



      '#options' => array(

        'disable' => t('Disable'),

        'default' => t('Default'),

        'footer1' => t('Layout 1'),

        'footer2' => t('Layout 2a'),

        'footer3' => t('Layout 3'),

        'footer4' => t('Layout 4'),

        'footer5' => t('Layout 5'),

        'footer6' => t('Layout 6'),

        'footer7' => t('Layout 7'),

        'footer8' => t('Layout 8'),

        'footer9' => t('Layout 9'),

        'footer10' => t('Layout 10'),

        'footer11' => t('Layout 11'),

        'footer12' => t('Layout 12'),

        'footer13' => t('Layout 13'),

        'footer14' => t('Layout 14'),

        'footer15' => t('Layout 15'),

        'footer16' => t('Layout 16'),

        'footer17' => t('Layout 17'),

        'footer18' => t('Layout 18'),

        'footer19' => t('Layout 19'),

        'footer20' => t('Layout 20'),

      ),



      '#default_value' => theme_get_setting('footer_layout', 'fakre'),



  );



  $form['settings']['footer']['footer_column'] = array(



      '#title' => t('Footer column'),



      '#type' => 'select',



      '#options' => array(

        '2cols' => t('2 Columns'),

        '3cols' => t('3 Columns'),

        '4cols' => t('4 Columns'),

      ),



      '#default_value' => theme_get_setting('footer_column', 'fakre'),

  );



  $form['settings']['footer']['footer_background'] = array(

    '#type'     => 'managed_file',

    '#title'    => t('Footer background image'),

    '#required' => FALSE,

    '#upload_location' => 'public://background/',

    '#default_value' => theme_get_setting('footer_background','fakre'),

    '#upload_validators' => array(

    'file_validate_extensions' => array('gif png jpg jpeg'),

    ),

  );



  $form['settings']['footer']['footer_class'] = array(

      '#type' => 'textfield',

      '#title' => t('Footer class'),

      '#default_value' => theme_get_setting('footer_class', 'fakre'),

  );



  $form['settings']['footer']['footer_copyright_message'] = array(

      '#type' => 'textarea',

      '#title' => t('Footer copyright message'),

      '#default_value' => theme_get_setting('footer_copyright_message', 'fakre'),

  );



  //Portfolio setting

  $form['settings']['portfolio'] = array(

      '#type' => 'fieldset',

      '#title' => t('Portfolio settings'),

      '#collapsible' => TRUE,

      '#collapsed' => FALSE,

  );



  $form['settings']['portfolio']['portfolio_header_layout'] = array(



      '#title' => t('Header layout'),



      '#type' => 'select',



      '#options' => array(

        'header1' => t('Layout 1'),

        'header2' => t('Layout 2a'),

        'header2b' => t('Layout 2b'),

        'header3' => t('Layout 3'),

        'header4' => t('Layout 4'),

        'header5' => t('Layout 5'),

        'header6' => t('Layout 6'),

        'header7' => t('Layout 7'),

        'header8' => t('Layout 8'),

        'header9' => t('Layout 9'),

        'header10' => t('Layout 10'),

        'header11' => t('Layout 11'),

        'header12' => t('Layout 12'),

        'header13' => t('Layout 13'),

        'header14' => t('Layout 14'),

        'header15' => t('Layout 15'),

        'header16' => t('Layout 16'),

        'header17' => t('Layout 17'),

        'header18' => t('Layout 18'),

        'header19' => t('Layout 19'),

      ),



      '#default_value' => theme_get_setting('portfolio_header_layout', 'fakre'),



  );



  $form['settings']['portfolio']['portfolio_header_class'] = array(

      '#type' => 'textfield',

      '#title' => t('Header class'),

      '#size' => 30, 

      '#maxlength' => 30,

      '#default_value' => theme_get_setting('portfolio_header_class', 'fakre'),

  );



  $form['settings']['portfolio']['portfolio_layout'] = array(



      '#title' => t('Portfolio Layout'),



      '#type' => 'select',



      '#options' => array(



        'default' => t('Default'),

        'fullwidth' => t('Full Width'),

        'sidebarleft' => t('Sidebar Left'),

        'sidebarright' => t('Sidebar Right'),

        'sidebarboth' => t('Both Sidebar'),

        'vertical' => t('Vertical'),

      ),



      '#default_value' => theme_get_setting('portfolio_layout', 'fakre'),



  );



  $form['settings']['portfolio']['portfolio_style'] = array(



      '#title' => t('Portfolio Style'),



      '#type' => 'select',



      '#options' => array(



        'grid1colspace' => t('Grid 1col space'),

        'grid1colnospace' => t('Grid 1col nospace'),

        'grid2colsspace' => t('Grid 2cols space'),

        'grid2colsnospace' => t('Grid 2cols nospace'),

        'grid3colsspace' => t('Grid 3cols space'),

        'grid3colsnospace' => t('Grid 3cols nospace'),

        'grid4colsspace' => t('Grid 4cols space'),

        'grid4colsnospace' => t('Grid 4cols nospace'),

        'grid5colsspace' => t('Grid 5cols space'),

        'grid5colsnospace' => t('Grid 5cols nospace'),

        'grid6colsspace' => t('Grid 6cols space'),

        'grid6colsnospace' => t('Grid 6cols nospace'),

        'masonry2colsspace' => t('Masonry 2cols space'),

        'masonry2colsnospace' => t('Masonry 2cols nospace'),

        'masonry3colsspace' => t('Masonry 3cols space'),

        'masonry3colsnospace' => t('Masonry 3cols nospace'),

        'masonry4colsspace' => t('Masonry 4cols space'),

        'masonry4colsnospace' => t('Masonry 4cols nospace'),

        'masonry4colsfullwidthspace' => t('Masonry 4cols fullwidth space'),

        'masonry4colsfullwidthnospace' => t('Masonry 4cols fullwidth nospace'),

        'masonry5colsfullwidthspace' => t('Masonry 5cols fullwidth space'),

        'masonry5colsfullwidthnospace' => t('Masonry 4cols fullwidth nospace'),

        'masonryaltnospace' => t('Masonry alt nospace'),

        'fullwidth4colsspace' => t('Fullwidth 4cols space'),

        'fullwidth4colsnospace' => t('Fullwidth 4cols nospace'),

        'gridvertical1colspace' => t('Grid vertical 1col space'),

        'gridvertical1colnospace' => t('Grid vertical 1col nospace'),

        'gridvertical2colsspace' => t('Grid vertical 2cols space'),

        'gridvertical2colsnospace' => t('Grid vertical 2cols nospace'),

        'gridvertical3colsspace' => t('Grid vertical 3cols space'),

        'gridvertical3colsnospace' => t('Grid vertical 3cols nospace'),

        'gridvertical4colsspace' => t('Grid vertical 4cols space'),

        'gridvertical4colsnospace' => t('Grid vertical 4cols nospace'),

        'gridvertical5colsspace' => t('Grid vertical 5cols space'),

        'gridvertical5colsnospace' => t('Grid vertical 5cols nospace'),

        'parallax' => t('Parallax'),

        'parallaxfullwidth' => t('Parallax Full Width')

      ),



      '#default_value' => theme_get_setting('portfolio_style', 'fakre'),



  );



  $form['settings']['portfolio']['portfolio_logo'] = array(

    '#type'     => 'managed_file',

    '#title'    => t('Portfolio logo'),

    '#required' => FALSE,

    '#upload_location' => 'public://logo-icon/',

    '#default_value' => theme_get_setting('portfolio_logo','fakre'),

    '#upload_validators' => array(

    'file_validate_extensions' => array('gif png jpg jpeg'),

    ),

  );



  $form['settings']['portfolio']['portfolio_page_title_size'] = array(



      '#title' => t('Portfolio page tite size'),



      '#type' => 'select',



      '#options' => array(

        'default' => t('Default'),

        'small' => t('Small'),

      ),



      '#default_value' => theme_get_setting('portfolio_page_title_size', 'fakre'),



  );



   $form['settings']['portfolio']['portfolio_page_title_style'] = array(



      '#title' => t('Portfolio Page Title Style'),



      '#type' => 'select',



      '#options' => array(



        'leftalign' => t('Left Align'),

        'rightalign' => t('Right Align'),

        'centeralign' => t('Center Align'),

        'darkbg' => t('Dark Background'),

        'greybg' => t('Grey Background'),

        'imagebg' => t('Image Background'),

        'videobg' => t('Video Background'),

        'pattern' => t('Pattern Bacbground'),

      ),



      '#default_value' => theme_get_setting('portfolio_page_title_style', 'fakre'),



  );





  $form['settings']['portfolio']['portfolio_page_title_background'] = array(

    '#type'     => 'managed_file',

    '#title'    => t('Portfolio page title background '),

    '#required' => FALSE,

    '#upload_location' => 'public://background-icon/',

    '#default_value' => theme_get_setting('portfolio_page_title_background','fakre'),

    '#upload_validators' => array(

    'file_validate_extensions' => array('gif png jpg jpeg'),

    ),

  );



  $form['settings']['portfolio']['portfolio_slogan'] = array(

      '#type' => 'textfield',

      '#size' => 120, 

      '#maxlength' => 120,

      '#title' => t('Portfolio slogan'),

      '#default_value' => theme_get_setting('portfolio_slogan', 'fakre'),

  );



  $form['settings']['portfolio']['portfolio_footer_layout'] = array(



      '#title' => t('Footer layout'),



      '#type' => 'select',



      '#options' => array(

        'disable' => t('Disable'),

        'default' => t('Default'),

        'footer1' => t('Layout 1'),

        'footer2' => t('Layout 2a'),

        'footer3' => t('Layout 3'),

        'footer4' => t('Layout 4'),

        'footer5' => t('Layout 5'),

        'footer6' => t('Layout 6'),

        'footer7' => t('Layout 7'),

        'footer8' => t('Layout 8'),

        'footer9' => t('Layout 9'),

        'footer10' => t('Layout 10'),

        'footer11' => t('Layout 11'),

        'footer12' => t('Layout 12'),

        'footer13' => t('Layout 13'),

        'footer14' => t('Layout 14'),

        'footer15' => t('Layout 15'),

        'footer16' => t('Layout 16'),

        'footer17' => t('Layout 17'),

        'footer18' => t('Layout 18'),

        'footer19' => t('Layout 19'),

        'footer20' => t('Layout 20'),

      ),



      '#default_value' => theme_get_setting('portfolio_footer_layout', 'fakre'),



  );





  $form['settings']['portfolio']['portfolio_footer_background'] = array(

    '#type'     => 'managed_file',

    '#title'    => t('Footer background image'),

    '#required' => FALSE,

    '#upload_location' => 'public://background/',

    '#default_value' => theme_get_setting('portfolio_footer_background','fakre'),

    '#upload_validators' => array(

    'file_validate_extensions' => array('gif png jpg jpeg'),

    ),

  );



  $form['settings']['portfolio']['portfolio_footer_class'] = array(

      '#type' => 'textfield',

      '#title' => t('Footer class'),

      '#default_value' => theme_get_setting('portfolio_footer_class', 'fakre'),

  );



  

  //Shop setting

  $form['settings']['shop'] = array(

      '#type' => 'fieldset',

      '#title' => t('Shop settings'),

      '#collapsible' => TRUE,

      '#collapsed' => FALSE,

  );



  $form['settings']['shop']['shop_header_layout'] = array(



      '#title' => t('Header layout'),



      '#type' => 'select',



      '#options' => array(

        'header1' => t('Layout 1'),

        'header2' => t('Layout 2a'),

        'header2b' => t('Layout 2b'),

        'header3' => t('Layout 3'),

        'header4' => t('Layout 4'),

        'header5' => t('Layout 5'),

        'header6' => t('Layout 6'),

        'header7' => t('Layout 7'),

        'header8' => t('Layout 8'),

        'header9' => t('Layout 9'),

        'header10' => t('Layout 10'),

        'header11' => t('Layout 11'),

        'header12' => t('Layout 12'),

        'header13' => t('Layout 13'),

        'header14' => t('Layout 14'),

        'header15' => t('Layout 15'),

        'header16' => t('Layout 16'),

        'header17' => t('Layout 17'),

        'header18' => t('Layout 18'),

        'header19' => t('Layout 19'),

      ),



      '#default_value' => theme_get_setting('shop_header_layout', 'fakre'),



  );



  $form['settings']['shop']['shop_header_class'] = array(

      '#type' => 'textfield',

      '#title' => t('Header class'),

      '#size' => 30, 

      '#maxlength' => 30,

      '#default_value' => theme_get_setting('shop_header_class', 'fakre'),

  );



  $form['settings']['shop']['shop_style'] = array(



      '#title' => t('Shop catalog style'),



      '#type' => 'select',



      '#options' => array(

        'grid3cols' => t('Grid 3 Columns'),

        'grid3cols_leftsidebar' => t('Grid 3 Columns Leftsidebar'),

        'grid3cols_rightsidebar' => t('Grid 3 Columns Rightsidebar'),

        'grid4cols' => t('Grid 4 Columns'),

        'grid4cols_leftsidebar' => t('Grid 4 Columns Leftsidebar'),

        'grid4cols_rightsidebar' => t('Grid 4 Columns Rightsidebar'),

        'fullwidth' => t('Full Width'),

        'listdefault' => t('List default'),

        'list_leftsidebar' => t('List Leftsidebar'),

        'list_rightsidebar' => t('List Rightsidebar'),

      ),



      '#default_value' => theme_get_setting('shop_style', 'fakre'),



  );



  $form['settings']['shop']['shop_page_title_size'] = array(



      '#title' => t('Shop page tite size'),



      '#type' => 'select',



      '#options' => array(

        'default' => t('Default'),

        'small' => t('Small'),

      ),



      '#default_value' => theme_get_setting('shop_page_title_size', 'fakre'),



  );



   $form['settings']['shop']['shop_page_title_style'] = array(



      '#title' => t('Shop Page Title Style'),



      '#type' => 'select',



      '#options' => array(



        'leftalign' => t('Left Align'),

        'rightalign' => t('Right Align'),

        'centeralign' => t('Center Align'),

        'darkbg' => t('Dark Background'),

        'greybg' => t('Grey Background'),

        'imagebg' => t('Image Background'),

        'videobg' => t('Video Background'),

        'pattern' => t('Pattern Bacbground'),

      ),



      '#default_value' => theme_get_setting('shop_page_title_style', 'fakre'),



  );



  $form['settings']['shop']['shop_background_breadcrumb'] = array(

    '#type'     => 'managed_file',

    '#title'    => t('Shop breadcrumb background '),

    '#required' => FALSE,

    '#upload_location' => 'public://background-icon/',

    '#default_value' => theme_get_setting('shop_background_breadcrumb','fakre'),

    '#upload_validators' => array(

    'file_validate_extensions' => array('gif png jpg jpeg'),

    ),

  );



  $form['settings']['shop']['shop_slogan'] = array(

      '#type' => 'textfield',

      '#size' => 120, 

      '#maxlength' => 120,

      '#title' => t('Shop slogan'),

      '#default_value' => theme_get_setting('shop_slogan', 'fakre'),

  );



  $form['settings']['shop']['shop_footer_layout'] = array(



      '#title' => t('Footer layout'),



      '#type' => 'select',



      '#options' => array(

        'disable' => t('Disable'),

        'default' => t('Default'),

        'footer1' => t('Layout 1'),

        'footer2' => t('Layout 2a'),

        'footer3' => t('Layout 3'),

        'footer4' => t('Layout 4'),

        'footer5' => t('Layout 5'),

        'footer6' => t('Layout 6'),

        'footer7' => t('Layout 7'),

        'footer8' => t('Layout 8'),

        'footer9' => t('Layout 9'),

        'footer10' => t('Layout 10'),

        'footer11' => t('Layout 11'),

        'footer12' => t('Layout 12'),

        'footer13' => t('Layout 13'),

        'footer14' => t('Layout 14'),

        'footer15' => t('Layout 15'),

        'footer16' => t('Layout 16'),

        'footer17' => t('Layout 17'),

        'footer18' => t('Layout 18'),

        'footer19' => t('Layout 19'),

        'footer20' => t('Layout 20'),

      ),



      '#default_value' => theme_get_setting('shop_footer_layout', 'fakre'),



  );



  $form['settings']['shop']['shop_footer_background'] = array(

    '#type'     => 'managed_file',

    '#title'    => t('Footer background image'),

    '#required' => FALSE,

    '#upload_location' => 'public://background/',

    '#default_value' => theme_get_setting('shop_footer_background','fakre'),

    '#upload_validators' => array(

    'file_validate_extensions' => array('gif png jpg jpeg'),

    ),

  );



  $form['settings']['shop']['shop_footer_class'] = array(

      '#type' => 'textfield',

      '#title' => t('Footer class'),

      '#default_value' => theme_get_setting('shop_footer_class', 'fakre'),

  );





   $form['settings']['blog'] = array(

      '#type' => 'fieldset',

      '#title' => t('Blog settings'),

      '#collapsible' => TRUE,

      '#collapsed' => FALSE,

  );



  $form['settings']['blog']['blog_header_layout'] = array(



      '#title' => t('Header layout'),



      '#type' => 'select',



      '#options' => array(

        'header1' => t('Layout 1'),

        'header2' => t('Layout 2a'),

        'header2b' => t('Layout 2b'),

        'header3' => t('Layout 3'),

        'header4' => t('Layout 4'),

        'header5' => t('Layout 5'),

        'header6' => t('Layout 6'),

        'header7' => t('Layout 7'),

        'header8' => t('Layout 8'),

        'header9' => t('Layout 9'),

        'header10' => t('Layout 10'),

        'header11' => t('Layout 11'),

        'header12' => t('Layout 12'),

        'header13' => t('Layout 13'),

        'header14' => t('Layout 14'),

        'header15' => t('Layout 15'),

        'header16' => t('Layout 16'),

        'header17' => t('Layout 17'),

        'header18' => t('Layout 18'),

        'header19' => t('Layout 19'),

      ),



      '#default_value' => theme_get_setting('blog_header_layout', 'fakre'),



  );



  $form['settings']['blog']['blog_header_class'] = array(

      '#type' => 'textfield',

      '#title' => t('Header class'),

      '#size' => 30, 

      '#maxlength' => 30,

      '#default_value' => theme_get_setting('blog_header_class', 'fakre'),

  );



  $form['settings']['blog']['blog_layout_style'] = array(



      '#title' => t('Blog Layout Style'),



      '#type' => 'select',



      '#options' => array(

        'alt_default' => t('Blog Alt Default'),

        'alt_default_leftsidebar' => t('Blog Alt Default Leftsidebar'),

        'alt_default_rightsidebar' => t('Blog Alt Default Rightsidebar'),

        'alt2_default' => t('Blog Alt2 Default'),

        'alt2_default_leftsidebar' => t('Blog Alt Default Leftsidebar'),

        'alt2_default_rightsidebar' => t('Blog Alt Default Rightsidebar'),

        'grid2colsspace' => t('Grid 2column with space'),

        'grid2colsnospace' => t('Grid 2column without space'),

        'grid3colsspace' => t('Grid 3column with space'),

        'grid3colsnospace' => t('Grid 3column without space'),

        'grid4colsspace' => t('Grid 4column with space'),

        'grid4colsnospace' => t('Grid 4column without space'),

        'gridfullwidthspace' => t('Grid Fullwidth with space'),

        'gridfullwidthnospace' => t('Grid Fullwidth without space'),

        'masonry2colsspace' => t('Masonry 2column with space'),

        'masonry2colsnospace' => t('Masonry 2column without space'),

        'masonry3colsspace' => t('Masonry 3column with space'),

        'masonry3colsnospace' => t('Masonry 3column without space'),

        'masonry4colsspace' => t('Masonry 4column with space'),

        'masonry4colsnospace' => t('Masonry 4column without space'),

        'masonryfullwidthspace' => t('Masonry Fulwidth with space'),

        'masonryfullwidthnospace' => t('Masonry Fulwidth without space'),

        'fullwidth' => t('Blog Full Width'),

        'fullwidth_list' => t('Blog Full Width List'),

        'fullwidth_leftsidebar' => t('Blog Full Width Left Sidebar'),

        'fullwidth_rightsidebar' => t('Blog Full Width Right Sidebar'),

        'fullwidth_bothsidebar' => t('Blog Full Width Both Sidebar'),

        'fullwidth_accordion' => t('Blog Full Width Accordion'),

        'fullwidth_accordion_leftsidebar' => t('Blog Full Width Accordion Leftsidebar'),

        'fullwidth_accordion_rightsidebar' => t('Blog Full Width Accordion Rightsidebar'),

        'fullwidth_accordion_bothsidebar' => t('Blog Full Width Accordion Bothsidebar'),

      ),



      '#default_value' => theme_get_setting('blog_layout_style', 'fakre'),



  );

  

   $form['settings']['blog']['blog_page_title_size'] = array(



      '#title' => t('Blog page tite size'),



      '#type' => 'select',



      '#options' => array(

        'default' => t('Default'),

        'small' => t('Small'),

      ),



      '#default_value' => theme_get_setting('blog_page_title_size', 'fakre'),



  );



   $form['settings']['blog']['blog_page_title_style'] = array(



      '#title' => t('Blog Page Title Style'),



      '#type' => 'select',



      '#options' => array(



        'leftalign' => t('Left Align'),

        'rightalign' => t('Right Align'),

        'centeralign' => t('Center Align'),

        'darkbg' => t('Dark Background'),

        'greybg' => t('Grey Background'),

        'imagebg' => t('Image Background'),

        'videobg' => t('Video Background'),

        'pattern' => t('Pattern Bacbground'),

      ),



      '#default_value' => theme_get_setting('blog_page_title_style', 'fakre'),



  );



   $form['settings']['blog']['blog_background_page_title'] = array(

    '#type'     => 'managed_file',

    '#title'    => t('Blog page title background '),

    '#required' => FALSE,

    '#upload_location' => 'public://background-icon/',

    '#default_value' => theme_get_setting('blog_background_page_title','fakre'),

    '#upload_validators' => array(

    'file_validate_extensions' => array('gif png jpg jpeg'),

    ),

  );



   $form['settings']['blog']['blog_footer_layout'] = array(



      '#title' => t('Footer layout'),



      '#type' => 'select',



      '#options' => array(

        'disable' => t('Disable'),

        'default' => t('Default'),

        'footer1' => t('Layout 1'),

        'footer2' => t('Layout 2a'),

        'footer3' => t('Layout 3'),

        'footer4' => t('Layout 4'),

        'footer5' => t('Layout 5'),

        'footer6' => t('Layout 6'),

        'footer7' => t('Layout 7'),

        'footer8' => t('Layout 8'),

        'footer9' => t('Layout 9'),

        'footer10' => t('Layout 10'),

        'footer11' => t('Layout 11'),

        'footer12' => t('Layout 12'),

        'footer13' => t('Layout 13'),

        'footer14' => t('Layout 14'),

        'footer15' => t('Layout 15'),

        'footer16' => t('Layout 16'),

        'footer17' => t('Layout 17'),

        'footer18' => t('Layout 18'),

        'footer19' => t('Layout 19'),

        'footer20' => t('Layout 20'),

      ),



      '#default_value' => theme_get_setting('blog_footer_layout', 'fakre'),



  );



  $form['settings']['blog']['blog_footer_background'] = array(

    '#type'     => 'managed_file',

    '#title'    => t('Footer background image'),

    '#required' => FALSE,

    '#upload_location' => 'public://background/',

    '#default_value' => theme_get_setting('blog_footer_background','fakre'),

    '#upload_validators' => array(

    'file_validate_extensions' => array('gif png jpg jpeg'),

    ),

  );



  $form['settings']['blog']['blog_footer_class'] = array(

      '#type' => 'textfield',

      '#title' => t('Footer class'),

      '#default_value' => theme_get_setting('blog_footer_class', 'fakre'),

  );





	$form['settings']['custom_css'] = array(

		  '#type' => 'fieldset',

		  '#title' => t('Custom CSS'),

		  '#collapsible' => TRUE,

		  '#collapsed' => FALSE,

	  );



	$form['settings']['custom_css']['custom_css'] = array(

		  '#type' => 'textarea',

		  '#title' => t('Custom CSS'),

		  '#default_value' => theme_get_setting('custom_css', 'fakre'),

		  '#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')

	  );



    $form['settings']['skin'] = array(

        '#type' => 'fieldset',

        '#title' => t('Switcher Style'),

        '#collapsible' => TRUE,

        '#collapsed' => FALSE,

    );


  //Disable Switcher style;

  $form['settings']['skin']['fakre_disable_switch'] = array(

      '#title' => t('Switcher style'),

      '#type' => 'select',

      '#options' => array('on' => t('ON'), 'off' => t('OFF')),

      '#default_value' => theme_get_setting('fakre_disable_switch', 'fakre'),

  );

  $form['settings']['skin']['fakre_disable_switch'] = array(

      '#title' => t('Switcher style'),

      '#type' => 'select',

      '#options' => array('on' => t('ON'), 'off' => t('OFF')),

      '#default_value' => theme_get_setting('fakre_disable_switch', 'fakre'),

  );

  $form['settings']['skin']['fakre_theme_style'] = array(

      '#title' => t('Theme style'),

      '#type' => 'select',

      '#options' => array('light' => t('LIGHT'), 'dark' => t('DARK')),

      '#default_value' => theme_get_setting('fakre_theme_style', 'fakre'),

  );

  $form['settings']['skin']['built_in_skins'] = array(
      '#type' => 'radios',
    '#title' => t('Color scheme'),
    '#options' => array(
        'color.css' => t('Default'),
        'awesome.css' => t('Awesome'),
        'ball-blue.css' => t('Ball blue'),
        'bleu-de-france.css' => t('Bleu-de-france'),
        'bleu-de-france2.css' => t('Bleu-de-france2'),
        'chateau-green.css' => t('Chateau-green'),
        'dark-pastel-red.css' => t('Dark-pastel-red'),
        'deep-lilac.css' => t('Deep-lilac'),
        'di-serria.css' => t('Di-serria'),
        'light-green.css' => t('Light-green'),
        'light-taupe.css' => t('Light-taupe'),
        'my-sin.css' => t('My sin'),
        'niagara.css' => t('Niagara'),
        'orange.css' => t('Orange'),
        'pastel-orange.css' => t('Pastel-orange'),
        'pastel-red.css' => t('Pastel-red'),
        'pastel-red2.css' => t('Pastel-red2'),
        'rich-electric-blue.css' => t('Rich-electric-blue'),
        'rodeo-dust.css' => t('Rodeo-dust'),
        'sun.css' => t('Sun'),
        'sunglo.css' => t('Sunglo'),
        'twine.css' => t('Twine'),
        'ucla-gold.css' => t('Ucla-gold'),
        'yellow.css' => t('yellow'),
        'zest.css' => t('zest'),
    ),


    '#default_value' => theme_get_setting('built_in_skins','fakre')
  );




}



function fakre_settings_form_submit(&$form, $form_state) {



  $image_fid[0] = $form_state['values']['portfolio_page_title_background'];

  $image_fid[1] = $form_state['values']['fixedmenu_logo'];

  $image_fid[2] = $form_state['values']['blog_background_page_title'];

  $image_fid[3] = $form_state['values']['portfolio_logo'];

  $image_fid[4] = $form_state['values']['page_title_background'];

  $image_fid[5] = $form_state['values']['footer_background'];

  $image_fid[6] = $form_state['values']['shop_background_breadcrumb'];

  $image_fid[7] = $form_state['values']['shop_footer_background'];

  $image_fid[8] = $form_state['values']['portfolio_footer_background'];

  $image_fid[9] = $form_state['values']['blog_footer_background'];

  for ($i=0; $i < 10; $i++) {

    $image[$i] = file_load($image_fid[$i]);

    if (is_object($image[$i])) {

      // Check to make sure that the file is set to be permanent.

      if ($image[$i]->status == 0) {

        // Update the status.

        $image[$i]->status = FILE_STATUS_PERMANENT;

        // Save the update.

        file_save($image[$i]);

        // Add a reference to prevent warnings.

        file_usage_add($image[$i], 'fakre', 'theme', 1);

      }

    }

  }


}