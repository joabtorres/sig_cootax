function ocultaTela() {
    $("#tela_load").attr("style", "display: block");
    $("#tela_sistema").attr("style", "display: none");
    $("#interface_login").attr("style", "display: none");
}
function exibirTela() {
    $("#tela_load").attr("style", "display: none");
    $("#tela_sistema").attr("style", "display: block");
    $("#interface_login").attr("style", "display: block");
}


if (document.getElementById("form_motorista")) {

    $(document).ready(function () {
        validarCadastro();
    });

    function validarCadastro() {
        if (typeof motorista !== 'undefined') {
            if (motorista !== null) {
                ocultaTela();
                firebase.auth().createUserWithEmailAndPassword(motorista.email, motorista.senha)
                        .then(function (event) {
                            loginMotorista(motorista);
                        })
                        .catch(function (error) {
                            exibirTela();
                            var errorCode = error.code;
                            var errorMessage = error.message;
                            if (errorCode == 'auth/email-already-in-use') {
                                alert("Esta conta já foi cadastrada");

                            } else if (errorCode == 'auth/invalid-email') {
                                alert("Por favor, digite um e-mail válido");
                            } else if (errorCode == 'auth/invalid-email') {
                                alert("Esta conta já foi cadastrada");
                            } else if (errorCode == 'auth/weak-password') {
                                alert("Digite uma senha mais forte");
                            } else {
                                alert("Erro ao cadastrar motorista : " + errorMessage);
                            }
                        });

            }
        }
    }
    function loginMotorista(motorista) {
        firebase.auth().onAuthStateChanged(function (user) {
            if (user) {
                motorista.id = user.uid;
                cadastrarMotorista(motorista);
            } else {
                firebase.auth().signInWithEmailAndPassword(motorista.email, motorista.senha)
                        .catch(function (error) {
                            var errorCode = error.code;
                            var errorMessage = error.message;
                            exibirTela();
                            if (errorCode == 'auth/user-not-found') {
                                console.log("usuário não encontrado...")
                            } else {
                                console.log(error.code);
                                console.log(error.message);
                            }
                        });
            }
        });

    }

    function cadastrarMotorista(motorista) {
        firebase.database().ref('motoristas/' + motorista.id).set({
            id: motorista.id,
            nome: motorista.nome,
            email: motorista.email,
            senha: motorista.senha,
            mod_veiculo: motorista.mod_veiculo,
            placa_veiculo: motorista.placa_veiculo,
            status: motorista.status,
            nz: motorista.nz,
            data: Date(),
            gps: 'inativo'
        }).then(function () {
            exibirTela();

        }).catch(function (error) {
            console.log(error.code);
            console.log(error.message);
        });
        $(".alert-success").removeClass("oculta");
    }
}

carregarUsuario();
function carregarUsuario() {
    firebase.auth().onAuthStateChanged(function (user) {
        if (!user) {
            firebase.auth().signInWithEmailAndPassword("joabtorres.develop@gmail.com", "96560262joabTA")
                    .then(function (snapshot) {
                        location.reload();
                    }).catch(function (error) {
                var errorCode = error.code;
                var errorMessage = error.message;

                if (errorCode == 'auth/user-not-found') {
                    console.log("usuário não encontrado...")
                } else {
                    console.log(error.code);
                    console.log(error.message);
                }
            });
        }
    });
}
/**
 * Listar
 * */

if (document.getElementById("panel-lista-motoristas") !== null) {


    $(document).ready(function () {
         listaAllMotoristas();
        $("button#iBuscar").click(function () {
            execultabuscar();
        });
        $("#iCampo").keypress(function (key) {
            if (key.which == 13 || key.keyCode == 13) {
                execultabuscar();
            }
        });
    });
}
function execultabuscar() {
    var tipoPesquisa = $("#iSelectBuscar").val();
    if (tipoPesquisa === "nz") {
        $("#iCampo").val($("#iCampo").val().toUpperCase());
    }
    var campo = $("#iCampo").val();

    if (campo !== '' || campo !== null) {
        listaAllMotoristasPor(tipoPesquisa, campo);
    } else {
        listaAllMotoristas();
    }
}


