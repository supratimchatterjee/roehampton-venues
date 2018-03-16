<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package roehampton_Venues
 */

get_header(); ?>

	<div class="uk-container uk-container-center">

		<?php
		if ( have_posts() ) : ?>
				<div class="uk-text-center uk-margin-top">
				<h2><?php printf( esc_html__( 'Search Results for: %s', 'roehampton_venues' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				</div>
			
			<div class="uk-grid uk-grid-large uk-grid-match" data-uk-grid-match="{target:'figcaption p'}" data-uk-margin="{cls:'uk-margin-top'}">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div>

	</div><!-- #primary -->

<?php
get_footer();
