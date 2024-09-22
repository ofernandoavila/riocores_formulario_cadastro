<?php

namespace ofernandoavila\RiocoresFormularioCadastro\Controller;

class FormController {
    public static function validate($username, $email, $validation_errors) {
        if (isset($_POST['tipo_cliente']) && $_POST['tipo_cliente'] == 'fisica') {
            if (empty($_POST['cpf'])) {
                $validation_errors->add('cpf_error', __('O CPF é obrigatório.', 'woocommerce'));
            } elseif (!preg_match('/^\d{11}$/', preg_replace('/\D/', '', $_POST['cpf']))) {
                $validation_errors->add('cpf_error', __('O CPF informado é inválido.', 'woocommerce'));
            }
    
            if (empty($_POST['data_nascimento'])) {
                $validation_errors->add('data_nascimento_error', __('A data de nascimento é obrigatória.', 'woocommerce'));
            }
        } elseif (isset($_POST['tipo_cliente']) && $_POST['tipo_cliente'] == 'juridica') {
            if (empty($_POST['cnpj'])) {
                $validation_errors->add('cnpj_error', __('O CNPJ é obrigatório.', 'woocommerce'));
            } elseif (!preg_match('/^\d{14}$/', preg_replace('/\D/', '', $_POST['cnpj']))) {
                $validation_errors->add('cnpj_error', __('O CNPJ informado é inválido.', 'woocommerce'));
            }
    
            if (empty($_POST['razao_social'])) {
                $validation_errors->add('razao_social_error', __('A razão social é obrigatória.', 'woocommerce'));
            }
        }
        
        if (empty($_POST['celular'])) {
            $validation_errors->add('celular_error', __('O celular é obrigatório.', 'woocommerce'));
        }
    }

    public static function save($customer_id) {
        if (isset($_POST['tipo_cliente'])) {
            update_user_meta($customer_id, 'tipo_cliente', sanitize_text_field($_POST['tipo_cliente']));
        }
        
        if (isset($_POST['cpf'])) {
            update_user_meta($customer_id, 'cpf', sanitize_text_field($_POST['cpf']));
        }
        
        if (isset($_POST['data_nascimento'])) {
            update_user_meta($customer_id, 'data_nascimento', sanitize_text_field($_POST['data_nascimento']));
        }
        
        if (isset($_POST['cnpj'])) {
            update_user_meta($customer_id, 'cnpj', sanitize_text_field($_POST['cnpj']));
        }
        
        if (isset($_POST['razao_social'])) {
            update_user_meta($customer_id, 'razao_social', sanitize_text_field($_POST['razao_social']));
        }
    
        if (isset($_POST['celular'])) {
            update_user_meta($customer_id, 'celular', sanitize_text_field($_POST['celular']));
        }   
    }
}