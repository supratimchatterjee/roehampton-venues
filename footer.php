<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package roehampton_Venues
 */

?>
<footer class="uk-position-relative">
			<div class="uk-container uk-container-center uk-text-center">
				<a href="<?php the_field ('enquire_button_link','option');?>" class="uk-button tm-enq-button button-type-5">ENQUIRE NOW</a>
                <div class="uk-width-1-1 uk-width-medium-8-10 uk-container-center">
					 <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer', 'menu_class' => 'uk-grid uk-margin-large-top uk-margin-large-bottom', 'container' => false ) ); ?>
						
                </div>      
				<div class="uk-container-center">
					<p>
	                
						<strong>Roehampton Venues</strong>
	                     <?php if( have_rows('footer_venue','option') ): ?>
	                 <?php while ( have_rows('footer_venue','option') ) : the_row(); ?>
	                     &nbsp; &nbsp;<?php the_sub_field ('footer_lebel','option');?>&nbsp; &nbsp;			  					
	                      <?php endwhile;?>
	                <?php endif;?> 
					</p>
				</div>
              
				<em><?php the_field('copyright_text','option');?></em>
			</div>
			<div class="uk-position-absolute signature">
                <a href="http://www.yellobelly.co.uk"> Made by Yellobelly</a>
            </div>
		</footer>

<?php wp_footer(); ?>

</body>
</html>
