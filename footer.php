<div id="primary">
        <div id="dest" class="container">
          <!-- Example row of columns -->
          <div class="row row-footer">
            <div id="dest_1" class="col-lg-4">
            <h3>CONTACTENOS</h3>
            <h5>OFICINA PRINCIPAL</h5>
                <p><?php echo get_theme_mod( 'info_text', 'default_value' ); ?>

                 <strong class="contact">+57</strong>  <?php echo get_theme_mod( 'opcion1_url', 'default_value' ); ?><br>
                 <strong class="contact">+57</strong>  <?php echo get_theme_mod( 'opcion2_url', 'default_value' ); ?><br>
                 <strong class="contact">+57</strong>  <?php echo get_theme_mod( 'opcion3_url', 'default_value' ); ?></p>
         	  <h2 class="email"><a class="email" href="mailto:<?php echo get_theme_mod( 'company_email', 'default_value' ); ?>"><strong><?php echo get_theme_mod( 'company_email', 'default_value' ); ?></strong></a></h2>              
                    
            </div>
            <div id="dest_2" class="col-lg-4" style=" height: 280px; ">
              <h3 class="dest_2">ACTUALIDAD</h3>
              	<div id="justify">
                  <p>Se fortalecera economia campesina en el Huila</p> <p>CENIGAA contribuirá a fortalecer la economía campesina en el departamento del Huila.</p>
                 <a href="#" class="leer">VER MÁS</a>
                </div>              
           </div>
            <div id="dest_3" class="col-lg-4" style=" height: 280px; ">
              <h3 class="dest_3">CONVENIO CENIGAA - CINDETS</h3>
              	<div id="justify">
                <p>Convenio Especial para la elaboración de estudios que satisfagan los requerimientos del MADS en materia de sustracción de áreas&lt; de reserva forestal.</p>
                <a href="#" class="leer">VER MÁS</a>
                </div>
            </div>
          </div>      
        </div> <!-- /container -->
     </div>
<footer>
	<nav id="footer">
    	<ul>
        	<li><a href="#">Información Legal</a></li> |
        	<li><a href="#">Política de Privacidad</a></li>
        </ul>
    </nav>
    <div id="copy"><?php echo get_theme_mod( 'tcx_footer_copyright_text' ); ?> &copy; 2013 - <?php echo date( 'Y' ); ?> <strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'title' ); ?></a></strong> | sitio web desarrollado por Pandora Studio &#38; <a href="http://yacomputadores.com" target="_blank">Ya! Computadores</a>.</div>
</footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/theme-customizer.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
         <!-- FlexSlider -->
  <script defer src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
  </script>


  <!-- Syntax Highlighter -->
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/shCore.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/shBrushXml.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/shBrushJScript.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel.js"></script>
  <script defer src="<?php echo get_template_directory_uri(); ?>/js/demo.js"></script>
  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
  <?php wp_footer(); ?>
    </body>
</html>