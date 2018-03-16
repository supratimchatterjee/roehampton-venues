<?php
/**
 Template Name: Contact
 */

get_header(); ?>
	<!-- Page banner -->
		<div class="uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
			<ul class="uk-slideshow">
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/images/Contact_Banner.jpg">
					<div class="uk-overlay-panel uk-flex uk-flex-bottom uk-flex-right padding-right-remove">
						<div class="uk-width-5-10 uk-text-right">
							<h1 class="uk-margin-large-bottom">
								ELM GROVE<br>GROVE HOUSE<br>PARKSTEAD HOUSE
							</h1>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<!-- End of page banner -->
		
		<!-- Page Intro Block -->
		<div class="uk-block intro-block cyan-bg uk-padding-bottom-remove">
			<div class="uk-container uk-container-center">
				<div class="uk-grid uk-flex-top">
					<div class="uk-width-large-3-10 uk-width-medium-4-10">
						<h2>Contact</h2>
					</div>
					<div class="uk-width-large-7-10 uk-width-medium-6-10">
						<p>
							Picturesquely sited in the stunning parkland campuses of the University of Roehampton near Richmond Park and the A3, our three venues provide a choice of full-facility meeting rooms, exquisite banqueting suites, cutting-edge lecture theatres and contemporary seminar rooms seating up to 300 delegates. Within easy reach of Heathrow and Gatwick airports and the M25 with ample on site parking, Roehampton Venues are only 20 minutes from central London by bus and underground.
						</p>
					</div>
				</div>
				<hr class="uk-invisible">
				<h4><?php the_field ('form_title');?></h4>
				<div class="form-area">
					<?php echo apply_filters('the_content', get_field('form_shortcode') ); ?>
				</div>
			</div>
		</div>
		<!-- End of intro block -->

		<!-- Block section -->
			<div class="uk-block">
				<div class="uk-container uk-container-center">
					<h4>Location</h4>
					<div class="uk-margin-small-top">
						<div id="map" style="height: 380px; width: 100%;">
					</div>
					</div>
				</div>
			</div>
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
