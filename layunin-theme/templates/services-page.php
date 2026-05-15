<?php
/**
 * Template Name: Services Page
 */
get_header(); ?>
<main id="primary" class="site-main py-phi">
	<div class="container">
		<header class="entry-header text-center mb-phi animate-up">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-phi-s d-block services-badge"><?php echo esc_html(get_theme_mod('services_badge', 'Strategic Implementation')); ?></span>
			<h1 class="entry-title display-3 fw-bold text-navy"><?php echo esc_html( get_theme_mod( 'services_title', 'Services Page' ) ); ?></h1>
		</header>

		<div class="entry-content animate-up">
			<div class="services-intro text-center mb-phi mx-auto" style="max-width: 800px;">
				<p class="lead text-muted">We provide more than just advice. We deliver the architectural frameworks and execution systems required for world-class results in the digital economy.</p>
			</div>

			<div class="pricing-table-wrapper pricing-card-wrapper row justify-content-center mt-phi">
				<?php for($i = 1; $i <= 3; $i++) :
					$title = get_theme_mod("services_tier_{$i}_title", ($i==1?'Strategy':($i==2?'Mastery':'Architect')));
					$price = get_theme_mod("services_tier_{$i}_price", ($i==1?'&#8369;4,999':($i==2?'&#8369;14,999':'&#8369;49,999')));
					$features_raw = get_theme_mod("services_tier_{$i}_features", '');
					$link = get_theme_mod("services_tier_{$i}_link", '#');
					$featured = ($i == 2) ? 'featured border-accent shadow-lg' : 'border-0 shadow-sm';
					
					$features = explode('|', $features_raw);
				?>
				<div class="col-lg-4 col-md-6 mb-phi-l">
					<div class="pricing-card card <?php echo $featured; ?> text-center p-5 rounded-4 transition-all hover-lift h-100">
						<h3 class="h5 text-uppercase fw-bold mb-phi-s"><?php echo esc_html($title); ?></h3>
						<div class="price display-4 fw-bold mb-phi-l text-navy"><?php echo $price; ?></div>
						<ul class="list-unstyled mb-phi text-start">
							<?php foreach($features as $f) : if(trim($f)) : ?>
								<li class="mb-2 small"><i class="fas fa-check text-accent me-2"></i><?php echo esc_html(trim($f)); ?></li>
							<?php endif; endforeach; ?>
						</ul>
						<a href="<?php echo esc_url($link); ?>" class="btn <?php echo ($i==2?'btn-gold':'btn-outline-navy'); ?> w-100 py-3 fw-bold mt-auto"><?php echo esc_html(get_theme_mod("services_tier_{$i}_btn", 'Get Started')); ?></a>
					</div>
				</div>
				<?php endfor; ?>
			</div>

			<div class="elite-process-section mt-phi py-phi border-top">
				<h2 class="display-4 fw-bold text-navy text-center mb-phi">The Elite Implementation Process</h2>
				<div class="row g-4 mt-4">
					<?php
					$steps = array(
						array('icon' => 'fa-magnifying-glass-chart', 'title' => 'Diagnostic Audit', 'desc' => 'We begin with a deep-dive audit of your current systems, goals, and bottlenecks.'),
						array('icon' => 'fa-drafting-compass', 'title' => 'Architecture Design', 'desc' => 'We design a bespoke strategic roadmap tailored to your specific objective.'),
						array('icon' => 'fa-bolt-lightning', 'title' => 'Rapid Deployment', 'desc' => 'Implementation of AI workflows and productivity frameworks for immediate impact.'),
						array('icon' => 'fa-chart-line-up', 'title' => 'Scaling & Optimization', 'desc' => 'Continuous refinement to ensure long-term mastery and maximum ROI.')
					);
					foreach($steps as $step) : ?>
					<div class="col-lg-3 col-md-6 text-center">
						<div class="process-icon mb-phi-s">
							<div class="bg-light text-accent rounded-circle d-flex align-items-center justify-content-center mx-auto shadow-sm" style="width: 80px; height: 80px;">
								<i class="fas <?php echo $step['icon']; ?> fa-2x"></i>
							</div>
						</div>
						<h3 class="h5 fw-bold text-navy mb-2"><?php echo $step['title']; ?></h3>
						<p class="small text-muted px-2"><?php echo $step['desc']; ?></p>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="mt-phi p-5 bg-deep text-white rounded-4 text-center shadow-premium position-relative overflow-hidden">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-gold opacity-5" style="background: radial-gradient(circle at center, var(--gold) 0%, transparent 70%);"></div>
				<h2 class="h3 fw-bold mb-phi-l text-white services-custom-title position-relative z-index-1"><?php echo esc_html(get_theme_mod('services_custom_title', 'Need a Custom Solution?')); ?></h2>
				<p class="text-white-50 mb-phi-l mx-auto services-custom-desc position-relative z-index-1" style="max-width: 600px;"><?php echo esc_html(get_theme_mod('services_custom_desc', 'For large scale operations and international firms, we offer bespoke architectural consulting tailored to your specific mastery goals.')); ?></p>
				<a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-gold btn-lg px-5 services-custom-btn position-relative z-index-1"><?php echo esc_html(get_theme_mod('services_custom_btn', 'Initiate Consultation')); ?></a>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
