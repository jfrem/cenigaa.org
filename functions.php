<?php
/* 

Copyright (c) 2014, J-Frem
All rights reserved.

 
*/


function wp_list_recent_posts( $iAmount = 5, $szCat = null, $szBefore = "<li>", $szAfter = "</li>" )
{
	( $szCat != null ) ? $szCat = "&cat=" . $szCat : $szCat ;
	$aRecentPosts = new WP_Query( "showposts=" . $iAmount . $szCat );
	while($aRecentPosts->have_posts()) : $aRecentPosts->the_post();
	$szReturn .= $szBefore . '<a href="' . get_permalink() . '">' . get_the_title() . '</a>' . $szAfter;
	endwhile;
	echo $szReturn;
}

function shorten_text( $iChars = 250, $szTail = "...", $bPrint = true ) 
{ 
	global $post;
	$szText = strip_tags( trim( $post->post_content ) );
    $szText = substr( $szText, 0, $iChars );
    $szText = substr( $szText, 0, strrpos( $szText , ' ' ) ) . $szTail;
	apply_filters('the_excerpt', $szText);
    if ( $bPrint == true ) echo $szText; else return $szText;
}

function highlight_comment( $szAuthClass = "autor-comment", $iUserID = 1 )
{
	global $comment;
	$szAuthComment = ( $comment->user_id == $iUserID ) ? $szAuthClass : null;
	echo $szAuthComment;
}

function display_copyright( $iYear = null, $szSeparator = " - ", $szTail = '. All rights reserved.' ) 
{
	echo '<div id="copyright">' . display_years( $iYear, $szSeparator, false ) . ' &copy; ' . get_bloginfo('name') . $szTail . '</div>';   
}

function display_years( $iYear = null, $szSeparator = " - ", $bPrint = true )
{	
	$iCurrentYear = ( date( "Y" ) );	
	if ( is_int( $iYear ) ) 
	{	
		$iYear = ( $iCurrentYear > $iYear ) ? $iYear = $iYear . $szSeparator . $iCurrentYear : $iYear;	
	} else {
		$iYear = $iCurrentYear;
	}
	if ( $bPrint == true ) echo $iYear; else return $iYear;
}
// funcion para habilitar la opcion para subir imagenes destacadas a cada post
      add_theme_support( 'post-thumbnails' );
	  
/*-----------------------------------------------------------------------------------*/
/*	Configurar Imágenes Thumbnails WP2.9+ 
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'article-thumbnail', 66, 56, true ); // Article thumbnails 149 x 136 (240 x 219)
	add_image_size( 'index-thumbnail', 956, 479, true ); // headre page thumbnail 956 x 479 (1090 x 546)
	add_image_size( 'dest-thumbnail', 291, 164, true ); // Destacados thumbnail 291 x 164
}
// esto nos añade las funciones para los RSS
    automatic_feed_links();

// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Menú Primario', 'Cenigaa' ) );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Principal', 'Cenigaa' ),
		'id' => 'sidebar-1',
		'description' => __( 'Aparece cuando se usa la plantilla de Front Page opcional con un conjunto de páginas estáticas como Front Page', 'cenigaa.org' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Primer Área frontal de Widget', 'cenigaa.org' ),
		'id' => 'sidebar-2',
		'description' => __( 'Aparece cuando se usa la plantilla de Front Page opcional con un conjunto de páginas estáticas como Front Page', 'cenigaa.org' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Segunda Área frontal de Widget', 'cenigaa.org' ),
		'id' => 'sidebar-3',
		'description' => __( 'Aparece cuando se usa la plantilla de Front Page opcional con un conjunto de páginas estáticas como Front Page', 'cenigaa.org' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

/** Eliminar la versión de WordPress del header y del feed*/
add_filter('the_generator','killVersion');
function killVersion() { return ''; }
remove_action('wp_head', 'wp_generator');

