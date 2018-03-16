<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package roehampton_Venues
 */

get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<!-- Page banner -->
		<div class="uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
			<ul class="uk-slideshow">
				<li>
					<img src="<?php the_field('banner');?>">
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

		<!-- Introduction Block -->
		<div class="uk-block intro-block bg">
			<div class="uk-container uk-container-center">
				<div class="uk-grid uk-flex-top">
					<div class="uk-width-large-4-10 uk-width-medium-4-10">
						<h2><?php the_title();?></h2>
					</div>
					<div class="uk-width-large-6-10 uk-width-medium-6-10">
						<?php the_content();?>
					</div>
				</div>
			</div>
		</div>
		<!-- End of introduction block -->
		
		
		
		<!-- Specification -->
		<?php if( have_rows('capacity') ): ?>
		<div class="uk-block lavender-bg spec-block">
			<div class="uk-container uk-container-center">
				<h4>SPECIFICATIONS</h4>
				<h5>Capacity</h5>
			<div class="uk-grid " data-uk-margin="{cls:'tm-margin-top'}">
			<?php while( have_rows('capacity') ): the_row(); ?>
					<div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-6">
						<div class="uk-grid uk-flex-middle">
							<div class="uk-width-2-3 icon">
								<img src="<?php the_sub_field('capacity_image'); ?>">
							</div>
							<div class="uk-width-1-3 capacity">
								<?php the_sub_field('capacity_number'); ?>
							</div>
							<div class="uk-width-1-1 uk-text-center type uk-margin-top">
								<?php the_sub_field('style_name'); ?>
							</div>
						</div>
					</div>
			<?php endwhile; ?>
						
					</div>
				</div>
			</div>
			<?php endif; ?>
		<!-- End -->

		
		
		
		<!-- Dimension -->
		
		<div class="uk-block-small dimension-block">
			<div class="uk-container uk-container-center">
				<h5>Dimensions</h5>
				<ul class="uk-grid uk-grid-large uk-width-medium-1-2"  data-uk-margin="{cls:'uk-margin-small-top'}">
					<li class="uk-width-1-1 uk-width-medium-1-3">
						Length <strong><?php the_field('length');?>m</strong> 
					</li>
					<li class="uk-width-1-1 uk-width-medium-1-3"> 
						Width <strong><?php the_field('width');?>m</strong> 
					</li>
					<li class="uk-width-1-1 uk-width-medium-1-3"> 
						Floor Area <strong><?php the_field('floor_area');?>m<sup>2</sup></strong> 
					</li>
				</ul>
			</div>
		</div>
		<!-- End -->

		<!-- Block -->
		
		<div class="uk-block">
			
			<div class="uk-container uk-container-center">
				<!-- featured rooms-->
				<h4>GALLERY</h4>
			
				<div class="uk-grid uk-grid-match tm-featured-room" data-uk-margin="{cls:'tm-margin-top'}">
				<?php $images = get_field('venues_gallery');?>
				<?php if ($images):?>
				<?php foreach( $images as $image ): ?>
					<div class="uk-width-large-1-3 uk-width-medium-1-2 uk-width-small-1-1 uk-width-1-1">
					<figure>
							<a href="<?php echo $image['url']; ?>" data-uk-lightbox="{group:'my-group'}"><img src="<?php echo $image['sizes'][					 							'gallery_image']; ?>"></a>
						</figure>
					</div>
				<?php endforeach; ?>
						<?php endif;?>
				
				</div>

				<!--Map-->
				<h4 class="uk-margin-large-top">Location</h4>
				<div class="uk-margin-small-top">
					<div id="map" style="height: 380px; width: 100%;">
				</div>
			</div>
		</div>
		</div>
		<!-- End of block -->

	<?php endwhile;?>
	<?php endif;?>	

					
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
