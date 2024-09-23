jQuery(document).ready(function($) {
    function init() {
        $('input[name="cpf"]').val(CPFMascara($('input[name="cpf"]').val()));
        $('input[name="celular"]').val(TelefoneMascara($('input[name="celular"]').val()));
        $('input[name="cnpj"]').val(CNPJMascara($('input[name="cnpj"]').val()));
    }

    $('.riocores_radio').change(function() {
        if ($('.riocores_radio:checked').val() == 'juridica') {
            $('#cnpj_razao_social_fields').show();
            $('#razao_social_field').show();
            
            $('#data_nascimento_field').hide();
            $('#cpf_field').hide();
        } else {
            $('#cnpj_razao_social_fields').hide();
            $('#razao_social_field').hide();
            
            $('#data_nascimento_field').show();
            $('#cpf_field').show();
        }
    });

    $('input[name="cpf"]').on( 'input', function() {
        $(this).val(CPFMascara($(this).val()));
    });
    
    $('input[name="celular"]').on( 'input', function() {
        $(this).val(TelefoneMascara($(this).val()));
    });
    
    $('input[name="cnpj"]').on( 'input', function() {
        $(this).val(CNPJMascara($(this).val()));
    });

    init();
});