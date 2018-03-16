<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package roehampton_Venues
 */

get_header(); ?>

	
		<?php if ( have_posts() ) : ?>
		<?php $place_term = get_queried_object ();?>
		<?php $term_id = $place_term->term_id;?>
		
		
		<!-- Page banner -->
		<div class="uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
			<ul class="uk-slideshow">
				<li>
					<?php $taxonomy_image = get_field ('tax_banner','place_'.$term_id);?>
					<?php if ($taxonomy_image):?>
					<img src="<?php echo $taxonomy_image;?>">
					<?php else:?>
					<img src="http://placehold.it/2340x839">
					<?php endif;?>
					<div class="uk-overlay-panel uk-flex uk-flex-bottom uk-flex-right padding-right-remove">
						<div class="uk-width-4-10 uk-text-right">
							<h1 class="uk-margin-large-bottom">
								<?php the_field ('tax_banner_text','place_'.$term_id);?>
							</h1>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<!-- End of page banner -->

		<!-- Introduction Block -->
		<div class="uk-block intro-block lavender-bg">
			<div class="uk-container uk-container-center">
				<div class="uk-grid uk-flex-top">
					<div class="uk-width-large-3-10 uk-width-medium-4-10">
						<h2><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>
	
					</div>
					<div class="uk-width-large-7-10 uk-width-medium-6-10">
						<?php

					the_archive_description( '<div class="archive-description">', '</div>' );
				?>

					</div>
				</div>
			</div>
		</div>
		<!-- End of introduction block -->
		
		
		
		
		
			<header class="page-header">
				
			</header><!-- .page-header -->
	<div class="uk-block">
			<div class="uk-container uk-container-center">
				<!-- featured rooms-->
				<h4>Rooms</h4>
				<div class="uk-grid uk-grid-match tm-featured-room" data-uk-margin="{cls:'tm-margin-top'}" data-uk-grid-match="{target:'figcaption'}">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-places', get_post_format() );

			endwhile;
			
			the_posts_navigation();


		else :

			get_template_part( 'template-parts/content', 'none' ); ?>
			
<?php endif; ?>
		
		</div>
	</div>
</div>







	<div class="uk-block">
		<div class="uk-container uk-container-center">
			<h4 class="uk-margin-large-top">Location</h4>
			<div class="uk-margin-small-top">
				<div id="map" style="height: 380px; width: 100%;">
				</div>
			</div>
		</div>
	</div>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
	<script type="text/javascript">
    var locations = [
	<?php if( have_rows('location','place_'.$term_id) ): $p=1; ?>	   
	<?php while( have_rows('location','place_'.$term_id) ): the_row(); ?>
      ['<?php the_sub_field('title'); ?>', -<?php the_sub_field('latitude'); ?>, <?php the_sub_field('longitude'); ?>, <?php echo $p; ?>],
    <?php $p++; endwhile; ?>
	<?php endif; ?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(-33.92, 151.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>

<?php
get_footer();
