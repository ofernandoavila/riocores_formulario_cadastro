<div id="riocores-formulario-cadastro">
    <p class="form-row form-row-wide">
        <label for="customer_type"><?php _e('Tipo de Cliente', 'woocommerce'); ?></label>
        
        <div class="row">
            <div class="col riocores_radio_container">
                <label for="riocores_radio_fisica"><?php _e('Pessoa Física', 'woocommerce'); ?></label>
                <input type="radio" id="riocores_radio_fisica" class="riocores_radio" name="tipo_cliente" value="fisica" checked>
            </div>
            <div class="col riocores_radio_container">
                <label for="riocores_radio_juridica"><?php _e('Pessoa Jurídica', 'woocommerce'); ?></label>
                <input type="radio" id="riocores_radio_juridica" class="riocores_radio" name="tipo_cliente" value="juridica">
            </div>
        </div>
    </p>
    
    <div id="pf_fields">
        <p class="form-row form-row-wide">
            <label for="cpf"><?php _e('CPF', 'woocommerce'); ?></label>
            <input type="numeric" class="input-text" name="cpf" id="cpf" maxlength="14" value="<?php if (!empty($_POST['cpf'])) echo esc_attr($_POST['cpf']); ?>" />
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
        <input type="numeric" class="input-text" name="celular" id="celular" value="<?php if (!empty($_POST['celular'])) echo esc_attr($_POST['celular']); ?>" />
    </p>
    
    <p class="form-row form-row-wide">
        <label for="nome"><?php _e('Nome', 'woocommerce'); ?></label>
        <input type="text" class="input-text" name="nome" id="nome" value="<?php if (!empty($_POST['nome'])) echo esc_attr($_POST['nome']); ?>" />
    </p>