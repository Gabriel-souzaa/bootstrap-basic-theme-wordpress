<?php 
/**
 * Displaying archive page (category, tag, archives post, author's post)
 * 
 * @package bootstrap-basic
 */

get_header('filmes'); 

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 

				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<?php if (have_posts()) { ?> 

						<header class="page-header">
							
							
							<?php
							// Show an optional term description.
							$term_description = term_description();
							if (!empty($term_description)) {
								/* translators: %s Description. */
								printf('<div class="taxonomy-description">%s</div>', $term_description);
							} //endif;
							?>
						</header><!-- .page-header -->
						
						<?php 
						/* Start the Loop */
						while (have_posts()) {
							the_post();

							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part('content', get_post_format());
							the_post_thumbnail('medium');
							echo "<br>";
							
							$id = get_the_id();
							$termos = wp_get_post_terms($id, 'genero');

							echo "Gêneros: ";
							foreach ($termos as $termo) {
								$link = get_term_link($termo);

								echo "<a href='$link'>".$termo->name."</a>";
							}
						} //endwhile; 
						?> 

						<?php bootstrapBasicPagination(); ?> 

						<?php } else { ?> 

						<?php get_template_part('no-results', 'archive'); ?> 

						<?php } //endif; ?> 
					</main>
				</div>
<?php get_sidebar('right'); ?> 
<?php get_footer(); ?>