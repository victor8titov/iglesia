<?php
/**
 * Get current theme options
 * 
 * @return array
 */
function aletheme_get_options() {
	$comments_style = array(
		'wp'  => 'Alethemes Comments',
		'fb'  => 'Facebook Comments',
		'dq'  => 'DISQUS',
		'lf'  => 'Livefyre',
		'off' => 'Disable All Comments',
	);

    $headerfont = array_merge(ale_get_safe_webfonts(), ale_get_google_webfonts());

    $background_defaults = array(
        'color' => '',
        'image' => '',
        'repeat' => 'repeat',
        'position' => 'top center',
        'attachment'=>'scroll'
    );

	
	$imagepath =  ALETHEME_URL . '/assets/images/';
	
	$options = array();
		
	$options[] = array("name" => "Theme",
						"type" => "heading");

    $options[] = array( "name" => "Site Logo",
                        "desc" => "Upload or put the site logo link ",
                        "id" => "ale_sitelogo",
                        "std" => "",
                        "type" => "upload");

    $options[] = array( "name" => "Site Footer Logo",
                        "desc" => "Upload or put the site logo link ",
                        "id" => "ale_footerlogo",
                        "std" => "",
                        "type" => "upload");
						
	 $options[] = array( "name" => "Insert The Slider Slug",
                        "desc" => "Get the slug on the Sliders Setting Page",
                        "id" => "ale_homesliderslug",
                        "std" => "",
                        "type" => "text",
                        );					

    $options[] = array( 'name' => "Manage Background",
                        'desc' => "Select the background color, or upload a custom background image. Default background is the #f5f5f5 color",
                        'id' => 'ale_background',
                        'std' => $background_defaults,
                        'type' => 'background');

    $options[] = array( "name" => "Show Site Preloader",
                        "desc" => "Description kakoito.",
                        "id" => "ale_backcover",
                        "std" => "1",
                        "type" => "checkbox");

    $options[] = array( "name" => "Uplaod a favicon icon",
                        "desc" => "Upload or put the link of your favicon icon",
                        "id" => "ale_favicon",
                        "std" => "",
                        "type" => "upload");

/*	
			--- lessens 15 delete --- 
*/
/*
	$options[] = array( "name" => "Comments Style",
						"desc" => "Choose your comments style. If you want to use DISQUS comments please install and activate this plugin from <a href=\"" . admin_url('plugin-install.php?tab=search&type=term&s=Disqus+Comment+System&plugin-search-input=Search+Plugins') . "\">Wordpress Repository</a>.  If you want to use Livefyre Realtime Comments comments please install and activate this plugin from <a href=\"" . admin_url('plugin-install.php?tab=search&type=term&s=Livefyre+Realtime+Comments&plugin-search-input=Search+Plugins') . "\">Wordpress Repository</a>.",
						"id" => "ale_comments_style",
						"std" => "wp",
						"type" => "select",
						"options" => $comments_style);
*/

	$options[] = array( "name" => "AJAX Comments",
						"desc" => "Use AJAX on comments posting (works only with Alethemes Comments selected).",
						"id" => "ale_ajax_comments",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Social Sharing",
						"desc" => "Enable social sharing for posts.",
						"id" => "ale_social_sharing",
						"std" => "1",
						"type" => "checkbox");

    $options[] = array( "name" => "Copyrights",
                        "desc" => "Your copyright message.",
                        "id" => "ale_copyrights",
                        "std" => "",
                        "type" => "editor");

    $options[] = array( "name" => "Home Page Slider slug",
                        "desc" => "Insert the slider slug. Get the slug on Sliders Section",
                        "id" => "ale_homeslugfull",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "Blog Slider slug",
                        "desc" => "Insert the slider slug. Get the slug on Sliders Section",
                        "id" => "ale_blogslugfull",
                        "std" => "",
                        "type" => "text");

   /*			--- Выбор шрифта во вкладке Typograhy --- 			*/
   $options[] = array( "name" => "Typography",
                        "type" => "heading");

/*				--- Подключения шрифта №1
					
					Droid Serif
									--- 				*/
$options[] = array( "name" => "Select the body Font from Google Library",
                        "desc" => "The default Font is - Droid Serif",
                        "id" => "ale_headerfont",
                        "std" => "Droid+Serif",
                        "type" => "select",
                        "options" => $headerfont);

    $options[] = array( "name" => "Select the body Font (Extended) from Google Library",
                        "desc" => "The default Font (extended)",
                        "id" => "ale_headerfontex",
                        "std" => "400,400i,700,700i",
                        "type" => "text",
                        );

/*						--- end font 1 ---					*/

  /*				--- Подключения шрифта №2
					
					Playfair Display SC
									--- 				*/
  $options[] = array( "name" => "Select the Headers Font from Google Library",
                        "desc" => "The default Font is - Playfair Display SC",
                        "id" => "ale_mainfont",
                        "std" => "Playfair+Display+SC",
                        "type" => "select",
                        "options" => $headerfont);

    $options[] = array( "name" => "Select the Headers Font (Extended) from Google Library",
                        "desc" => "The default Font (extended)",
                        "id" => "ale_mainfontex",
                        "std" => "400,400i,700,700i,900,900i",
                        "type" => "text",
                        );

/*						--- end font 2 ---					*/

/*				--- Подключения шрифта №3
					
					Playfair Display
									--- 				*/
  $options[] = array( "name" => "Select the Headers Font from Google Library",
                        "desc" => "The default Font is - Playfair Display",
                        "id" => "ale_thirdfont",
                        "std" => "Playfair+Display",
                        "type" => "select",
                        "options" => $headerfont);

    $options[] = array( "name" => "Select the Headers Font (Extended) from Google Library",
                        "desc" => "The default Font (extended)",
                        "id" => "ale_thirdfontex",
                        "std" => "400",
                        "type" => "text",
                        );

/*						--- end font 3 ---					*/


    $options[] = array( 'name' => "H1 Style",
                        'desc' => "Change the h1 style",
                        'id' => 'ale_h1sty',
                        'std' => array('size' => '22px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => "H2 Style",
                        'desc' => "Change the h2 style",
                        'id' => 'ale_h2sty',
                        'std' => array('size' => '20px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => "H3 Style",
                        'desc' => "Change the h3 style",
                        'id' => 'ale_h3sty',
                        'std' => array('size' => '18px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => "H4 Style",
                        'desc' => "Change the h4 style",
                        'id' => 'ale_h4sty',
                        'std' => array('size' => '16px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => "H5 Style",
                        'desc' => "Change the h5 style",
                        'id' => 'ale_h5sty',
                        'std' => array('size' => '14px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => "H6 Style",
                        'desc' => "Change the h6 style",
                        'id' => 'ale_h6sty',
                        'std' => array('size' => '12px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => "Body Style",
                        'desc' => "Change the body font style",
                        'id' => 'ale_bodystyle',
                        'std' => array('size' => '11px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

	$options[] = array( "name" => "Social",
						"type" => "heading");

    $options[] = array( "name" => "Twitter",
                        "desc" => "Your twitter profile URL.",
                        "id" => "ale_twi",
                        "std" => "",
                        "type" => "text");
	$options[] = array( "name" => "Facebook",
						"desc" => "Your facebook profile URL.",
						"id" => "ale_fb",
						"std" => "",
						"type" => "text");
    
    $options[] = array( "name" => "Pinterest",
                        "desc" => "Your pinteres profile URL.",
                        "id" => "ale_pint",
                        "std" => "",
                        "type" => "text");
  
    $options[] = array( "name" => "Instagram",
                        "desc" => "Your instagram profile URL.",
                        "id" => "ale_insta",
                        "std" => "",
                        "type" => "text");
						
    $options[] = array( "name" => "Youtube",
                        "desc" => "Your Youtube linker",
                        "id" => "ale_yt",
                        "std" => "",
                        "type" => "text");
						
    $options[] = array( "name" => "Show RSS",
                        "desc" => "Check if you want to show the RSS icon on your site",
                        "id" => "ale_rssicon",
                        "std" => "1",
                        "type" => "checkbox");

	
	$options[] = array( "name" => "Facebook Application ID",
						"desc" => "If you have Application ID you can connect the blog to your Facebook Profile and monitor statistics there.",
						"id" => "ale_fb_id",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => "Enable Open Graph",
						"desc" => "The <a href=\"http://www.ogp.me/\">Open Graph</a> protocol enables any web page to become a rich object in a social graph.",
						"id" => "ale_og_enabled",
						"std" => "",
						"type" => "checkbox");
/*			added footer option for Theme option			*/

	$options[] = array( "name" => "Footer Settings",
						"type" => "heading");
	
	$options[] = array( "name" => "Phone Number",
						"desc" => "Insert your for number.",
						"id" => "ale_footer_phone",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Adress",
						"desc" => "Insert your adress.",
						"id" => "ale_footer_adress",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Mail",
						"desc" => "Insert your mail",
						"id" => "ale_footer_email",
						"std" => "",
						"type" => "text");					
	
	
	/*					end may create			*/
	
	$options[] = array( "name" => "Advanced Settings",
						"type" => "heading");

	
	$options[] = array( "name" => "Google Analytics",
						"desc" => "Please insert your Google Analytics code here. Example: <strong>UA-22231623-1</strong>",
						"id" => "ale_ga",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => "Footer Code",
						"desc" => "If you have anything else to add in the footer - please add it here.",
						"id" => "ale_footer_info",
						"std" => "",
						"type" => "textarea");

    $options[] = array( "name" => "Custom CSS Styles",
                        "desc" => "You can add here your styles. ex. .boxclass { padding:10px; }",
                        "id" => "ale_customcsscode",
                        "std" => "",
                        "type" => "textarea");

    $options[] = array( "name" => "Footer menu title",
                        "desc" => "Insert the footer menu title",
                        "id" => "ale_footermenutitle",
                        "std" => "Select a category",
                        "type" => "text");

    $options[] = array( "name" => "Footer menu title",
                        "desc" => "Insert the footer menu title",
                        "id" => "ale_footermenutitle_1",
                        "std" => "",
                        "type" => "images",
                        "options" => array(
                            'image_1' => $imagepath.'/1col.png',
                            'image_2' => $imagepath.'/2cl.png',
                            'image_3' => $imagepath.'/2cr.png', ),
        );
	
	$options[] = array( "name" => "Maps settings",
						"type" => "heading");
	$options[] = array( "name" => "Maps Icon",
                        "desc" => "Upload or put the icon link ",
                        "id" => "ale_mapicon",
                        "std" => "",
                        "type" => "upload");
						
	$options[] = array( "name" => "Map Style",
                        "desc" => "Insert the map style from Snazzy Maps Service",
                        "id" => "ale_mapstyle",
                        "std" => "",
                        "type" => "text");					
	
	return $options;
}

/**
 * Add custom scripts to Options Page
 */
function aletheme_options_custom_scripts() {
 ?>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#ale_commentongallery').click(function() {
        jQuery('#section-ale_gallerycomments_style').fadeToggle(400);
    });
    if (jQuery('#ale_commentongallery:checked').val() !== undefined) {
        jQuery('#section-ale_gallerycomments_style').show();
    }
});
</script>

<?php
}

/**
 * Add Metaboxes
 * @param array $meta_boxes
 * @return array 
 */
function aletheme_metaboxes($meta_boxes) {
	
	$meta_boxes = array();

    $prefix = "ale_";


    $meta_boxes[] = array(
        'id'         => 'contacts_page_metabox',
        'title'      => 'Contacts Options',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-contact.php'), ), // Specific post templates to display this metabox

        'fields' => array(
            array(
                'name' => __('Phone Label', 'aletheme'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'phone_label', 
				'std'  => 'Phone',
                'type' => 'text',
            ),
			 array(
                'name' => __('Phone Number', 'aletheme'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'phone_number',
                'type' => 'text',
            ),
			 array(
                'name' => __('Address Label', 'aletheme'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'address_label',
				'std'  => 'Address',
                'type' => 'text',
            ),
			array(
                'name' => __('Address', 'aletheme'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'address',
                'type' => 'text',
            ),
			array(
                'name' => __('Email Label', 'aletheme'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'email_label',
				'std'  => 'Email',
                'type' => 'text',
            ),
			array(
                'name' => __('Email', 'aletheme'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'email',
                'type' => 'text',
            ),
			
			
        )
    );
	
	//		Урок 20 19:05 
	
	$meta_boxes[] = array(
        'id'         => 'about_page_metabox',
        'title'      => 'About Options',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox

        'fields' => array(
			//*************************************************
			//			Info block 		
			array(
                'name' 		=> __('Show Info Box', 'aletheme'),
                'desc' 		=> 'Select to show the infobox',
                'id'   		=> $prefix . 'info_display', 
				'type' 		=> 'select',
				'options' 	=> array(
						array('name'=>'Show Block','value'=>'show'),
						array('name'=>'Hide Block','value'=>'hide')
						)
            ),
			array(
                'name' => __('Title for Info Section', 'aletheme'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'info_title', 
				'std'  => 'The generated Lorem Ipsum is therefore always free from',
                'type' => 'text',
            ),
			array(
                'name' => __('Description  for Info Section', 'aletheme'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'info_desc', 
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a' ,
                'type' => 'textarea_code',
            ),
			array(
                'name' => __('BG image for Info  Section', 'aletheme'),
                'desc' => 'Upload or select an image',
                'id'   => $prefix . 'info_bg', 
				'std'  => '',
                'type' => 'file',
            ),
			//*****************************************************
			//			Services block
			array(
                'name' 		=> __('Show Services Box', 'aletheme'),
                'desc' 		=> 'Select to show the infobox',
                'id'   		=> $prefix . 'service_display', 
				'type' 		=> 'select',
				'options' 	=> array(
						array('name'=>'Show Block','value'=>'show'),
						array('name'=>'Hide Block','value'=>'hide')
						)
            ),
			array(
                'name' => __('Service Icon 1', 'aletheme'),
                'desc' => 'Upload or select an image',
                'id'   => $prefix . 'service_icon1', 
				'std'  => '',
                'type' => 'file',
            ),
			array(
                'name' => __('Service text 1'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'service_text1', 
				'std'  => 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type' ,
                'type' => 'textarea_code',
            ),
			array(
                'name' => __('Service Icon 2', 'aletheme'),
                'desc' => 'Upload or select an image',
                'id'   => $prefix . 'service_icon2', 
				'std'  => '',
                'type' => 'file',
            ),
			array(
                'name' => __('Service text 2'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'service_text2', 
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry' ,
                'type' => 'textarea_code',
            ),
			array(
                'name' => __('Service Icon 3', 'aletheme'),
                'desc' => 'Upload or select an image',
                'id'   => $prefix . 'service_icon3', 
				'std'  => '',
                'type' => 'file',
            ),
			array(
                'name' => __('Service text 3'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'service_text3', 
				'std'  => 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged' ,
                'type' => 'textarea_code',
            ), 
			array(
                'name' => __('Service Icon 4', 'aletheme'),
                'desc' => 'Upload or select an image',
                'id'   => $prefix . 'service_icon4', 
				'std'  => '',
                'type' => 'file',
            ),
			array(
                'name' => __('Service text 4'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'service_text4', 
				'std'  => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing' ,
                'type' => 'textarea_code',
            ),
			//**************************************************
			//			Our People block
			array(
                'name' 		=> __('Show People Box', 'aletheme'),
                'desc' 		=> 'Select to show the infobox',
                'id'   		=> $prefix . 'people_display', 
				'type' 		=> 'select',
				'options' 	=> array(
						array('name'=>'Show Block','value'=>'show'),
						array('name'=>'Hide Block','value'=>'hide')
						)
            ),
			array(
                'name' => __('Title for Our People', 'aletheme'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'people_title', 
				'std'  => 'Our people',
                'type' => 'text',
            ),
			array(
                'name' => __('Description  for Our People', 'aletheme'),
                'desc' => 'Insert the text',
                'id'   => $prefix . 'people_text', 
				'std'  => 'Lorem Ipsum is simply dummy tex' ,
                'type' => 'text',
            ),
			array(
                'name' => __('BG image for Our People', 'aletheme'),
                'desc' => 'Upload or select an image',
                'id'   => $prefix . 'people_bg', 
				'std'  => '',
                'type' => 'file',
            ),
		)
    );
	
	$meta_boxes[] = array(
        'id'         => 'people_page_metabox',
        'title'      => 'People Options',
        'pages'      => array( 'people', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox

        'fields' => array(
            
			array(
                'name' => __('Team Position', 'aletheme'),
                'desc' => 'Type here the position',
                'id'   => $prefix . 'people_post',
                'type' => 'text',
            ),
			
			
        )
    );
	//**************************************************
			//			metabox for sermons post types
	$meta_boxes[] = array(
        'id'         => 'sermons_metabox',
        'title'      => 'Sermons Options',
        'pages'      => array( 'sermons', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox

        'fields' => array(
            
			array(
                'name' => __('The Date', 'aletheme'),
                'desc' => 'Type here the sermons date',
                'id'   => $prefix . 'sermons_date',
                'type' => 'text_datetime_timestamp',
            ),
			
			
        )
    );

  //			Данные метабохы были удалены в ураке 9 13:59
  /* 
   $meta_boxes[] = array(
        'id'         => 'press_page_metabox',
        'title'      => 'Press Page Options',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-press.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => 'Press title #1',
                'desc' => 'Insert the title',
                'id'   => $prefix . 'presstit1',
                'type' => 'text',
            ),
            array(
                'name' => 'Press Thumb #1',
                'desc' => 'Insert the image (max-height - 280px)',
                'id'   => $prefix . 'pressthumb1',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Image #1',
                'desc' => 'Insert the image or let it empty if you want to use a video.',
                'id'   => $prefix . 'pressimage1',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Video link #1',
                'desc' => 'Insert the video or let it empty if you want to use an image. (Embed link - ex //www.youtube.com/embed/LtulTGxJdDc)',
                'id'   => $prefix . 'pressvideo1',
                'type' => 'text',
            ),

            array(
                'name' => 'Press title #2',
                'desc' => 'Insert the title',
                'id'   => $prefix . 'presstit2',
                'type' => 'text',
            ),
            array(
                'name' => 'Press Thumb #2',
                'desc' => 'Insert the image (max-height - 280px)',
                'id'   => $prefix . 'pressthumb2',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Image #2',
                'desc' => 'Insert the image or let it empty if you want to use a video.',
                'id'   => $prefix . 'pressimage2',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Video link #2',
                'desc' => 'Insert the video or let it empty if you want to use an image. (Embed link - ex //www.youtube.com/embed/LtulTGxJdDc)',
                'id'   => $prefix . 'pressvideo2',
                'type' => 'text',
            ),

            array(
                'name' => 'Press title #3',
                'desc' => 'Insert the title',
                'id'   => $prefix . 'presstit3',
                'type' => 'text',
            ),
            array(
                'name' => 'Press Thumb #3',
                'desc' => 'Insert the image (max-height - 280px)',
                'id'   => $prefix . 'pressthumb3',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Image #3',
                'desc' => 'Insert the image or let it empty if you want to use a video.',
                'id'   => $prefix . 'pressimage3',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Video link #3',
                'desc' => 'Insert the video or let it empty if you want to use an image. (Embed link - ex //www.youtube.com/embed/LtulTGxJdDc)',
                'id'   => $prefix . 'pressvideo3',
                'type' => 'text',
            ),

            array(
                'name' => 'Press title #4',
                'desc' => 'Insert the title',
                'id'   => $prefix . 'presstit4',
                'type' => 'text',
            ),
            array(
                'name' => 'Press Thumb #4',
                'desc' => 'Insert the image (max-height - 280px)',
                'id'   => $prefix . 'pressthumb4',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Image #4',
                'desc' => 'Insert the image or let it empty if you want to use a video.',
                'id'   => $prefix . 'pressimage4',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Video link #4',
                'desc' => 'Insert the video or let it empty if you want to use an image. (Embed link - ex //www.youtube.com/embed/LtulTGxJdDc)',
                'id'   => $prefix . 'pressvideo4',
                'type' => 'text',
            ),

            array(
                'name' => 'Press title #5',
                'desc' => 'Insert the title',
                'id'   => $prefix . 'presstit5',
                'type' => 'text',
            ),
            array(
                'name' => 'Press Thumb #5',
                'desc' => 'Insert the image (max-height - 280px)',
                'id'   => $prefix . 'pressthumb5',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Image #5',
                'desc' => 'Insert the image or let it empty if you want to use a video.',
                'id'   => $prefix . 'pressimage5',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Video link #5',
                'desc' => 'Insert the video or let it empty if you want to use an image. (Embed link - ex //www.youtube.com/embed/LtulTGxJdDc)',
                'id'   => $prefix . 'pressvideo5',
                'type' => 'text',
            ),

            array(
                'name' => 'Press title #6',
                'desc' => 'Insert the title',
                'id'   => $prefix . 'presstit6',
                'type' => 'text',
            ),
            array(
                'name' => 'Press Thumb #6',
                'desc' => 'Insert the image (max-height - 280px)',
                'id'   => $prefix . 'pressthumb6',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Image #6',
                'desc' => 'Insert the image or let it empty if you want to use a video.',
                'id'   => $prefix . 'pressimage6',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Video link #6',
                'desc' => 'Insert the video or let it empty if you want to use an image. (Embed link - ex //www.youtube.com/embed/LtulTGxJdDc)',
                'id'   => $prefix . 'pressvideo6',
                'type' => 'text',
            ),

            array(
                'name' => 'Press title #7',
                'desc' => 'Insert the title',
                'id'   => $prefix . 'presstit7',
                'type' => 'text',
            ),
            array(
                'name' => 'Press Thumb #7',
                'desc' => 'Insert the image (max-height - 280px)',
                'id'   => $prefix . 'pressthumb7',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Image #7',
                'desc' => 'Insert the image or let it empty if you want to use a video.',
                'id'   => $prefix . 'pressimage7',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Video link #7',
                'desc' => 'Insert the video or let it empty if you want to use an image. (Embed link - ex //www.youtube.com/embed/LtulTGxJdDc)',
                'id'   => $prefix . 'pressvideo7',
                'type' => 'text',
            ),

            array(
                'name' => 'Press title #8',
                'desc' => 'Insert the title',
                'id'   => $prefix . 'presstit8',
                'type' => 'text',
            ),
            array(
                'name' => 'Press Thumb #8',
                'desc' => 'Insert the image (max-height - 280px)',
                'id'   => $prefix . 'pressthumb8',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Image #8',
                'desc' => 'Insert the image or let it empty if you want to use a video.',
                'id'   => $prefix . 'pressimage8',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Video link #8',
                'desc' => 'Insert the video or let it empty if you want to use an image. (Embed link - ex //www.youtube.com/embed/LtulTGxJdDc)',
                'id'   => $prefix . 'pressvideo8',
                'type' => 'text',
            ),

            array(
                'name' => 'Press title #9',
                'desc' => 'Insert the title',
                'id'   => $prefix . 'presstit9',
                'type' => 'text',
            ),
            array(
                'name' => 'Press Thumb #9',
                'desc' => 'Insert the image (max-height - 280px)',
                'id'   => $prefix . 'pressthumb9',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Image #9',
                'desc' => 'Insert the image or let it empty if you want to use a video.',
                'id'   => $prefix . 'pressimage9',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Video link #9',
                'desc' => 'Insert the video or let it empty if you want to use an image. (Embed link - ex //www.youtube.com/embed/LtulTGxJdDc)',
                'id'   => $prefix . 'pressvideo9',
                'type' => 'text',
            ),

            array(
                'name' => 'Press title #10',
                'desc' => 'Insert the title',
                'id'   => $prefix . 'presstit10',
                'type' => 'text',
            ),
            array(
                'name' => 'Press Thumb #10',
                'desc' => 'Insert the image (max-height - 280px)',
                'id'   => $prefix . 'pressthumb10',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Image #10',
                'desc' => 'Insert the image or let it empty if you want to use a video.',
                'id'   => $prefix . 'pressimage10',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Video link #10',
                'desc' => 'Insert the video or let it empty if you want to use an image. (Embed link - ex //www.youtube.com/embed/LtulTGxJdDc)',
                'id'   => $prefix . 'pressvideo10',
                'type' => 'text',
            ),
        )
    );


    $meta_boxes[] = array(
        'id'         => 'aboutslider_page_metabox',
        'title'      => 'About Page Options',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => 'First member Name',
                'desc' => 'Insert member name...',
                'id'   => $prefix . 'memname1',
                'type'    => 'text',
            ),
            array(
                'name' => 'Second member Name',
                'desc' => 'Insert member name...',
                'id'   => $prefix . 'memname2',
                'type'    => 'text',
            ),
            array(
                'name' => 'Third member Name',
                'desc' => 'Insert member name...',
                'id'   => $prefix . 'memname3',
                'type'    => 'text',
            ),
            array(
                'name' => 'Fourth member Name',
                'desc' => 'Insert member name...',
                'id'   => $prefix . 'memname4',
                'type'    => 'text',
            ),
            array(
                'name' => 'First member Prof',
                'desc' => 'Insert member prof...',
                'id'   => $prefix . 'memprof1',
                'type'    => 'text',
            ),
            array(
                'name' => 'Second member Prof',
                'desc' => 'Insert member prof...',
                'id'   => $prefix . 'memprof2',
                'type'    => 'text',
            ),
            array(
                'name' => 'Third member Prof',
                'desc' => 'Insert member prof...',
                'id'   => $prefix . 'memprof3',
                'type'    => 'text',
            ),
            array(
                'name' => 'Fourth member Prof',
                'desc' => 'Insert member prof...',
                'id'   => $prefix . 'memprof4',
                'type'    => 'text',
            ),
            array(
                'name' => 'First member FB link',
                'desc' => 'Insert member FB link...',
                'id'   => $prefix . 'memfb1',
                'type'    => 'text',
            ),
            array(
                'name' => 'Second member FB link',
                'desc' => 'Insert member FB link...',
                'id'   => $prefix . 'memfb2',
                'type'    => 'text',
            ),
            array(
                'name' => 'Third member FB link',
                'desc' => 'Insert member FB link...',
                'id'   => $prefix . 'memfb3',
                'type'    => 'text',
            ),
            array(
                'name' => 'fourth member FB link',
                'desc' => 'Insert member FB link...',
                'id'   => $prefix . 'memfb4',
                'type'    => 'text',
            ),
            array(
                'name' => 'First member TW link',
                'desc' => 'Insert member TW link...',
                'id'   => $prefix . 'memtw1',
                'type'    => 'text',
            ),
            array(
                'name' => 'Second member TW link',
                'desc' => 'Insert member TW link...',
                'id'   => $prefix . 'memtw2',
                'type'    => 'text',
            ),
            array(
                'name' => 'Third member TW link',
                'desc' => 'Insert member TW link...',
                'id'   => $prefix . 'memtw3',
                'type'    => 'text',
            ),
            array(
                'name' => 'Fourth member TW link',
                'desc' => 'Insert member TW link...',
                'id'   => $prefix . 'memtw4',
                'type'    => 'text',
            ),
            array(
                'name' => 'First member Email',
                'desc' => 'Insert member email...',
                'id'   => $prefix . 'memem1',
                'type'    => 'text',
            ),
            array(
                'name' => 'Second member Email',
                'desc' => 'Insert member email...',
                'id'   => $prefix . 'memem2',
                'type'    => 'text',
            ),
            array(
                'name' => 'Third member Email',
                'desc' => 'Insert member email...',
                'id'   => $prefix . 'memem3',
                'type'    => 'text',
            ),
            array(
                'name' => 'Fourth member Email',
                'desc' => 'Insert member email...',
                'id'   => $prefix . 'memem4',
                'type'    => 'text',
            ),
            array(
                'name' => 'First member Description',
                'desc' => 'Insert member description...',
                'id'   => $prefix . 'memdesc1',
                'type'    => 'wysiwyg',
            ),
            array(
                'name' => 'Second member Description',
                'desc' => 'Insert member description...',
                'id'   => $prefix . 'memdesc2',
                'type'    => 'wysiwyg',
            ),
            array(
                'name' => 'Third member Description',
                'desc' => 'Insert member description...',
                'id'   => $prefix . 'memdesc3',
                'type'    => 'wysiwyg',
            ),
            array(
                'name' => 'Fourth member Description',
                'desc' => 'Insert member description...',
                'id'   => $prefix . 'memdesc4',
                'type'    => 'wysiwyg',
            ),
            array(
                'name' => 'First member avatar',
                'desc' => 'Insert member avatar...',
                'id'   => $prefix . 'memava1',
                'type'    => 'file',
            ),
            array(
                'name' => 'Second member avatar',
                'desc' => 'Insert member avatar...',
                'id'   => $prefix . 'memava2',
                'type'    => 'file',
            ),
            array(
                'name' => 'Third member avatar',
                'desc' => 'Insert member avatar...',
                'id'   => $prefix . 'memava3',
                'type'    => 'file',
            ),
            array(
                'name' => 'Fourth member avatar',
                'desc' => 'Insert member avatar...',
                'id'   => $prefix . 'memava4',
                'type'    => 'file',
            ),
        )
    );
*/
	return $meta_boxes;
}

/**
 * Get image sizes for images
 * 
 * @return array
 */
function aletheme_get_images_sizes() {
	return array(

        'gallery' => array(
            array(
                'name'      => 'gallery-kvadrat',
                'width'     => 225,
                'height'    => 225,
                'crop'      => true,
            ),
            array(
                'name'      => 'gallery-vertical',
                'width'     => 470,
                'height'    => 225,
                'crop'      => true,
            ),
            array(
                'name'      => 'gallery-bigkvadrat',
                'width'     => 470,
                'height'    => 470,
                'crop'      => true,
            ),
        ),
		
		 'people' => array(
            array(
                'name'      => 'people-user',
                'width'     => 87,
                'height'    => 87,
                'crop'      => true,
            ),
		),
          // lesson_25
		  'sermons' => array(
            array(
                'name'      => 'sermons-list',
                'width'     => 306,
                'height'    => 172,
                'crop'      => true,
            ),
			array(
                'name'      => 'sermons-biglist',
                'width'     => 369,
                'height'    => 226,
                'crop'      => true,
            ),
        ),
		//			--- убрали в уроки 12 4:50
		/*
        'post' => array(
            array(
                'name'      => 'post-thumba',
                'width'     => 475,
                'height'    => 295,
                'crop'      => true,
            ),
            array(
                'name'      => 'post-minibox',
                'width'     => 500,
                'height'    => 200,
                'crop'      => true,
            ),
        ),*/


    );
}

/**
 * Add post types that are used in the theme 
 * 
 * @return array
 */
function aletheme_get_post_types() {
	return array(
        'gallery' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
					'excerpt',
					'comments'
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Gallery',
            'multiple' => 'Galleries',
            'columns'    => array(
                'first_image',
            )
        ),
        /*'services' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-format-audio',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Сервис',
            'multiple' => 'Сервисы'
        ),*/
		'events' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'excerpt',
					'comments'
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Event',
            'multiple' => 'Events',
            
        ),
		'people' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'excerpt',
					'thumbnail',
					
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'People',
            'multiple' => 'People',
            
        ),
		//		Урок 25 Добавили новый пост тайп SERMONS
		'sermons' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'excerpt',
					'thumbnail',
					'comments'
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Sermon',
            'multiple' => 'Sermons',
            
        ),
    );
}

/**
 * Add taxonomies that are used in theme
 * 
 * @return array
 */
function aletheme_get_taxonomies() {
	return array(

        'gallery-category'    => array(
            'for'        => array('gallery'),
            'config'    => array(
                'sort'        => true,
                'args'        => array('orderby' => 'term_order'),
                'hierarchical' => true,
            ),
            'singular'    => 'Gallery Category',
            'multiple'    => 'Gallery Categories',
        ),


        'services-category'    => array(
            'for'        => array('services'),
            'config'    => array(
                'sort'        => true,
                'args'        => array('orderby' => 'term_order'),
                'hierarchical' => true,
            ),
            'singular'    => 'Категория',
            'multiple'    => 'Категории',
        ),
        'price'    => array(
            'for'        => array('services'),
            'config'    => array(
                'sort'        => true,
                'args'        => array('orderby' => 'term_order'),
                'hierarchical' => true,
            ),
            'singular'    => 'Цена сервиса',
            'multiple'    => 'Цены сервисов',
        ),
		
		'events-category'    => array(
            'for'        => array('events'),
            'config'    => array(
                'sort'        => true,
                'args'        => array('orderby' => 'term_order'),
                'hierarchical' => true,
            ),
            'singular'    => 'Event Category',
            'multiple'    => 'Event Categories',
        ),
        
    );
}

/**
 * Add post formats that are used in theme
 * 
 * @return array
 */
function aletheme_get_post_formats() {
	return array();
}

/**
 * Get sidebars list
 * 
 * @return array
 */
function aletheme_get_sidebars() {
	$sidebars = array();
	return $sidebars;
}

/**
 * Predefine custom sliders
 * @return array
 */
function aletheme_get_sliders() {
	return array(
		'sneak-peek' => array(
			'title'		=> 'Sneak Peek',
		),
	);
}

/**
 * Post types where metaboxes should show
 * 
 * @return array
 */
function aletheme_get_post_types_with_gallery() {
	return array('gallery');
}

/**
 * Add custom fields for media attachments
 * @return array
 */
function aletheme_media_custom_fields() {
	return array();
}