function listaAllMotoristas() {
    document.getElementById("content_motoristas").innerHTML = "";
    ref = firebase.database().ref("motoristas");
    ref.orderByChild('data').on('child_added', function (snapshot) {
        $("#panel-lista-motoristas").removeClass("oculta");
        $(".alert-warning").addClass("oculta");
        add_table_motorista(snapshot.val());
    });
    if ($("#content_motoristas > tr").length <= 0) {
        $("#panel-lista-motoristas").addClass("oculta");
        $(".alert-warning").removeClass("oculta");
    }
}
function listaAllMotoristasPor(tipo, campo) {
    document.getElementById("content_motoristas").innerHTML = "";
    ref = firebase.database().ref("motoristas");
    ref.orderByChild(tipo)
            .startAt(campo)
            .on('child_added', function (snapshot) {
                add_table_motorista(snapshot.val());
                $("#panel-lista-motoristas").removeClass("oculta");
                $(".alert-warning").addClass("oculta");
            });
}

function listaAllMotoristas2() {
    ref = firebase.database().ref("motoristas");
    ref.orderByChild('nome')
            .startAt('bugados')
            .once('child_added')
            .then(function (snapshot) {
                add_table_motorista(snapshot.val());
                $("#panel-lista-motoristas").removeClass("oculta");
                $(".alert-warning").addClass("oculta");
            }).catch(function (err) {
        console.log(err);
    });
}

function add_table_motorista(motorista) {
    tr = document.createElement("tr");
    td_nz = document.createElement('td');
    td_nz.appendChild(document.createTextNode(motorista.nz));
    td_nome = document.createElement('td');
    td_nome.appendChild(document.createTextNode(motorista.nome));
    td_email = document.createElement("td");
    td_email.appendChild(document.createTextNode(motorista.email));
    td_veiculo = document.createElement("td");
    td_veiculo.appendChild(document.createTextNode(motorista.mod_veiculo + " | " + motorista.placa_veiculo));
    td_status = document.createElement("td");
    td_status.appendChild(document.createTextNode(motorista.status));
    td_acao = document.createElement("td");
    button_editar = document.createElement("a");
    button_editar.setAttribute("class", "btn btn-primary btn-xs");
    button_editar.setAttribute("href", window.base_url + "/editar/motorista/" + motorista.id);
    button_editar.setAttribute("title", "Editar");
    icon_editar = document.createElement('i');
    icon_editar.setAttribute("class", "fa fa-pencil-alt");
    button_editar.appendChild(icon_editar);
    button_excluir = document.createElement('button');
    button_excluir.setAttribute("type", "button");
    button_excluir.setAttribute("class", "btn btn-danger btn-xs");
    button_excluir.setAttribute("title", "Excluir");
    button_excluir.setAttribute("onclick", "validarExcluir('" + motorista.id + "')");
    icon_excluir = document.createElement('i');
    icon_excluir.setAttribute("class", "fa fa-trash");
    button_excluir.appendChild(icon_excluir);
    td_acao.appendChild(button_editar);
    td_acao.appendChild(document.createTextNode(" "));
    td_acao.appendChild(button_excluir);
    tr.appendChild(td_nz);
    tr.appendChild(td_nome);
    tr.appendChild(td_email);
    tr.appendChild(td_veiculo);
    tr.appendChild(td_status);
    tr.appendChild(td_acao);

    container = document.querySelector(".table > tbody");
    container.insertBefore(tr, container.nextElementSibling);
}


/**
 * Editar
 * */

