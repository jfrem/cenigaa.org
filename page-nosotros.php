<?php 
/*
Template Name: Nosotros
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
				<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/index-thumbnail.jpg" />
				<?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
    	<div id="contenido" class="container col-lg-12">
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

<div class="container">
	<div class="row">
			<?php query_posts('category_name=mision-vision&posts_per_page=2' );
				while ( have_posts() ) : the_post(); ?>
                <div class="col-lg-6">
                <h3 class="verde"><strong><?php the_title(); ?></strong></h3>
				<?php the_content('Leer Mas »'); ?>
                <?php edit_post_link('Editar',' ','<strong>|</strong>'); ?>
                </div><!-- end of col-lg-6" -->
			<?php endwhile; wp_reset_query(); ?>
	</div><!-- .row -->
</div><!-- .container-Principal cat-Misión_Visión -->

<section id="dest_abaut" class="container">
		<div class="col-lg-4" id="dest_img1">
        	<h5><strong>NUESTRO EQUIPO DE TRABAJO</strong></h5>
            <a href="#"><img class="imgcenter img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/equip_trabajo.png"></a>
        </div>
        <div class="col-lg-4" id="dest_img2">
        	<h5><strong>GRUPO DE INVESTIGACIÓN</strong></h5>
            <a href="#"><img class="imgcenter img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/grup_ investigacion.png"></a>
        </div>
        <div id="dest_img3" class="col-lg-4">
        	<h5><strong>PORTAFOLIO DE SERVICIOS</strong></h5>
            <a href="#"><img class="imgcenter img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/portafolio_servicios.png"></a>
        </div>
        <div id="footer_dest" class="container">
            <p>CENIGAA con el objetivo de contribuir a la competitividad científica y productiva para el impulso del desarrollo regional y nacional cuenta con un amplio portafolio de servicios y un equipo humano calificado para desarrollar las tareas pertinentes en la materia.
    </p>
        </div>
    </section>

<?php get_footer(); ?>
