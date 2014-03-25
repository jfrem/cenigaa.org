<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset') ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title('-', true, 'right'); bloginfo() ?></title>
        <meta name="viewport" content="width=device-width , initial-scale=1 ,maximum-scale=1" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
        <link href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" rel="stylesheet" type="text/css">
        <link href="<?php echo get_template_directory_uri(); ?>/css/normalize.css" rel="stylesheet" type="text/css">
        <link rel="author" href="https://plus.google.com/106586798370661218208"/>


<?php
$thumb = get_post_meta($post->ID,'_thumbnail_id',false);
$thumb = wp_get_attachment_image_src($thumb[0], false);
$thumb = $thumb[0];
?>

<?php if(is_single() || is_page()) { ?>
<meta property="og:locale" content="es_LA" />
<meta property="fb:app_id" content="" />
<meta property="fb:admins" content="" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php single_post_title(''); ?>" />
<meta property="og:description" content="<?php
while(have_posts()):the_post();
$out_excerpt = str_replace(array("\r\n", "\r", "\n"), "", get_the_excerpt());
echo apply_filters('the_excerpt_rss', $out_excerpt);
endwhile; ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
<meta property="og:url" content="<?php the_permalink(); ?>"/>
<meta property="og:image" content="<?php if ( $thumb[0] == null ) { echo catch_that_image(); } else { echo $thumb; } ?>" />
<?php } else { ?>
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php bloginfo('name'); ?>" />
<meta property="og:url" content="<?php bloginfo('url'); ?>"/>
<meta property="og:description" content="<?php bloginfo('description'); ?>" />
<meta property="og:image" content="<?php if ( $thumb[0] == null ) { echo catch_that_image(); } else { echo $thumb; } ?>" />

<?php } ?>
<meta property="og:email" content="<?php bloginfo('admin_email'); ?>"/>

        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <?php wp_head(); ?>
    </head>
    
    <body <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
     
    <div class="navbar navbar-inverse navbar-fixed-top">
    <div id="social" class="visible-desktop">
     <div class="container">
      	<div id="siguenos"><h4>SIGUENOS EN |</h4></div>
        <div id="icono-social">
          <ul>
              <li>
                <a href="<?php echo get_theme_mod( 'facebook_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/f_social.png" class="fb"></a></li>
              <li>
                <a href="<?php echo get_theme_mod( 'twitter_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/t_social.png" class="tw"></a></li>
               <li>
                <a href="<?php echo get_theme_mod( 'youtube_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/canal_youtube.png" class="yt"></a></li>
          </ul>
        </div>
    </div>
      </div><!--Iconos-Sociales-->	    	
      <div class="container">      	
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" class="navbar-brand"></a>
        </div>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'navbar-collapse collapse', 'menu_class' => 'nav navbar-nav', 'menu_id'=> 'menu' ) ); ?><!--/.navbar-collapse -->
      </div>
    </div>