if (document.getElementById("form_motorista_editar")) {

    $(document).ready(function () {
        consultaMotorista(cod);
    });

    function consultaMotorista(id) {
        ocultaTela();
        ref = firebase.database().ref("motoristas");
        ref.orderByChild('id').equalTo(id).once('child_added', function (snapshot) {
            editarMotorista(snapshot.val());
        }).then(function () {
            exibirTela();
        }).catch(function (error) {
            console.log(error.code);
            console.log(error.message);
        });
    }

    function editarMotorista(motorista) {
        var nome = document.getElementById("iNomeCompleto");
        nome.value = motorista.nome;
        var email = document.getElementById("iEmail");
        email.value = motorista.email;
        var email = document.getElementById("iEmail2");
        email.value = motorista.email;
        var senha = document.getElementById("iSenha");
        senha.value = motorista.senha;
        var senha2 = document.getElementById("iSenha2");
        senha2.value = motorista.senha;
        var nz = document.getElementById("iNz");
        nz.value = motorista.nz;
        var mod_veiculo = document.getElementById("imodVeiculo");
        mod_veiculo.value = motorista.mod_veiculo;
        var placa_veiculo = document.getElementById("iPlacaVeiculo");
        placa_veiculo.value = motorista.placa_veiculo;
        var status = document.nEditarMotorista.nStatus;
        status.value = motorista.status;
    }

    function validarEdicao() {
        if (typeof motorista !== 'undefined') {
            ocultaTela();
            if (motorista !== null) {
                if (motorista.nova_senha === '') {
                    atualizarMotorista(motorista);
                } else {
                    alterarSenhaMotorista(motorista);
                }
            }
        }
    }
    function alterarSenhaMotorista(motorista) {
        firebase.auth().onAuthStateChanged(function (user) {
            if (user) {
                user = firebase.auth().currentUser;
                var credential = firebase.auth.EmailAuthProvider.credential(user.email, motorista.senha);
                user.reauthenticateAndRetrieveDataWithCredential(credential)
                        .then(function () {
                            user.updatePassword(motorista.nova_senha).then(function () {
                                motorista.senha = motorista.nova_senha;
                                atualizarMotorista(motorista);
                                consultaMotorista(motorista.id);
                            }).catch(function (error) {
                                erroCode = error.code;
                                if (erroCode === "auth/weak-password") {
                                    alert("Digite uma senha mais forte");
                                } else if (erroCode === "auth/requires-recent-login") {
                                    console.log("Esta operação é sensível e requer autenticação recente. Faça o login novamente antes de tentar novamente esta solicitação");
                                }
                            });
                        }).catch(function (error) {
                    console.log(error.code);
                    console.log(error.message);
                });

            } else {
                firebase.auth().signInWithEmailAndPassword(motorista.email, motorista.senha)
                        .catch(function (error) {
                            var errorCode = error.code;
                            var errorMessage = error.message;

                            if (errorCode == 'auth/user-not-found') {
                                console.log("usuário não encontrado...")
                            } else {
                                console.log(error.code);
                                console.log(error.message);
                            }
                        });
            }
        });

    }

    function atualizarMotorista(motorista) {
        firebase.database().ref('motoristas/' + motorista.id).update({
            id: motorista.id,
            nome: motorista.nome,
            email: motorista.email,
            senha: motorista.senha,
            mod_veiculo: motorista.mod_veiculo,
            placa_veiculo: motorista.placa_veiculo,
            status: motorista.status,
            nz: motorista.nz
        }).then(function () {
            $(".alert-success").removeClass("oculta");
        }).catch(function (error) {
            console.log(error.code);
            console.log(error.message);
        });
    }
}

/**
 * Excluir
 * */
if (document.getElementById("panel-lista-motoristas")) {
    function validarExcluir(id) {
        ref = firebase.database().ref("motoristas");
        ref.orderByChild('id').equalTo(id).on('child_added', function (snapshot) {
            var motorista = snapshot.val();
            $("li.nome").html("<b> Nome:</b> " + motorista.nome);
            $("li.email ").html("<b> Email:</b> " + motorista.email);
            $("li.nz ").html("<b> NZ:</b> " + motorista.nz);
            $("#modal_Excluir").modal("show");
            $("a.removerMotorista").attr("onclick", "excluirMotorista('" + motorista.id + "')");
        });
    }
    function excluirMotorista(id) {
        $("#modal_Excluir").modal("hide");
        ref.orderByChild('id').equalTo(id).on('child_added', function (snapshot) {
            var motorista = snapshot.val();
            excluirContaMotrista(motorista);
        });
    }
    function excluirContaMotrista(motorista) {
        firebase.auth().onAuthStateChanged(function (user) {
            if (user) {
                user = firebase.auth().currentUser;
                var credential = firebase.auth.EmailAuthProvider.credential(user.email, motorista.senha);
                user.reauthenticateAndRetrieveDataWithCredential(credential)
                        .then(function () {
                            user.delete().then(function () {
                                firebase.database().ref('motoristas/' + motorista.id).remove().then(function () {
                                    listaAllMotoristas();
                                }).catch(function (error) {
                                    console.log(error.code);
                                    console.log(error.message);
                                });

                            }).catch(function (error) {
                                console.log(error.code);
                                console.log(error.message);
                            });

                        }).catch(function (error) {
                    console.log(error.code);
                    console.log(error.message);
                });

            } else {
                firebase.auth().signInWithEmailAndPassword(motorista.email, motorista.senha)
                        .catch(function (error) {
                            var errorCode = error.code;
                            var errorMessage = error.message;

                            if (errorCode == 'auth/user-not-found') {
                                console.log("usuário não encontrado...");
                                firebase.database().ref('motoristas/' + motorista.id).remove().then(function () {
                                    listaAllMotoristas();
                                }).catch(function (error) {
                                    console.log(error.code);
                                    console.log(error.message);
                                });
                            } else {
                                console.log(error.code);
                                console.log(error.message);
                            }
                        });
            }
        });
    }

}