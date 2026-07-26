<?php

add_action( 'after_setup_theme', function () {
	add_editor_style( 'style.css' );
} );

add_action( 'init', function () {
	// CTA voice alternates (design.md § CTA voice) — styling in style.css.
	register_block_style( 'core/button', array(
		'name'  => 'on-photo',
		'label' => __( 'On photo (white)', 'fusion-circus' ),
	) );
	register_block_style( 'core/button', array(
		'name'  => 'ghost',
		'label' => __( 'Ghost (outline)', 'fusion-circus' ),
	) );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'fusion-circus-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
} );
