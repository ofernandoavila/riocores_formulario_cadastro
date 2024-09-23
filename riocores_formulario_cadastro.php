<?php
/*
Plugin Name: RioCores Formulario de Cadastro
Description: Personaliza o cadastro de clientes no WooCommerce, adicionando campos obrigatórios específicos para Pessoa Física e Pessoa Jurídica.
Version: 1.0
Author: Fernando Ávila
*/

use ofernandoavila\RiocoresFormularioCadastro\Controller\FormAdminController;
use ofernandoavila\RiocoresFormularioCadastro\Controller\FormController;
use ofernandoavila\RiocoresFormularioCadastro\Template\TemplateBuilder;

add_action( 'init', 'riocores_init' );
add_action( 'wp_enqueue_scripts', 'riocores_scripts_enqueue' );
add_action( 'admin_enqueue_scripts', 'riocores_admin_scripts_enqueue' );
add_action('woocommerce_register_form_start', 'riocores_form_start');
add_action('woocommerce_register_form_end', 'riocores_form_end');
add_action('woocommerce_register_post', 'riocores_form_validation', 10, 3);
add_action('woocommerce_created_customer', 'riocores_form_save');

add_action( 'show_user_profile', 'riocores_admin_form' );
add_action( 'edit_user_profile', 'riocores_admin_form' );

add_action( 'personal_options_update', 'riocores_admin_form_validation' );
add_action( 'edit_user_profile_update', 'riocores_admin_form_validation' );

add_action( 'personal_options_update', 'riocores_admin_form_save' );
add_action( 'edit_user_profile_update', 'riocores_admin_form_save' );


function riocores_init() {
    require_once( 'vendor/autoload.php' );
    wp_enqueue_script( 'riocores_js_lib', plugin_dir_url(__FILE__) . '/js/lib.js', [], '1.0.0' );
}

function riocores_scripts_enqueue() {
    wp_enqueue_script( 'riocores_js', plugin_dir_url(__FILE__) . '/js/main.js', ['jquery' , 'riocores_js_lib'], '1.0.0' );
    wp_enqueue_style( 'riocores_estilo', plugin_dir_url(__FILE__) . '/css/style.css' );
}

function riocores_admin_scripts_enqueue() {
    wp_enqueue_script( 'riocores_js_admin', plugin_dir_url(__FILE__) . '/js/admin/main.js', ['jquery' , 'riocores_js_lib'], '1.0.0' );
    wp_enqueue_style( 'riocores_estilo_admin', plugin_dir_url(__FILE__) . '/css/style.css' );
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

function riocores_admin_form($user) {
    echo TemplateBuilder::get_template(
        'form/admin/formulario-edicao', 
        [ 
            'tipo_cliente' => get_user_meta( $user->ID, 'tipo_cliente', true ),
            'cpf' => get_user_meta( $user->ID, 'cpf', true ),
            'data_nascimento' => get_user_meta( $user->ID, 'data_nascimento', true ),
            'cnpj' => get_user_meta( $user->ID, 'cnpj', true ),
            'razao_social' => get_user_meta( $user->ID, 'razao_social', true ),
            'celular' => get_user_meta( $user->ID, 'celular', true ),
        ]);
}

function riocores_admin_form_validation($user_id) {
    return FormAdminController::validate($user_id);
}

function riocores_admin_form_save($user_id) {
    return FormAdminController::save($user_id);
}