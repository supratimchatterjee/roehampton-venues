<?php
/**
Template Name: Accomodation
 */

get_header(); ?>
<!-- Page banner -->
<?php
			while ( have_posts() ) : the_post();?>
		<div class="uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
			<ul class="uk-slideshow">
				<li>
					<img src="<?php the_field ('banner');?>">
					<div class="uk-overlay-panel uk-flex uk-flex-bottom uk-flex-right padding-right-remove">
						<div class="uk-width-5-10 uk-text-right">
							<h1 class="uk-margin-large-bottom">
								<?php the_field ('banner_text');?>
							</h1>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<!-- End of page banner -->

		<!-- Introduction Block -->
		<div class="uk-block intro-block grey-bg">
			<div class="uk-container uk-container-center">
				<div class="uk-grid uk-flex-top uk-grid-large">
					<div class="uk-width-large-4-10 uk-width-medium-4-10">
						<h2><?php the_title ();?></h2>
					</div>
					<div class="uk-width-large-6-10 uk-width-medium-6-10">
						<?php the_content();?>
					</div>
				</div>
			</div>
		</div>
		<!-- End of introduction block -->
		
		<!-- Specification -->
		<div class="uk-block accomodation" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/Accommodation_TextureBackground.jpg); background-size:cover; background-repeat: no-repeat;">
			<div class="uk-container uk-container-center">
				<?php the_field('main_content');?>
			</div>
		</div>
		<?php endwhile;?>
		<!-- End -->
		
<?php
get_footer();
