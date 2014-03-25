<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div class="jumbotron">
	<div class="container">
    	<div class="row">
        	<div id="imgheader">
            	<?php
				if ( has_post_thumbnail() ) {
				the_post_thumbnail('index-thumbnail', array('class' => 'nosotros img-responsive', 'title' => get_the_title()));
				} else { ?>
				<img class="img-responsive nosotros" src="<?php echo get_template_directory_uri(); ?>/img/index-thumbnail.jpg" />
				<?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
    	<div id="contenido" class="container">
        	<?php if ( have_posts() ) : ?>
    		<?php while ( have_posts() ) : the_post(); ?>
        		<?php the_content('Leer Mas »'); ?>
        		<?php edit_post_link('Editar',' ','<strong>|</strong>'); ?>
			<?php endwhile; ?>
			<?php else : ?><!-- Si no hay contenido en la pagina se ejecuta else-->
    			<h2 class="center">No Encontrado</h2>  
    			<p class="center">Lo Siento, pero lo que estas buscando no existe aqui.</p>  
    		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			<?php endif; ?>
        </div>
	</div><!-- .row -->
</div><!-- .container-Principal -->
<?php get_footer(); ?>
