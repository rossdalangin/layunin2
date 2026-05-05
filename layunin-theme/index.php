<?php get_header(); ?>

<main id="primary" class="site-main container py-phi">
	<div class="row">
		<div class="col-lg-8">
			<?php
			if ( have_posts() ) :
				echo '<div class="row g-4">';
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;
				echo '</div>';

				$older_label = get_theme_mod('archive_older_label', 'Previous Strategies');
				$newer_label = get_theme_mod('archive_newer_label', 'Recent Strategics');
				the_posts_navigation( array(
					'prev_text' => '<span class="archive-older-label">' . esc_html($older_label) . '</span>',
					'next_text' => '<span class="archive-newer-label">' . esc_html($newer_label) . '</span>',
				) );
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>
		<div class="col-lg-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php
get_footer();
