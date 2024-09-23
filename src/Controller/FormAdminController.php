<?php

namespace ofernandoavila\RiocoresFormularioCadastro\Controller;

class FormAdminController {
    public static function validate($user_id) {
        $errors = new \WP_Error();

        if ( isset( $_POST['tipo_cliente'] ) ) {
            $tipo_cliente = sanitize_text_field( $_POST['tipo_cliente'] );

            if ( $tipo_cliente === 'fisica' ) {
                // Validação do CPF
                if ( empty( $_POST['cpf'] ) ) {
                    $errors->add( 'cpf_error', __( 'O CPF é obrigatório.', 'woocommerce' ) );
                } elseif ( ! preg_match( '/^\d{11}$/', preg_replace( '/\D/', '', $_POST['cpf'] ) ) ) {
                    $errors->add( 'cpf_error', __( 'O CPF informado é inválido.', 'woocommerce' ) );
                }

                // Validação da Data de Nascimento
                if ( empty( $_POST['data_nascimento'] ) ) {
                    $errors->add( 'data_nascimento_error', __( 'A data de nascimento é obrigatória.', 'woocommerce' ) );
                }
            } elseif ( $tipo_cliente === 'juridica' ) {
                // Validação do CNPJ
                if ( empty( $_POST['cnpj'] ) ) {
                    $errors->add( 'cnpj_error', __( 'O CNPJ é obrigatório.', 'woocommerce' ) );
                } elseif ( ! preg_match( '/^\d{14}$/', preg_replace( '/\D/', '', $_POST['cnpj'] ) ) ) {
                    $errors->add( 'cnpj_error', __( 'O CNPJ informado é inválido.', 'woocommerce' ) );
                }

                // Validação da Razão Social
                if ( empty( $_POST['razao_social'] ) ) {
                    $errors->add( 'razao_social_error', __( 'A razão social é obrigatória.', 'woocommerce' ) );
                }
            }

            // Validação do Celular
            if ( empty( $_POST['celular'] ) ) {
                $errors->add( 'celular_error', __( 'O celular é obrigatório.', 'woocommerce' ) );
            } elseif ( ! preg_match( '/^\d{10,15}$/', preg_replace( '/\D/', '', $_POST['celular'] ) ) ) {
                $errors->add( 'celular_error', __( 'O número de celular informado é inválido.', 'woocommerce' ) );
            }
        }

        if ( ! empty( $errors->errors ) ) {
            foreach ( $errors->get_error_messages() as $error ) {
                add_settings_error( 'wc_custom_registration_errors', esc_attr( 'settings_error' ), $error, 'error' );
            }

            // Exibe os erros
            settings_errors( 'wc_custom_registration_errors' );

            // Evita que os dados sejam salvos se houver erros
            remove_action( 'personal_options_update', 'wc_custom_registration_save_extra_profile_fields' );
            remove_action( 'edit_user_profile_update', 'wc_custom_registration_save_extra_profile_fields' );
        }
    }

    public static function save($user_id) {
        // Verifica se o usuário tem permissão para editar o perfil
        if ( ! current_user_can( 'edit_user', $user_id ) ) {
            return false;
        }

        // Sanitize e atualiza os campos personalizados
        if ( isset( $_POST['tipo_cliente'] ) ) {
            update_user_meta( $user_id, 'tipo_cliente', sanitize_text_field( $_POST['tipo_cliente'] ) );
        }

        if ( isset( $_POST['cpf'] ) ) {
            $cpf = preg_replace( '/\D/', '', $_POST['cpf'] ); // Remove caracteres não numéricos
            update_user_meta( $user_id, 'cpf', sanitize_text_field( $cpf ) );
        }

        if ( isset( $_POST['birthdate'] ) ) {
            update_user_meta( $user_id, 'birthdate', sanitize_text_field( $_POST['birthdate'] ) );
        }

        if ( isset( $_POST['cnpj'] ) ) {
            $cnpj = preg_replace( '/\D/', '', $_POST['cnpj'] ); // Remove caracteres não numéricos
            update_user_meta( $user_id, 'cnpj', sanitize_text_field( $cnpj ) );
        }

        if ( isset( $_POST['razao_social'] ) ) {
            update_user_meta( $user_id, 'razao_social', sanitize_text_field( $_POST['razao_social'] ) );
        }

        if ( isset( $_POST['celular'] ) ) {
            $celular = preg_replace( '/\D/', '', $_POST['celular'] ); // Remove caracteres não numéricos
            update_user_meta( $user_id, 'celular', sanitize_text_field( $celular ) );
        }   
    }
}