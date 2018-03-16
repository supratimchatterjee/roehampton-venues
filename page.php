<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package roehampton_Venues
 */

get_header(); ?>


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
						<div class="uk-width-4-10 uk-text-right">
							<h1 class="uk-margin-large-bottom">
								<?php the_field('banner_text');?>
							</h1>
						</div>
					</div>
				</li>
			</ul>
		</div>

	<?php get_template_part( 'template-parts/content', 'page' ); ?>


<?php endwhile;?>

	
<?php
get_footer();
