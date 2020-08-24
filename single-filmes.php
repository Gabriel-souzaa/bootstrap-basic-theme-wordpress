<?php
/**
 * Template for displaying single post (read full post page).
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<?php 
						while (have_posts()) {
							the_post();

							get_template_part('content', get_post_format());
							the_post_thumbnail('medium');

							echo "<br>";
							
							$id = get_the_id();
							$genero = wp_get_post_terms($id, 'genero');
							$diretor = wp_get_post_terms($id, 'diretores');

							foreach ($genero as $termo) {
								$link = get_term_link($termo);
		
								echo "Gêneros: "."<a href='$link'>".$termo->name."</a>"."<br>";
							}

							foreach ($diretor as $termo) {
								$link = get_term_link($termo);
		
								echo "Diretor: "."<a href='$link'>".$termo->name."</a>"."";
							}

							echo "<h4>Lançamento: "; the_field('ano_de_lancamento');
							echo "<br><br>Estúdio: ";the_field('estudio');
							echo "<br><br>Nota da critíca: ";the_field('critica');
							echo "</h4>";


							echo "\n\n";
							
							bootstrapBasicPagination();

							echo "\n\n";

						} //endwhile;
						?> 
					</main>
				</div>
<?php get_sidebar('right'); ?> 
<?php get_footer(); ?>
