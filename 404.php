<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package roehampton_Venues
 */

get_header(); ?>

	<div class="uk-container uk-container-center">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( ' 404 Oops! That page can&rsquo;t be found.', 'roehampton_venues' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'roehampton_venues' ); ?></p> 

					<?php
						get_search_form();?>

						

					


				</div><!-- .page-content -->
			</section><!-- .error-404 -->


	</div><!-- #primary -->

<?php
get_footer();