/** ID de la Categoría en Body y en la clase de la entrada (post) */
function category_id_class($classes) {
    global $post;
    foreach((get_the_category($post->ID)) as $category)
        $classes [] = 'cat-' . $category->cat_ID . '-id';
        return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');

/** Eliminar el mensaje de error en la pantalla de login de admin */
add_filter('login_errors',create_function('$a', "return null;"));

/** Añadir un favicon a tu área de administración */
function admin_favicon() {
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/favicon.png" />';
}
add_action('admin_head', 'admin_favicon');


function add_twitter_contactmethod( $contactmethods ) {
// Agrega Twitter
$contactmethods['twitter'] = 'Twitter';

// Borra Yahoo IM
 unset($contactmethods['yim']);   return $contactmethods;
}
add_filter('user_contactmethods','add_twitter_contactmethod',10,1);


/** 
*Personalizacion del Tema
*
*/

function tcx_register_theme_customizer( $wp_customize ) // resgistra la función 
{
	// Agrega una sesion en el panel de personalización 
	$wp_customize->add_section(
		'tcx_display_options',
		array(
			'title'     => 'Display Options',
			'priority'  => 200
		)
	);

	// Agrega un campo de personalización
	$wp_customize->add_setting(
		'tcx_footer_copyright_text',
		array(
			'default'            => 'Derechos reservados',
			'sanitize_callback'  => 'tcx_sanitize_copyright',
			'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control(
		'tcx_footer_copyright_text',
		array(
			'section'  => 'tcx_display_options',
			'label'    => 'Mensaje de Copyright',
			'type'     => 'text'
		)
	);
/**
*add a textarea control to the wp_customize
*
*/
    class Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
     
        public function render_content() {
            ?>
            <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
            <?php
        }
    }

    //Área de Texto
    $wp_customize->add_setting( 'info_text', array(
        'default'        => '',
    ) );
 
    $wp_customize->add_control( new Customize_Textarea_Control( $wp_customize, 'info_text', array(
        'label'   => 'Texto Informativo',
        'section' => 'theme_contact_phone',
        'settings'   => 'info_text',
    ) ) );

    //Teléfonos de Contacto Section
    $wp_customize->add_section( 'theme_contact_phone', array(
        'title'          => 'Teléfonos de Contato',
        'priority'       => 35,
    ) );
    
    //opción 1 Profil contacto Url
    $wp_customize->add_setting( 'opcion1_url', array(
        'default'        => '',
    ) );
 
    $wp_customize->add_control( 'opcion1_url', array(
        'label'   => 'opción 1',
        'section' => 'theme_contact_phone',
        'type'    => 'text',
    ) );
 
    //opción 2 Profil contacto Url
    $wp_customize->add_setting( 'opcion2_url', array(
        'default'        => '',
    ) );
 
    $wp_customize->add_control( 'opcion2_url', array(
        'label'   => 'opción 2',
        'section' => 'theme_contact_phone',
        'type'    => 'text',
    ) );
 
    //opción 3 contacto Url
    $wp_customize->add_setting( 'opcion3_url', array(
        'default'        => '',
    ) );
 
    $wp_customize->add_control( 'opcion3_url', array(
        'label'   => 'opción 3',
        'section' => 'theme_contact_phone',
        'type'    => 'text',
    ) );
 
    //Email
    $wp_customize->add_setting( 'company_email', array(
        'default'        => '',
    ) );
 
    $wp_customize->add_control( 'company_email', array(
        'label'   => 'Email',
        'section' => 'theme_contact_phone',
        'type'    => 'text',
    ) );

    //Social Links Section
    $wp_customize->add_section( 'theme_social_links', array(
        'title'          => 'Social Links',
        'priority'       => 35,
    ) );
    
    //Facebook Profile Url
    $wp_customize->add_setting( 'facebook_url', array(
        'default'        => '',
    ) );
 
    $wp_customize->add_control( 'facebook_url', array(
        'label'   => 'Facebook',
        'section' => 'theme_social_links',
        'type'    => 'text',
    ) );
 
    //YouTube Profile Url
    $wp_customize->add_setting( 'youtube_url', array(
        'default'        => '',
    ) );
 
    $wp_customize->add_control( 'youtube_url', array(
        'label'   => 'YouTube',
        'section' => 'theme_social_links',
        'type'    => 'text',
    ) );
 
    //Twitter Profile Url
    $wp_customize->add_setting( 'twitter_url', array(
        'default'        => '',
    ) );
 
    $wp_customize->add_control( 'twitter_url', array(
        'label'   => 'Twitter',
        'section' => 'theme_social_links',
        'type'    => 'text',
    ) );
 
}
add_action( 'customize_register', 'tcx_register_theme_customizer' );

function tcx_sanitize_copyright( $input ) {
	return strip_tags( stripslashes( $input ) );
} // end tcx_sanitize_copyright

/**
* CARGAR FUENTES DE GOOGLE WEBFONTS
*
*/
add_action( 'wp_enqueue_scripts', 'custom_load_google_fonts' );
function custom_load_google_fonts() {
    wp_enqueue_style( 
        'google-fonts', 
        'http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700', 
        array(), 
        PARENT_THEME_VERSION
     );
}

/**
* CUSTOM ADMIN LOGIN HEADER LOGO
*
*/
add_action('admin_head','my_custom_login_logo');
   function my_custom_login_logo() {
echo '<style type="text/css">
#wpadminbar>#wp-toolbar>#wp-admin-bar-root-default>#wp-admin-bar-wp-logo .ab-icon { background: url('.get_bloginfo('template_directory').'/img/wp-admin-logo.png) no-repeat !important; padding-right: 14px; margin-top: 7px; font: 0px/0 "Open Sans" ;} @media screen and (max-width: 782px) {#wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon { font: 10000px/0 "Open Sans" !important;}
</style>';
   }
   add_action('login_head', 'my_custom_login_logo');

 
/**
* Admin footer custom
*
*/
   function custom_footer_admin () {
    echo '<span id="footer-thankyou">Sitio web Desarrollado por Pandora Studio & <a href="http://yacomputadores.com/" target="_blank">Ya! Computadores</a>.</span>';
}
add_filter('admin_footer_text', 'custom_footer_admin');


/**
* remove admin bar links
*
*/
function remove_admin_bar_links() {
global $wp_admin_bar;
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_node('about');
    $wp_admin_bar->remove_node('wporg');
    $wp_admin_bar->remove_node('documentation');
    $wp_admin_bar->remove_node('support-forums');
    $wp_admin_bar->remove_node('feedback');
//    $wp_admin_bar->remove_node('view-site');
    }
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

/**
* Remove core updates
*
*/
function remove_core_updates(){

        global $wp_version;
        return (object) array(
            'last_checked' => time(),
            'version_checked' => $wp_version,
            );
}
add_filter('pre_site_transient_update_core', 'remove_core_updates');
add_filter('pre_site_transient_update_plugins', 'remove_core_updates');
add_filter('pre_site_transient_update_themes', 'remove_core_updates');


/** 
* Add theme support for all post formats
*
*/
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image' ) );
 
// Use content-{post_format}.php for listing posts
function my_template_parts( $parts ) {
     
    global $post;
 
    // Determine post format where relevant
    $post_format = '';
    if( is_object($post) )
        $post_format = get_post_format();
 
    // Adjust template parts
    $parts['index'] = $post_format;
    $parts['list'] = $post_format;
    $parts['list_paginated'] = $post_format;
    $parts['list_slider'] = $post_format;
    $parts['single'] = $post_format;
    $parts['archive'] = $post_format;
 
    return $parts;
}
add_filter( 'themeblvd_template_parts', 'my_template_parts' );


/**
* Soporte del Desarrollador.
*
*/
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Soporte del Desarrollador.', 'custom_dashboard_help');
}
function custom_dashboard_help() {
echo '<p>Bienvenidos al administrador de contenidos de tu Sitio Web! ¿Necesitas ayuda? Póngase en contacto con el desarrollador.</p>';
echo '<ul><li>Tema Desarrollado por: J-Frem</li>Copyright ©2014<li><a href="mailto:jfrem181@hotmail.com">E-Mail</a></li><li><a href="http://twitter.com/J_frem" target="_blanck">Twitter</a></li></ul>';
echo 'Visita nuestro Sitio Web <a href="http://www.yacomputadores.com" target="_blank">Ya! Computadores.</a>';
}

/**
 *  ---===Creando los meta tag de Facebook en nuestro tema de WordPress===---
 */
 
 function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];

if(empty($first_img)){ //Defines a default image
$first_img = get_bloginfo('stylesheet_directory')."/images/default_icon.jpg";
}
return $first_img;
}

// agrega mas opciones al editor visual wp
function habilitar_mas_botones($buttons) {
$buttons[] = 'backcolor';
$buttons[] = 'hr';
$buttons[] = 'sub';
$buttons[] = 'sup';
$buttons[] = 'fontselect';
$buttons[] = 'fontsizeselect';
$buttons[] = 'styleselect';
$buttons[] = 'cleanup';
return $buttons;
}
add_filter("mce_buttons_3", "habilitar_mas_botones");

