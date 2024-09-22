jQuery(document).ready(function($) {
    $('.riocores_radio').change(function() {
        if ($('.riocores_radio:checked').val() == 'juridica') {
            $('#pj_fields').show();
            $('#pf_fields').hide();

            ToggleRequired('cnpj', true);
            ToggleRequired('razao_social', true);

            ToggleRequired('cpf', false);
            ToggleRequired('data_nascimento', false);
            
        } else {
            $('#pf_fields').show();
            $('#pj_fields').hide();
            
            ToggleRequired('cnpj', false);
            ToggleRequired('razao_social', false);

            ToggleRequired('cpf', true);
            ToggleRequired('data_nascimento', true);
        }
    }).change();

    $('input[name="cpf"]').on( 'input', function() {
        $(this).val(CPFMascara($(this).val()));
    });
    
    $('input[name="celular"]').on( 'input', function() {
        $(this).val(TelefoneMascara($(this).val()));
    });
    
    $('input[name="cnpj"]').on( 'input', function() {
        $(this).val(CNPJMascara($(this).val()));
    });

    function ToggleRequired(campo, isRequired) {
        $('input[name="' + campo + '"]').prop('required', isRequired);
    }
});

