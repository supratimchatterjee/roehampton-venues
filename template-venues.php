<?php
/**
 Template Name: Venues
 */

get_header(); ?>
	<!-- Page banner -->
	<?php if ( have_posts() ) : ?>
 <?php while ( have_posts() ) : the_post(); ?>	
		<div class="uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
			<ul class="uk-slideshow">
				<li>
					<img src="<?php the_field ('banner');?>">
					<div class="uk-overlay-panel uk-flex uk-flex-bottom uk-flex-right padding-right-remove">
						<div class="uk-width-5-10 uk-text-right">
							<h1 class="uk-margin-large-bottom">
								<?php the_field('banner_text');?>
							</h1>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<!-- End of page banner -->
		
		<!-- Page Intro Block -->
		<?php $bg_img=get_field('background_image');?>
		<div class="uk-block intro-block"<?php if (!empty($bg_img)){?>style=" background-size:cover; background-image: url(<?php echo $bg_img; ?>); "<?php }?> >
			<div class="uk-container uk-container-center">
				<div class="uk-grid uk-flex-top uk-grid-large">
					<div class="uk-width-large-3-10 uk-width-medium-4-10">
						<h2><?php the_title();?></h2>
					</div>
					<div class="uk-width-large-7-10 uk-width-medium-6-10">
						<?php the_content();?>
					</div>
				</div>
			</div>
		</div>
		<!-- End of intro block -->

		<!-- Block section : Venue-->
			<div class="uk-block">
				<div class="uk-container uk-container-center">
					<div class="uk-grid uk-grid-large uk-grid-match tm-featured-venue" data-uk-margin="{cls:'tm-margin-top'}" data-uk-grid-match="{target:'figcaption p'}">
						
						<?php $terms = get_field('venues_relationship');?>
						<?php $i=1;?>
						<?php foreach($terms as $term):?>
							
							<div class="uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-3 uk-width-1-1 venue-type-<?php echo $i;?>">
							<figure>
								
								<?php $term_id = $term->term_id;?>
								<img src="<?php the_field('tax_image','place_'.$term_id);?>">
								<figcaption class="uk-text-center inverse">
								<?php $tax_trim = $term->description;?>
								<?php  $shortcontent = wp_trim_words( $tax_trim, $num_words = 8, $more = '' );?>
									<p>
										<?php echo $shortcontent; ?>
									</p>
									<a class="uk-button tm-button button-type-4" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
								</figcaption>
							</figure>
						</div>
						<?php $i++; endforeach;?>	
					</div>
					<h4 class="uk-margin-large-top">Location</h4>
					<div class="uk-margin-small-top">
						<div id="map" style="height: 380px; width: 100%;">
					</div>
					</div>
				</div>
			</div>
			<?php endwhile; endif; ?>
		<!-- End of block -->

<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
	<script type="text/javascript">
    var locations = [
	<?php if( have_rows('location') ): $p=1; ?>	   
	<?php while( have_rows('location') ): the_row(); ?>
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
