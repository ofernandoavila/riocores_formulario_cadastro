<?php
/*
Plugin Name: RioCores Formulario de Cadastro
Description: Personaliza o cadastro de clientes no WooCommerce, adicionando campos obrigatórios específicos para Pessoa Física e Pessoa Jurídica.
Version: 1.0
Author: Fernando Ávila
*/

use ofernandoavila\RiocoresFormularioCadastro\Controller\FormController;
use ofernandoavila\RiocoresFormularioCadastro\Template\TemplateBuilder;

add_action( 'init', 'riocores_init' );
add_action( 'wp_enqueue_scripts', 'riocores_estilos_enqueue' );
add_action('woocommerce_register_form_start', 'riocores_form_start');
add_action('woocommerce_register_form_end', 'riocores_form_end');
add_action('woocommerce_register_post', 'riocores_form_validation', 10, 3);
add_action('woocommerce_created_customer', 'riocores_form_save');

function riocores_init() {
    require_once( 'vendor/autoload.php' );
}

function riocores_estilos_enqueue() {
    wp_enqueue_script( 'riocores_js_lib', plugin_dir_url(__FILE__) . '/js/lib.js', [], '1.0.0' );
    wp_enqueue_script( 'riocores_js', plugin_dir_url(__FILE__) . '/js/main.js', ['jquery' , 'riocores_js_lib'], '1.0.0' );
    wp_enqueue_style( 'riocores_estilo', plugin_dir_url(__FILE__) . '/css/style.css' );
}

function riocores_form_start() {
    echo TemplateBuilder::get_template('form/formulario-inicio');
}

function riocores_form_end() {
    echo TemplateBuilder::get_template('form/formulario-fim');
}

function riocores_form_validation($username, $email, $validation_errors) {
    return FormController::validate($username, $email, $validation_errors);
}

function riocores_form_save($customer_id) {
    return FormController::save($customer_id);
}