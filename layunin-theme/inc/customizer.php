<?php
/**
 * Layunin Theme Customizer - Absolute Masterpiece (v10.0)
 */

function layunin_customize_register( $wp_customize ) {

	// --- 1. CORE DESIGN SYSTEM ---
	$wp_customize->add_section( 'layunin_design_system', array( 'title' => 'Elite Design System', 'priority' => 10 ) );

    $wp_customize->add_setting( 'body_font', array( 'default' => 'Inter', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'body_font', array( 'label' => 'Body Font', 'section' => 'layunin_design_system', 'type' => 'select', 'choices' => array('Inter' => 'Inter', 'Roboto' => 'Roboto', 'Open Sans' => 'Open Sans') ) );

    $wp_customize->add_setting( 'heading_font', array( 'default' => 'Playfair Display', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'heading_font', array( 'label' => 'Heading Font', 'section' => 'layunin_design_system', 'type' => 'select', 'choices' => array('Playfair Display' => 'Playfair Display', 'Inter' => 'Inter', 'Montserrat' => 'Montserrat') ) );

    $wp_customize->add_setting( 'primary_color', array( 'default' => '#050A18', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array( 'label' => 'Brand Navy', 'section' => 'colors' ) ) );
	$wp_customize->add_setting( 'accent_color', array( 'default' => '#C5A02B', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array( 'label' => 'Elite Gold', 'section' => 'colors' ) ) );

    $wp_customize->add_setting( 'border_radius', array( 'default' => '16', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'border_radius', array( 'label' => 'Global Roundedness (px)', 'section' => 'layunin_design_system', 'type' => 'number' ) );

    // Category Colors
    $wp_customize->add_section( 'layunin_category_colors', array( 'title' => 'Category Colors', 'priority' => 12 ) );
	$cats = array(
        'Goal Setting'    => '#4A90E2',
        'Online Income'   => '#27AE60',
        'Productivity'    => '#F2994A',
        'AI Tools'        => '#9B51E0',
        'Mindset'         => '#EB5757',
        'Business'        => '#2D9CDB',
        'Success Stories' => '#C5A02B'
    );
	foreach($cats as $cat => $default_color) {
		$cat_id = sanitize_title($cat);
		$wp_customize->add_setting( "color_cat_{$cat_id}", array( 'default' => $default_color, 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "color_cat_{$cat_id}", array( 'label' => $cat . ' Color', 'section' => 'layunin_category_colors' ) ) );
	}

	// --- 2. HEADER & ANNOUNCEMENT ---
	$wp_customize->add_section( 'layunin_header_settings', array( 'title' => 'Header & Navigation', 'priority' => 18 ) );
	$wp_customize->add_setting( 'header_sticky', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'header_sticky', array( 'label' => 'Enable Sticky Header', 'section' => 'layunin_header_settings', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'header_cta_text', array( 'default' => 'Join the Elite Community', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'header_cta_text', array( 'label' => 'CTA Button Text', 'section' => 'layunin_header_settings' ) );
    $wp_customize->add_setting( 'header_dark_mode_title', array( 'default' => 'Switch Mode', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'header_dark_mode_title', array( 'label' => 'Dark Mode Toggle Title', 'section' => 'layunin_header_settings' ) );
    $wp_customize->add_setting( 'header_cta_link', array( 'default' => '/contact/', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'header_cta_link', array( 'label' => 'CTA Button Link', 'section' => 'layunin_header_settings' ) );
    $wp_customize->add_setting( 'logo_width', array( 'default' => '200', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'logo_width', array( 'label' => 'Logo Max Width (px)', 'section' => 'layunin_header_settings', 'type' => 'number' ) );

    $wp_customize->add_section( 'layunin_announcement', array( 'title' => 'Announcement Bar', 'priority' => 20 ) );
    $wp_customize->add_setting( 'show_announcement', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_announcement', array( 'label' => 'Show Announcement Bar', 'section' => 'layunin_announcement', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'announcement_text', array( 'default' => 'LIMITED: Secure Your Free "Elite Productivity Vault" – Over 15,000+ Downloads!', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'announcement_text', array( 'label' => 'Announcement Text', 'section' => 'layunin_announcement', 'type' => 'text' ) );
    $wp_customize->add_setting( 'announcement_link', array( 'default' => '/lead-magnet/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'announcement_link', array( 'label' => 'Announcement Link', 'section' => 'layunin_announcement', 'type' => 'text' ) );

    // --- 3. HOMEPAGE MASTER ENGINE ---
	$wp_customize->add_panel( 'layunin_homepage_panel', array( 'title' => 'Homepage Content', 'priority' => 30 ) );
	$wp_customize->add_section( 'layunin_home_visibility', array( 'title' => 'Section Visibility', 'panel' => 'layunin_homepage_panel' ) );
	$sections = array('hero', 'featured_posts', 'trust_badges', 'process', 'features', 'problem', 'solution', 'categories', 'lead_magnet', 'products', 'services', 'testimonials', 'final_cta');
	foreach ($sections as $section) {
		$wp_customize->add_setting( "show_home_{$section}", array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
		$wp_customize->add_control( "show_home_{$section}", array( 'label' => 'Show ' . ucfirst(str_replace('_', ' ', $section)), 'section' => 'layunin_home_visibility', 'type' => 'checkbox' ) );
	}

	// Hero
	$wp_customize->add_section( 'layunin_home_hero', array( 'title' => '1. Hero Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'hero_badge', array( 'default' => 'Elite Success Systems for Filipinos', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_badge', array( 'label' => 'Top Badge Text', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Manifest Your "Layunin" Into A High-Impact Reality', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Main Headline', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'Bridging the gap between Filipino ambition and world-class execution.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Sub-headline', 'section' => 'layunin_home_hero', 'type' => 'textarea' ) );

	// Products Page
	$wp_customize->add_section( 'layunin_page_shop', array( 'title' => 'Shop Page', 'priority' => 40 ) );
    for($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting( "shop_item_{$i}_title", array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "shop_item_{$i}_title", array( 'label' => "Product $i Title", 'section' => "layunin_page_shop" ) );
        $wp_customize->add_setting( "shop_item_{$i}_price", array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "shop_item_{$i}_price", array( 'label' => "Product $i Price", 'section' => "layunin_page_shop" ) );
        $wp_customize->add_setting( "shop_item_{$i}_link", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( "shop_item_{$i}_link", array( 'label' => "Product $i Link", 'section' => "layunin_page_shop" ) );
        $wp_customize->add_setting( "shop_item_{$i}_modules", array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "shop_item_{$i}_modules", array( 'label' => "Product $i Modules (comma separated)", 'section' => "layunin_page_shop" ) );
    }

	// Automation
	$wp_customize->add_section( 'layunin_automation', array( 'title' => 'Master Setup', 'priority' => 100 ) );
	$wp_customize->add_setting( 'recreate_pages_trigger', array( 'default' => false, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'recreate_pages_trigger', array( 'label' => 'Initialize Elite Site Ecosystem', 'section' => 'layunin_automation', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'layunin_customize_register' );

function layunin_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
