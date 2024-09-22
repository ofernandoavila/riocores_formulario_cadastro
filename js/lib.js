function CPFMascara(valor) {
    const cleanedCPF = valor.replace(/\D/g, "");
 
    let formattedCPF = cleanedCPF;
 
    if (cleanedCPF.length > 3 && cleanedCPF.length <= 6) {
        formattedCPF = cleanedCPF.replace(/(\d{3})(\d+)/, "$1.$2");
    } else if (cleanedCPF.length > 6 && cleanedCPF.length <= 9) {
        formattedCPF = cleanedCPF.replace(/(\d{3})(\d{3})(\d+)/, "$1.$2.$3");
    } else if (cleanedCPF.length > 9) {
        formattedCPF = cleanedCPF.replace(
            /(\d{3})(\d{3})(\d{3})(\d+)/,
            "$1.$2.$3-$4"
        );
    }
 
    return formattedCPF;
}
 
function CPFSanitize(valor) {
    let formattedCPF = '';
    if(valor !== undefined) {
        formattedCPF = valor.replace(/\D/g, "");
    }
    
    return formattedCPF;
}

function TelefoneMascara(telefone) {
    const input = telefone.replace(/\D/g, '');

    let formattedValue = '';

    if (input.length <= 2) {
        formattedValue = input;
    } else if (input.length <= 6) {
        formattedValue = `(${input.slice(0, 2)}) ${input.slice(2)}`;
    } else if (input.length <= 10) {
        formattedValue = `(${input.slice(0, 2)}) ${input.slice(2, 6)}-${input.slice(6, 10)}`;
    } else {
        formattedValue = `(${input.slice(0, 2)}) ${input.slice(2, 7)}-${input.slice(7, 11)}`;
    }

    return formattedValue;
}

function TelefoneSanitize(telefone) {
    telefone = telefone.replaceAll("(", "");
    telefone = telefone.replaceAll(")", "");
    telefone = telefone.replaceAll(" ", "");
    telefone = telefone.replaceAll("-", "");

    return telefone;
}

function CNPJMascara(cnpj) {
    if(cnpj === '' || cnpj === undefined) return '';

    return cnpj
    .replace(/\D+/g, '') // não deixa ser digitado nenhuma letra
    .replace(/(\d{2})(\d)/, '$1.$2') // captura 2 grupos de número o primeiro com 2 digitos e o segundo de com 3 digitos, apos capturar o primeiro grupo ele adiciona um ponto antes do segundo grupo de número
    .replace(/(\d{3})(\d)/, '$1.$2')
    .replace(/(\d{3})(\d)/, '$1/$2') // captura 2 grupos de número o primeiro e o segundo com 3 digitos, separados por /
    .replace(/(\d{4})(\d)/, '$1-$2')
    .replace(/(-\d{2})\d+?$/, '$1') // captura os dois últimos 2 números, com um - antes dos dois números
}