<?php $layout = get_theme_mod( 'blog_layout', 'grid' );
$col_class = ($layout == 'list') ? 'col-12 mb-phi' : 'col-lg-4 col-md-6 mb-phi-l';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $col_class . ' animate-up' ); ?>>
	<div class="card h-100 shadow-sm border-0 overflow-hidden p-0">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail overflow-hidden">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'large', array( 'class' => 'card-img-top transition-all' ) ); ?>
				</a>
			</div>
		<?php endif; ?>
		<div class="card-body p-4 <?php echo ($layout == 'list') ? 'd-md-flex align-items-center gap-4' : ''; ?>">
			<?php if($layout == 'list' && has_post_thumbnail()) : ?>
				<!-- Thumb already shown above in card-based but for list let's adjust if needed -->
			<?php endif; ?>
			<div class="content-inner w-100">
			<div class="entry-meta mb-3">
				<?php
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
					foreach( $categories as $category ) {
						$cat_id = $category->slug;
						echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="badge bg-cat-' . esc_attr( $cat_id ) . ' text-white text-uppercase px-3 py-2 rounded-pill me-1 small fw-bold text-decoration-none">' . esc_html( $category->name ) . '</a>';
					}
				}
				?>
			</div>
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title h5 mb-phi-s"><a class="text-navy text-decoration-none" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header>
			<div class="entry-excerpt text-muted small mb-phi-l">
				<?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
			</div>
			<div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
				<div class="small text-muted">
					<span class="me-2"><i class="far fa-calendar-alt me-1"></i> <?php echo get_the_date(); ?></span>
					<span><i class="far fa-clock me-1"></i> <?php echo layunin_reading_time(); ?> <?php echo esc_html(get_theme_mod('blog_min_text', 'min')); ?></span>
				</div>
				<a href="<?php the_permalink(); ?>" class="text-navy fw-bold small text-decoration-none read-more-text"><?php echo esc_html(get_theme_mod('read_more_text', 'Unlock Full Strategy')); ?> <i class="fas fa-arrow-right ms-1"></i></a>
			</div>
			</div>
		</div>
	</div>
</article>
