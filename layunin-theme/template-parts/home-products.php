<section class="products-section py-phi bg-white">
	<div class="container text-center mb-phi animate-up">
		<h2 class="display-4 fw-bold text-navy mb-phi-s"><?php echo esc_html( get_theme_mod( 'products_title', 'Elite Assets & Accelerators' ) ); ?></h2>
		<p class="section-desc lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'products_desc', 'Precision-engineered tools to compress your learning curve and amplify your results.' ) ); ?></p>
	</div>

	<div class="container">
		<div class="row g-4">
			<?php 
            $theme_uri = get_template_directory_uri();
            $prods = array(
                1 => array('title' => 'The Elite Architect Manual', 'price' => '&#8369;1,499', 'link' => $theme_uri . '/downloadables/1_THE_ELITE_ARCHITECT_MANUAL.docx'),
                2 => array('title' => 'AI Revenue Exponential', 'price' => '&#8369;2,999', 'link' => $theme_uri . '/downloadables/2_AI_REVENUE_EXPONENTIAL.docx'),
                3 => array('title' => 'Digital Asset Empire', 'price' => '&#8369;4,999', 'link' => $theme_uri . '/downloadables/3_DIGITAL_ASSET_EMPIRE.docx'),
                4 => array('title' => 'The Elite Mindset Matrix', 'price' => '&#8369;1,999', 'link' => $theme_uri . '/downloadables/4_THE_ELITE_MINDSET_MATRIX.docx'),
                5 => array('title' => 'Wealth Architect Protocols', 'price' => '&#8369;3,499', 'link' => $theme_uri . '/downloadables/5_WEALTH_ARCHITECT_PROTOCOLS.docx'),
                6 => array('title' => 'The Ultimate Productivity Vault', 'price' => '&#8369;5,999', 'link' => $theme_uri . '/downloadables/6_THE_ULTIMATE_PRODUCTIVITY_VAULT.docx')
            );
			for($i = 1; $i <= 6; $i++) :
				$title = get_theme_mod("shop_item_{$i}_title", $prods[$i]['title']);
				$price = get_theme_mod("shop_item_{$i}_price", $prods[$i]['price']);
				$image = get_theme_mod("shop_item_{$i}_image", 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=400');
				$link  = get_theme_mod("shop_item_{$i}_link", $prods[$i]['link']);
				if($title) :
			?>
			<div class="col-lg-4 col-md-6 animate-up" style="animation-delay: <?php echo $i * 0.1; ?>s;">
				<div class="product-card card h-100 border-0 shadow-sm transition-all hover-lift overflow-hidden" style="border-radius: 30px !important;">
					<div class="product-img-wrapper position-relative overflow-hidden" style="height: 250px;">
						<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="w-100 h-100 object-fit-cover">
						<div class="price-tag position-absolute top-0 end-0 bg-gold text-white px-4 py-2 m-3 rounded-pill fw-bold shadow-sm"><?php echo esc_html($price); ?></div>
					</div>
					<div class="card-body p-5">
						<h3 class="h5 fw-bold text-navy mb-3"><?php echo esc_html($title); ?></h3>
						<div class="strategic-preview mb-4">
							<ul class="list-unstyled small text-muted mb-0">
								<li class="mb-2"><i class="fas fa-shield-alt text-gold me-2"></i> 8 Strategic Modules</li>
								<li class="mb-2"><i class="fas fa-bolt text-gold me-2"></i> Elite Execution Steps</li>
								<li><i class="fas fa-file-word text-gold me-2"></i> Masterpiece Doc Format</li>
							</ul>
						</div>
						<a href="<?php echo esc_url($link); ?>" class="btn btn-outline-navy w-100 py-3 fw-bold products-btn-text" download><?php echo esc_html(get_theme_mod('products_btn_text', 'Download Masterpiece')); ?></a>
					</div>
				</div>
			</div>
			<?php endif; endfor; ?>
		</div>
	</div>
</section>
