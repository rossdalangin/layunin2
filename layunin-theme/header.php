<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<style>
		:root {
			--navy-custom: <?php echo get_theme_mod( 'primary_color', '#050A18' ); ?>;
			--gold-custom: <?php echo get_theme_mod( 'accent_color', '#C5A02B' ); ?>;
            --accent: var(--gold-custom);
			--logo-width: <?php echo get_theme_mod( 'logo_width', '200' ); ?>px;
            --border-radius: <?php echo get_theme_mod( 'border_radius', '16' ); ?>px;
            --body-font: '<?php echo get_theme_mod( 'body_font', 'Inter' ); ?>', sans-serif;
            --heading-font: '<?php echo get_theme_mod( 'heading_font', 'Playfair Display' ); ?>', serif;
            --phi: 1.618;
		}
        <?php
        $cats = array('Goal Setting', 'Online Income', 'Productivity', 'AI Tools', 'Mindset', 'Business', 'Success Stories');
        foreach($cats as $cat) {
            $cat_id = sanitize_title($cat);
            $color = get_theme_mod("color_cat_{$cat_id}");
            if($color) {
                echo ".category-{$cat_id} { --cat-color: {$color}; }\n";
                echo ".bg-cat-{$cat_id} { background-color: {$color} !important; }\n";
                echo ".text-cat-{$cat_id} { color: {$color} !important; }\n";
            }
        }
        ?>
        body { font-family: var(--body-font); }
        h1, h2, h3, h4, h5, h6, .display-1, .display-2, .display-3, .display-4 { font-family: var(--heading-font); }
        .card, .btn, .form-control, .rounded-4 { border-radius: var(--border-radius) !important; }
        .announcement-bar {
            background: var(--navy-custom);
            color: #FFFFFF !important;
            padding: 10px 0;
            text-align: center;
            font-size: 0.85rem;
            font-weight: 700;
            position: relative;
            z-index: 2100;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .announcement-bar a { color: #C5A02B !important; text-decoration: none; }
        .announcement-bar a:hover { color: #FFFFFF !important; }
        .site-header { transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); }
        .site-header.scrolled { top: 0 !important; }
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <?php if ( get_theme_mod( 'show_announcement', true ) ) : ?>
    <div class="announcement-bar">
        <div class="container">
            <?php 
            $ann_text = get_theme_mod( 'announcement_text', 'LIMITED: Secure Your Free "Elite Productivity Vault" – Over 15,000+ Downloads!' );
            $ann_link = get_theme_mod( 'announcement_link', '/lead-magnet/' );
            if ( $ann_link ) : ?>
                <a href="<?php echo esc_url( $ann_link ); ?>" class="announcement-link"><span class="announcement-text"><?php echo esc_html( $ann_text ); ?></span> <i class="fas fa-arrow-right ms-2"></i></a>
            <?php else : ?>
                <span class="announcement-text"><?php echo esc_html( $ann_text ); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

	<header id="masthead" class="site-header fixed-top" style="<?php echo (get_theme_mod('show_announcement', true)) ? 'top: 44px;' : 'top: 0;'; ?>">
		<div class="container h-100">
			<div class="header-inner d-flex align-items-center justify-content-between h-100">

                <div class="site-branding">
					<?php if ( has_custom_logo() ) : ?>
						<div class="logo-wrapper" style="max-width: var(--logo-width);"><?php the_custom_logo(); ?></div>
					<?php else : ?>
						<h1 class="site-title mb-0 h3"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-navy text-decoration-none fw-bold"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>
				</div>

				<nav id="site-navigation" class="main-navigation d-none d-lg-flex align-items-center">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'menu_class'     => 'nav ms-auto gap-1'
					) );
					?>
					<div class="header-actions header-cta ms-5 d-flex align-items-center gap-3">
                        <button id="search-open" class="btn btn-link text-navy p-0 fs-5" title="Search Strategy"><i class="fas fa-search"></i></button>
						<button id="dark-mode-toggle" class="btn btn-link text-navy p-0 fs-5" title="<?php echo esc_attr(get_theme_mod('header_dark_mode_title', 'Switch Mode')); ?>"><i class="fas fa-moon"></i></button>
						<a href="<?php echo esc_url( get_theme_mod('header_cta_link', home_url('/contact/')) ); ?>" class="btn btn-gold px-4 py-2 small fw-bold shadow-sm"><?php echo esc_html(get_theme_mod('header_cta_text', 'Join the Elite Community')); ?></a>
					</div>
				</nav>

				<div class="d-lg-none d-flex align-items-center gap-3">
                    <button id="search-open-mobile" class="btn btn-link text-navy p-0 fs-4"><i class="fas fa-search"></i></button>
					<button id="dark-mode-toggle-mobile" class="btn btn-link text-navy p-0 fs-4"><i class="fas fa-moon"></i></button>
					<button class="menu-toggle btn p-0 text-navy fs-2" aria-expanded="false">
						<i class="fas fa-bars"></i>
					</button>
				</div>

			</div>
		</div>
	</header>

    <!-- Mobile Overlay Menu -->
    <div id="mobile-overlay" class="mobile-overlay">
        <div class="mobile-overlay-bg"></div>
        <div class="mobile-menu-inner container pt-4 pb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="mobile-logo">
                    <?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
                        <span class="h3 fw-bold text-navy mb-0"><?php bloginfo( 'name' ); ?></span>
                    <?php endif; ?>
                </div>
                <button class="mobile-close btn text-navy p-0 fs-1"><i class="fas fa-times"></i></button>
            </div>

            <!-- Strategic Mobile Search -->
            <div class="mobile-search-wrapper mb-4">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="input-group bg-light rounded-pill px-3 py-1 border">
                        <span class="input-group-text bg-transparent border-0 text-muted"><i class="fas fa-search"></i></span>
                        <input type="search" class="form-control bg-transparent border-0 py-2 ps-0" placeholder="Search strategy..." value="<?php echo get_search_query(); ?>" name="s">
                    </div>
                </form>
            </div>

            <div class="mobile-nav-wrapper mb-4">
                <span class="text-uppercase small fw-bold text-muted letter-spacing-1 d-block mb-3">Menu Navigation</span>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'container'      => false,
                    'menu_class'     => 'mobile-nav list-unstyled'
                ) );
                ?>
            </div>

            <!-- Strategic Context Switcher -->
            <div class="mobile-context-switcher mb-4">
                <div class="bg-light p-1 rounded-3 d-flex border">
                    <button class="btn btn-sm flex-fill fw-bold py-2 context-toggle active" data-context="global">
                        <i class="fas fa-globe-americas me-2"></i> Global Mastery
                    </button>
                    <button class="btn btn-sm flex-fill fw-bold py-2 context-toggle" data-context="local">
                        <i class="fas fa-map-marker-alt me-2"></i> PH Protocol
                    </button>
                </div>
            </div>


            <!-- Quick Access Strategy Grid -->
            <div class="mobile-strategy-grid mb-5">
                <span class="text-uppercase small fw-bold text-muted letter-spacing-1 d-block mb-3">Mastery Pillars</span>
                <div class="row g-2">
                    <div class="col-6">
                        <a href="/?s=AI" class="strategy-pill d-flex align-items-center gap-2 p-3 rounded-3 bg-light text-decoration-none text-navy">
                            <i class="fas fa-robot text-gold"></i>
                            <div>
                                <span class="small fw-bold d-block">AI Mastery</span>
                                <span class="x-small text-muted context-label" data-global="Global Trends" data-local="PH Workflows">Global Trends</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="/?s=Income" class="strategy-pill d-flex align-items-center gap-2 p-3 rounded-3 bg-light text-decoration-none text-navy">
                            <i class="fas fa-wallet text-gold"></i>
                            <div>
                                <span class="small fw-bold d-block">Revenue</span>
                                <span class="x-small text-muted context-label" data-global="USD Scaling" data-local="PH Outsourcing">USD Scaling</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="/?s=Productivity" class="strategy-pill d-flex align-items-center gap-2 p-3 rounded-3 bg-light text-decoration-none text-navy">
                            <i class="fas fa-bolt text-gold"></i>
                            <div>
                                <span class="small fw-bold d-block">Output</span>
                                <span class="x-small text-muted context-label" data-global="Deep Work" data-local="Energy Rituals">Deep Work</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="/?s=Mindset" class="strategy-pill d-flex align-items-center gap-2 p-3 rounded-3 bg-light text-decoration-none text-navy">
                            <i class="fas fa-brain text-gold"></i>
                            <div>
                                <span class="small fw-bold d-block">Mindset</span>
                                <span class="x-small text-muted context-label" data-global="Stoicism" data-local="Purpose Alignment">Stoicism</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Featured Product in Mobile Menu -->
            <div id="mobile-featured-card" class="mobile-featured-product mb-5 p-4 rounded-4 bg-light border position-relative">
                <div class="position-absolute top-0 end-0 p-3 opacity-10"><i class="fas fa-crown fa-3x"></i></div>
                <div class="position-relative z-1">
                    <span class="badge bg-gold text-navy mb-3 small fw-bold text-uppercase letter-spacing-1">Premium Blueprint</span>
                    <h4 id="featured-product-title" class="text-navy fw-bold mb-2">The Elite Goal Architect</h4>
                    <p id="featured-product-desc" class="text-muted small mb-3">The definitive framework for multi-year success and rapid scaling.</p>
                    <a id="featured-product-link" href="<?php echo esc_url(get_theme_mod('shop_item_1_link', '#')); ?>" class="btn btn-navy btn-sm w-100 fw-bold py-2">Secure Your Copy <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>


            <!-- Mastery Progress Tracker -->
            <div class="mobile-mastery-meta mb-4">
                <div class="d-flex justify-content-between align-items-end mb-2">
                    <span class="text-uppercase x-small fw-bold text-muted letter-spacing-1">Current Mastery Level</span>
                    <span class="badge bg-gold text-navy">Phase 1: Initiation</span>
                </div>
                <div class="progress" style="height: 6px; background: rgba(0,0,0,0.05);">
                    <div class="progress-bar" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <div class="elite-quote-box mb-5 p-3 border-start border-gold bg-light italic">
                <p class="mb-0 small text-muted fst-italic">"Direction over velocity. Systems over hustle."</p>
            </div>
