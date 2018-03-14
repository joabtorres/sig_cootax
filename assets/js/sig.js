window.HELP_IMPROVE_VIDEOJS = false;
/**
 *
 * @author Joab Torres Alencar
 * @description Só carrega o conteudo da página após seu total carregamento
 */
function mostrarConteudo() {
    var elemento = document.getElementById("tela_load");
    elemento.style.display = "none";

    var elemento = document.getElementById("tela_sistema");
    if (elemento) {
        elemento.style.display = "block";
    }

    var elemento = document.getElementById("interface_login");
    if (elemento) {
        elemento.style.display = "block";
    }
}

/**
 * @author Joab Torres Alencar
 * @description classes para tratamento de preenchimento de campos
 */
$(document).ready(function () {
    mostrarConteudo();
    $('.money-bank').maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
    $('.input-data').mask("99/99/9999");
    $('.input-cpf').mask("999.999.999-99");
    $('.input-telefone').mask("(99) 9999-9999");
    $('.input-celular').mask("(99) 99999-9999");
});
/**
 * @author Joab Torres Alencar
 * @description Está função submite o forumlário de buscar rápida que está no menu principal
 */
function submit_form_navbar() {
    if (document.nSearchSGL) {
        document.nSearchSGL.submit();
    }
}

//oculta o arlert de mensagem
$("[data-hide]").on("click", function () {
    $("#alert-msg").toggle().addClass('oculta');
});
/**
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
 */

if (document.getElementById("container-usuario-form")) {
    /**
     * @author Joab Torres <joabtorres1508@gmail.com>
     * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
     */
    readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var num = input.name.replace("tImagem-", "");
            reader.onload = function (e) {
                $("#viewImagem-" + num).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    };
    /**
     * @author Joab Torres <joabtorres1508@gmail.com>
     * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
     */
    readDefaultURL = function () {
        var valor = $('input[name=nSexo]:checked').val();
        if (valor === "M") {
            $("#viewImagem-1").attr('src', '/assets/imagens/user_masculino.png');
        } else {
            $("#viewImagem-1").attr('src', '/assets/imagens/user_feminino.png');
        }
        if ($("#iImagem-user").val() !== null) {
            $("#iImagem-user").val(null)
        }
    };
}


/**
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
 */

if (document.getElementById("form_cooperado")) {
    /**
     * @author Joab Torres <joabtorres1508@gmail.com>
     * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
     */
    readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var num = input.name.replace("tImagem-", "");
            reader.onload = function (e) {
                $("#viewImagem-" + num).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    };
}
