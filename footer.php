<?php
/**
 * The theme footer
 * 
 * @package bootstrap-basic
 */
?>

			</div><!--.site-content-->
			
			
			<footer id="site-footer" role="contentinfo">
				<div id="footer-row" class="row site-footer">
					<div class="col-md-6 footer-left">
						<?php 
						if (!dynamic_sidebar('footer-left')) {
							/* translators: %s Bootstrap Basic with link. */
							printf(__('Author: %s', 'bootstrap-basic'), '<a href="https://github.com/Gabriel-souzaa" rel="nofollow">Gabriel Souza</a>');
						} 
						?> 
					</div>
					<div class="col-md-6 footer-right text-right">
						<?php dynamic_sidebar('footer-right'); ?> 
					</div>
				</div>
			</footer>
		</div><!--.container page-container-->
		
		
		<!--wordpress footer-->
		<?php wp_footer(); ?> 
	</body>
</html>
