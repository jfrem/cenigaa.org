<?php
/**
 * The Template for displaying all single posts
 *
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
				<img class="nosotros img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/index-thumbnail.jpg" />
				<?php } ?>
            </div><!--end imgheader -->
        </div><!--end row -->
    </div><!--end container -->
</div><!--end jumbotron -->

 <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <article id="post-<?php the_ID(); ?>">
            <?php if ( have_posts() ) : ?><?php while ( have_posts() ) : the_post(); ?>
<h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
            <small><!-- by <?php the_author() ?> --></small>
            <?php the_content('Leer Mas »'); ?>
            <?php edit_post_link('Editar',' ','<strong>|</strong>'); ?>
        <?php endwhile; ?>
    <?php else : ?><!-- Si no hay contenido en la pagina se ejecuta else-->
        <h2 class="center">No Encontrado</h2>  
        <p class="center">Lo Siento, pero lo que estas buscando no existe aqui.</p>  
    <?php include (TEMPLATEPATH . "/searchform.php"); ?>
    <?php endif; ?>
    </article>
        </div>
    </div><!-- .row -->
</div><!-- .container-Principal -->
 <?php get_footer(); ?>