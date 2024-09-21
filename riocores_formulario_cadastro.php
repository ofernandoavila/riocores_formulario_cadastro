<?php
/*
Plugin Name: RioCores Formulario de Cadastro
Description: Personaliza o cadastro de clientes no WooCommerce, adicionando campos obrigatórios específicos para Pessoa Física e Pessoa Jurídica.
Version: 1.0
Author: Fernando Ávila
*/

add_action('woocommerce_register_form_start', 'riocores_form_start');
add_action('woocommerce_register_form_end', 'riocores_form_end');

function riocores_form_end() {
    echo '</div>';
}

function riocores_form_start() {
    ?>
    <div id="riocores-formulario-cadastro">
    <p class="form-row form-row-wide">
        <label for="customer_type"><?php _e('Tipo de Cliente', 'woocommerce'); ?></label>
        <select name="customer_type" id="customer_type" required>
            <option value="fisica"><?php _e('Pessoa Física', 'woocommerce'); ?></option>
            <option value="juridica"><?php _e('Pessoa Jurídica', 'woocommerce'); ?></option>
        </select>
    </p>
    
    <div id="pf_fields">
        <p class="form-row form-row-wide">
            <label for="cpf"><?php _e('CPF', 'woocommerce'); ?></label>
            <input type="text" class="input-text" name="cpf" id="cpf" value="<?php if (!empty($_POST['cpf'])) echo esc_attr($_POST['cpf']); ?>" />
        </p>
        <p class="form-row form-row-wide">
            <label for="birthdate"><?php _e('Data de Nascimento', 'woocommerce'); ?></label>
            <input type="date" class="input-text" name="birthdate" id="birthdate" value="<?php if (!empty($_POST['birthdate'])) echo esc_attr($_POST['birthdate']); ?>" />
        </p>
    </div>

    <div id="pj_fields" style="display:none;">
        <p class="form-row form-row-wide">
            <label for="cnpj"><?php _e('CNPJ', 'woocommerce'); ?></label>
            <input type="text" class="input-text" name="cnpj" id="cnpj" value="<?php if (!empty($_POST['cnpj'])) echo esc_attr($_POST['cnpj']); ?>" />
        </p>
        <p class="form-row form-row-wide">
            <label for="razao_social"><?php _e('Razão Social', 'woocommerce'); ?></label>
            <input type="text" class="input-text" name="razao_social" id="razao_social" value="<?php if (!empty($_POST['razao_social'])) echo esc_attr($_POST['razao_social']); ?>" />
        </p>
    </div>

    <p class="form-row form-row-wide">
        <label for="phone"><?php _e('Celular', 'woocommerce'); ?></label>
        <input type="tel" class="input-text" name="phone" id="phone" value="<?php if (!empty($_POST['phone'])) echo esc_attr($_POST['phone']); ?>" />
    </p>

    <script>
    jQuery(document).ready(function($) {
        $('#customer_type').change(function() {
            if ($(this).val() == 'juridica') {
                $('#pj_fields').show();
                $('#pf_fields').hide();
            } else {
                $('#pf_fields').show();
                $('#pj_fields').hide();
            }
        }).change();
    });
    </script>
    <?php
}