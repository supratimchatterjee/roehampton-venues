<?php
/**
Template Name: About
 */

get_header(); ?>
	<!-- Page banner -->
	<?php while ( have_posts() ) : the_post();?>
		<div class="uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
			<ul class="uk-slideshow">
				<li>
					<?php $about_banner = get_field('banner');?>
					<?php if ($about_banner):?>
					<img src="<?php echo $about_banner;?>">
					<?php else:?>
					<img src="http://placehold.it/2340x839">
					<?php endif;?>
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
		<?php $bg_img = get_field('background_image');?>
		<div class="uk-block intro-block" <?php if (!empty($bg_img)){?>style=" background-size:cover; background-image: url(<?php echo $bg_img; ?>); "<?php }?>>
			<div class="uk-container uk-container-center">
				<div class="uk-grid uk-flex-top">
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

		<!-- Block section -->
			<div class="uk-block">
				<div class="uk-container uk-container-center about">
					<?php the_field('about_main_content');?>
				</div>
			</div>
<?php endwhile;?>
<?php
get_footer();
