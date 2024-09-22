jQuery(document).ready(function($) {
    $('.riocores_radio').change(function() {
        if ($('.riocores_radio:checked').val() == 'juridica') {
            $('#pj_fields').show();
            $('#pf_fields').hide();
        } else {
            $('#pf_fields').show();
            $('#pj_fields').hide();
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
});

