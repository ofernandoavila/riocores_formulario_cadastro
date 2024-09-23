<h2><?php _e( 'Informações Adicionais do Cliente', 'woocommerce' ); ?></h2>
    <table class="form-table">
        <tr>
            <th><label for="customer_type"><?php _e('Tipo de Cliente', 'woocommerce'); ?></label></th>
            <td>
                <div class="riocores-formulario-cadastro">
                    <div class="row">
                        <div class="col riocores_radio_container">
                            <label for="riocores_radio_fisica"><?php _e('Pessoa Física', 'woocommerce'); ?></label>
                            <input type="radio" id="riocores_radio_fisica" class="riocores_radio" name="tipo_cliente" value="fisica" <?= $tipo_cliente === 'fisica' ? 'checked' : '' ?>>
                        </div>
                        <div class="col riocores_radio_container">
                            <label for="riocores_radio_juridica"><?php _e('Pessoa Jurídica', 'woocommerce'); ?></label>
                            <input type="radio" id="riocores_radio_juridica" class="riocores_radio" name="tipo_cliente" value="juridica" <?= $tipo_cliente === 'juridica' ? 'checked' : '' ?>>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
            
            <tr id="cpf_field" style="<?php echo ( $tipo_cliente === 'fisica' ) ? '' : 'display:none;'; ?>">
                <th><label for="cpf"><?php _e( 'CPF', 'woocommerce' ); ?></label></th>
                <td>
                    <input type="text" name="cpf" id="cpf" maxlength="14" value="<?php echo esc_attr( $cpf ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e( 'Informe o CPF do cliente.', 'woocommerce' ); ?></span>
                </td>
            </tr>
            
            <tr id="data_nascimento_field" style="<?php echo ( $tipo_cliente === 'fisica' ) ? '' : 'display:none;'; ?>">
                <th><label for="data_nascimento"><?php _e( 'Data de Nascimento', 'woocommerce' ); ?></label></th>
                <td>
                    <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo esc_attr( $data_nascimento ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e( 'Informe a data de nascimento do cliente.', 'woocommerce' ); ?></span>
                </td>
            </tr>
            
            <tr id="cnpj_razao_social_fields" style="<?php echo ( $tipo_cliente === 'juridica' ) ? '' : 'display:none;'; ?>">
                <th><label for="cnpj"><?php _e( 'CNPJ', 'woocommerce' ); ?></label></th>
                <td>
                    <input type="text" name="cnpj" id="cnpj" value="<?php echo esc_attr( $cnpj ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e( 'Informe o CNPJ do cliente.', 'woocommerce' ); ?></span>
                </td>
            </tr>
            
            <tr id="razao_social_field" style="<?php echo ( $tipo_cliente === 'juridica' ) ? '' : 'display:none;'; ?>">
                <th><label for="razao_social"><?php _e( 'Razão Social', 'woocommerce' ); ?></label></th>
                <td>
                    <input type="numeric" name="razao_social" id="razao_social" value="<?php echo esc_attr( $razao_social ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e( 'Informe a razão social do cliente.', 'woocommerce' ); ?></span>
                </td>
            </tr>
            
            <tr>
                <th><label for="celular"><?php _e( 'Celular', 'woocommerce' ); ?></label></th>
                <td>
                    <input type="numeric" name="celular" id="celular" value="<?php echo esc_attr( $celular ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e( 'Informe o número de celular do cliente.', 'woocommerce' ); ?></span>
                </td>
            </tr>
        </div>
    </table>