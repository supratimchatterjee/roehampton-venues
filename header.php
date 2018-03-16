<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package roehampton_Venues
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="site-header">
			<div class="header-offset">
				<div class="uk-container uk-container-center header-top uk-position-relative">
					<div class="uk-position-absolute uk-text-right">
						<?php the_field ('address','option');?>
					</div>
					<div class="uk-grid uk-flex-bottom uk-grid-collapse uk-margin-remove">
						<div class="uk-width-large-1-2 uk-width-medium-1-2 uk-width-small-1-2 uk-width-7-10 brand-logo">
							<a href="<?php bloginfo( 'url' ); ?>"><img src="<?php the_field ('_logo','option'); ?>" data-uk-svg></a>
						</div>
						<div class="uk-width-large-1-2 uk-width-medium-1-2 uk-width-small-1-2 uk-width-3-10 uk-text-right">
							<h3 class="uk-margin-top"><?php the_field ('tag_line','option'); ?></h3>
						</div>
					</div>
				</div>
			</div>
			<nav>
				<div class="uk-container uk-container-center">
					<div class="uk-grid uk-grid-collapse">
						<div class="uk-width-large-6-10 uk-visible-large">
                         	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','container' => false ) ); ?>
						</div>
						<div class="uk-width-large-4-10 uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1">
							<ul class="secondary-menu uk-text-right">
								<li><a href=""><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-icon.svg" data-uk-svg></a></li>
								<li><a href="<?php the_field('phone_number_link','option');?>"><?php the_field('phone_number','option');?></a></li>
								<li class="enquire-link"><a href="<?php the_field('enquire_link','option');?>"><?php the_field('enquire_text','option');?></a></li>
								<li class="uk-hidden-large"><a href="#offcanvas-menu"><img src="<?php echo get_template_directory_uri(); ?>/images/hamburger-menu-icon.png"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</header>
		<div id="offcanvas-menu" class="uk-offcanvas">
    		<div class="uk-offcanvas-bar uk-offcanvas-bar-flip">
    			<div class="header-offset"></div>
    			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'uk-nav uk-nav-offcanvas','container' => false ) ); ?>
    		</div>
		</div>