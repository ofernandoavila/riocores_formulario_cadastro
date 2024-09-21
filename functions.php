<?php

add_action( 'wp_enqueue_scripts', 'riocores_estilos_enqueue' );

function riocores_estilos_enqueue() {
	wp_enqueue_style( 'riocores_estilo', plugin_dir_url(__FILE__) . 'css/style.css', [], '1.0' );
}