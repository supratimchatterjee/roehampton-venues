<?php
/**
Template Name: Partners
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
								<?php the_field ('banner_text');?>
							</h1>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<!-- End of page banner -->

		<!-- Introduction Block -->
		<div class="uk-block intro-block white-bg">
			<div class="uk-container uk-container-center">
				<div class="uk-grid uk-flex-top uk-grid-large">
					<div class="uk-width-large-3-10 uk-width-medium-4-10">
						<h2><?php the_title ();?></h2>
					</div>
					<div class="uk-width-large-7-10 uk-width-medium-6-10">
						<?php the_content();?>
					</div>
				</div>
			</div>
		</div>
		<!-- End of introduction block -->

		<!-- Block -->
		<div class="uk-block uk-padding-top-remove">
			<div class="uk-container uk-container-center">
				<!-- Featured partners-->
				
				<div class="uk-grid uk-grid-match tm-featured-partners" data-uk-margin="{cls:'tm-margin-top'}" data-uk-grid-match="{target:'figcaption p'}">
			<?php $the_query = new WP_Query( array('posts_per_page' => 4,'post_type' => 'partner' )); ?>
            <?php if( $the_query->have_posts() ): ?>
			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="uk-width-large-1-2 uk-width-medium-1-2 uk-width-small-1-1 uk-width-1-1">
						<figure>
							<?php the_post_thumbnail(  array( 483,313 ) ); ?>
							<figcaption class="uk-text-center">
								<p>
									<?php echo wp_trim_words( get_the_content(), 8,' ' ); ?> 
								</p>
								<a href="<?php the_permalink(); ?>"> <?php the_title ();?> &nbsp; <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-right.svg" data-uk-svg> <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-right-green.svg" data-uk-svg> </a>
							</figcaption>
						</figure>
					</div>
		<?php endwhile;?>
		  <?php endif; ?>
         <?php wp_reset_query(); ?>	
		</div>
	</div>
</div>
		<!-- End of block -->

<?php endwhile;?>
<?php endif;?>
<?php
get_footer();
