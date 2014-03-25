<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="container">
	<div id="slide" class="flexslider">
    	<ul class="slides">
        	<li>
            <img src="<?php echo get_template_directory_uri(); ?>/img/SLIDE-1.jpg" />
            </li>
            <li>
            <img src="<?php echo get_template_directory_uri(); ?>/img/SLIDE-2.jpg" />
            </li>
            <li>
            <img src="<?php echo get_template_directory_uri(); ?>/img/SLIDE-3.jpg" />
            </li>
            <li>
            <img src="<?php echo get_template_directory_uri(); ?>/img/SLIDE-4.jpg" />
            </li>
        </ul>
    </div>
</div>
    
  
<?php get_footer(); ?>