<div class="mobile-actions mt-auto">
                <a href="<?php echo esc_url( get_theme_mod('header_cta_link', home_url('/contact/')) ); ?>" class="btn btn-gold w-100 mb-phi-s"><?php echo esc_html(get_theme_mod('header_cta_text', 'Join the Elite Community')); ?></a>

                <div class="mobile-contact text-center text-muted mt-phi">
                    <p class="small mb-1"><?php echo esc_html(get_theme_mod('contact_email', 'elite@layunin.com')); ?></p>
                    <div class="d-flex justify-content-center gap-3 mt-3">
                        <?php
                        $socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
                        foreach ( $socials as $social ) :
                            $link = get_theme_mod( "social_{$social}", '#' );
                            if ( $link && $link !== '#' ) : ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="text-muted fs-4"><i class="fab fa-<?php echo $social; ?>"></i></a>
                            <?php endif;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Full-screen Search Overlay -->
    <div id="search-overlay" class="search-overlay">
        <div class="search-overlay-bg"></div>
        <button id="search-close" class="btn text-white fs-1 position-absolute top-0 end-0 m-4"><i class="fas fa-times"></i></button>
        <div class="search-container container h-100 d-flex flex-column align-items-center justify-content-center">
            <div class="search-box-wrapper w-100" style="max-width: 800px;">
                <h2 class="text-white display-4 fw-bold mb-phi-l text-center">Audit Our Strategy Library</h2>
                <form role="search" method="get" class="search-form-overlay" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="input-group input-group-lg border-bottom border-white border-opacity-25 pb-3">
                        <input type="search" class="form-control bg-transparent border-0 text-white placeholder-white opacity-75 fs-2" placeholder="What are you pursuing?" value="<?php echo get_search_query(); ?>" name="s" id="search-input-overlay" autocomplete="off">
                        <button class="btn btn-link text-white fs-2 p-0" type="submit"><i class="fas fa-arrow-right"></i></button>
                    </div>
                </form>
                <div class="popular-searches mt-phi text-center">
                    <span class="text-white-50 small text-uppercase fw-bold letter-spacing-1 d-block mb-3">Priority Audit Areas:</span>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="/?s=AI" class="badge rounded-pill bg-white bg-opacity-10 text-white px-3 py-2 text-decoration-none hover-lift">AI Tools</a>
                        <a href="/?s=Income" class="badge rounded-pill bg-white bg-opacity-10 text-white px-3 py-2 text-decoration-none hover-lift">Online Income</a>
                        <a href="/?s=Productivity" class="badge rounded-pill bg-white bg-opacity-10 text-white px-3 py-2 text-decoration-none hover-lift">Productivity</a>
                        <a href="/?s=Mindset" class="badge rounded-pill bg-white bg-opacity-10 text-white px-3 py-2 text-decoration-none hover-lift">Elite Mindset</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if( is_single() ) : ?>
        <div class="reading-progress-container fixed-top" style="z-index: 2002; height: 4px; top: 0;">
            <div id="reading-progress-bar" class="bg-gold h-100" style="width: 0%; transition: width 0.1s ease;"></div>
        </div>
    <?php endif; ?>

    <div class="header-spacer" style="height: <?php echo (get_theme_mod('show_announcement', true)) ? '110px' : '70px'; ?>;"></div>
