<?php
/**
 	Template Name: Home
 */

get_header(); ?>
<!-- Page banner -->
<?php if ( have_posts() ) : ?>
 <?php while ( have_posts() ) : the_post(); ?>	

	<div id="home-slider" class="uk-position-relative" data-uk-slideshow=			    "{animation:'fade',autoplay:true,pauseOnHover:false,autoplayInterval:8000,duration:2000}">
	<ul class="uk-slideshow">
	<?php if( have_rows('_slider') ): ?>	   
	<?php while( have_rows('_slider') ): the_row(); ?>
			<li>
				<img src="<?php the_sub_field('slider_image'); ?>">
			</li>
	<?php endwhile; ?>
	<?php endif; ?>	
	</ul>
		<div class="uk-overlay-panel uk-flex uk-flex-right uk-padding-remove">
			<div class="uk-width-1-2 uk-position-relative">
				<figure class="uk-margin-remove uk-position-cover">
					<div class="uk-gradient-container">
						<div class="uk-gradient">
							<div class="uk-grid uk-grid-width-1-5 uk-height-1-1">
								<div class="block block-1"></div>
								<div class="block block-2"></div>
								<div class="block block-3"></div>
								<div class="block block-4"></div>
								<div class="block block-5"></div>
							</div>
						</div>
					</div>
					<img id="gradient-image" class="uk-height-1-1" src="<?php echo get_template_directory_uri(); ?>/images/r-big.svg">
					<div class="uk-overlay-panel uk-flex uk-flex-bottom uk-flex-right padding-right-remove">
						<div class="uk-width-1-1 uk-text-right">
							<h1 class="uk-margin-large-bottom uk-padding-right-remove">
							<?php the_field('slider_text');?>
							</h1>
						</div>
					</div>
				</figure>
			</div>
		</div>
	</div>
		<!-- End of page banner -->

		<!-- Introduction Block -->
		
		<?php $bg_img=get_field('background_image');?>
		<div class="intro-block uk-position-relative"  <?php if (!empty($bg_img)){?>style=" background-image: url(<?php echo $bg_img; ?>); "<?php }?> >
			<div class="toggle-content">
				<div class="uk-container uk-container-center">
					<div class="toggle-section uk-position-absolute">
						<div>
							search by event type
						</div>
						<div class="toggle-button">
							All Event Types &nbsp;&nbsp;&nbsp;&nbsp;<img class="arrow-down" src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-down.svg" data-uk-svg><img class="arrow-down-green" src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-down-green.svg" data-uk-svg><img class="arrow-up" src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-up.svg" data-uk-svg><img class="arrow-up-green" src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-up-green.svg" data-uk-svg>	
						</div>
					</div>
					<div class="event_content uk-width-large-2-3">
			<?php $the_query = new WP_Query( array('posts_per_page' => -1,'post_type' => 'event' )); ?>
            <?php if( $the_query->have_posts() ): ?>
			
					<ul class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-3">
						<li><a href="<?php the_permalink(); ?>">All Event Types</a></li>
						<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
						<?php endwhile; ?>
                   </ul>
		  <?php endif; ?>
         <?php wp_reset_query(); ?>
					</div>
				</div>
			</div>
			<div class="block-content">
				<div class="uk-container uk-container-center">
					<div class="uk-grid uk-flex-bottom uk-grid-large">
						<div class="uk-width-large-1-2">
							<h2><?php the_field('welcome_heading');?></h2>
						</div>
						<div class="uk-width-large-1-2">
							<p class="uk-margin-small-bottom">
								<?php the_field ('welcome_content');?>
							</p>
						</div>
					</div>
					<div class="uk-grid uk-grid-match tm-feature-event" data-uk-grid-match="{target: 'figcaption p'}" data-uk-margin="{cls:'tm-margin-top'}">
                          <?php $post_objects = get_field('events_post');?>														
						<?php if( $post_objects ): $i=1; ?>
                        <?php foreach( $post_objects as $post_object): ?>
                   	    <?php $id = $post_object->ID; ?>
						<?php
							$sf_image = get_post_thumbnail_id($id );
							$sf_image  = wp_get_attachment_image_src( $sf_image, array (350,227));
							$sf_image = $sf_image[0];
						?>

                                <div class="uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-3 uk-width-1-1 event-type-<?php echo $i;?>">
                  		  <figure>
                                    <img src="<?php echo $sf_image;?>">
                                    <figcaption class="uk-text-center">
									<?php $con = $post_object->post_content;?>
									 <p><?php echo wp_trim_words( $con, 8, ' ' );?></p>
                                        <a class="uk-button tm-button" href="<?php echo get_the_permalink ($id);?>"><?php echo get_the_title($id); ?></a>
                                    </figcaption>
                                </figure>
                           </div>
					 <?php $i++; endforeach;?>
					<?php endif; ?> 
					</div>
				</div>
			</div>
		</div>
		<!-- End of introduction block -->

		<!-- featured Gallery -->
		<div class="uk-block">
			<div class="uk-container uk-container-center">
				<h4>FEATURED PLACES &amp; SPACES</h4>
				<div class="uk-grid uk-grid-large uk-grid-match tm-featured-gallery" data-uk-grid-match="{target:'figcaption'}" data-uk-margin="{cls:'tm-margin-top'}">
				   <?php $post_objects = get_field('places_post');?>														
						<?php if( $post_objects ): ?>
                        <?php foreach( $post_objects as $post_object): ?>
                   	    <?php $id = $post_object->ID; ?>
						<?php
							$sf_image = get_post_thumbnail_id($id );
							$sf_image  = wp_get_attachment_image_src( $sf_image, array (483,313));
							$sf_image = $sf_image[0];
						?>
					<div class="uk-width-large-1-2 uk-width-medium-1-2 uk-width-small-1-2 uk-width-1-1">
						<figure>
							<img src="<?php echo $sf_image;?>">
							<figcaption class="uk-text-center">
							<?php $cont = $post_object->post_content;?>
									<p>
										<?php echo wp_trim_words( $cont, 11, ' ' );?> 
									</p>
								<a href="<?php echo get_the_permalink ($id);?>"><?php echo get_the_title($id); ?> &nbsp; <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon.svg" data-uk-svg> </a>
							</figcaption>
						</figure>
					</div>
					 <?php endforeach;?>
					<?php endif; ?> 
				</div>
			</div>
		</div>
		<?php endwhile; endif; ?>
		<!-- End of featured gallery -->

<?php
get_footer();
