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
		
		<!-- Page Intro Block -->
		<?php $bg_img=get_field('background_image');?>
		<div class="uk-block intro-block" <?php if (!empty($bg_img)){?>style=" background-image: url(<?php echo $bg_img; ?>); "<?php }?>>
			<div class="uk-container uk-container-center">
				<div class="uk-grid uk-flex-top">
					<div class="uk-width-large-3-10 uk-width-medium-4-10">
						<h2><?php the_title ();?></h2>
					</div>
					<div class="uk-width-large-7-10 uk-width-medium-6-10">
						<p>
						<?php the_content();?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- End of intro block -->

		<!-- Block section -->
		<div class="uk-block">
			<div class="uk-container uk-container-center">
				<h4>SUPPLIERS</h4>
				<div class="uk-grid supplier-info">
			<?php if( have_rows('suppliers') ): ?>	   
			<?php while( have_rows('suppliers') ): the_row(); ?>
					<div class="uk-width-medium-1-2 uk-margin-top">
						<label><?php the_sub_field('supplier_name'); ?></label>
						<div class="uk-grid uk-grid-width-1-2">
							<div class="phone-number">
								<?php the_sub_field('supplier_number'); ?>
							</div>
							<div>
								<a href="<?php the_sub_field('website_link'); ?>">GO TO WEBSITE &nbsp;<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-right.svg" data-uk-svg></a>
							</div>
						</div>
					</div>
					<?php endwhile;?>
					<?php endif;?>
					<?php /*?><div class="uk-width-medium-1-2 uk-margin-top">
						<label>Lavender Green</label>
						<div class="uk-grid uk-grid-width-1-2">
							<div>
								020 7127 5303
							</div>
							<div>
								<a href="#">GO TO WEBSITE &nbsp;<img src="images/arrow-icon-right.svg" data-uk-svg></a>
							</div>
						</div>
					</div>
					<div class="uk-width-medium-1-2 uk-margin-top">
						<label>Richard Elder</label>
						<div class="uk-grid uk-grid-width-1-2">
							<div>
								01628 821 122
							</div>
							<div>
								<a href="#">GO TO WEBSITE &nbsp;<img src="images/arrow-icon-right.svg" data-uk-svg></a>
							</div>
						</div>
					</div>
					<div class="uk-width-medium-1-2 uk-margin-top">
						<label>Seasons Florists</label>
						<div class="uk-grid uk-grid-width-1-2">
							<div>
								020 8947 6654
							</div>
							<div>
								<a href="#">GO TO WEBSITE &nbsp;<img src="images/arrow-icon-right.svg" data-uk-svg></a> 
							</div>
						</div>
					</div><?php */?>
				</div>
			</div>
		</div>
		<!-- End of lock section -->
 <?php endwhile;?>
 <?php endif;?>

<?php
get_footer();
