$(document).ready(function () {

    botao(function () {
        listaCompra();
    });


    function botao(callback) {
        $.post('index/selprodutos', {}).done(function (retorno) {
            data = JSON.parse(retorno);
            console.log(data);
            var texto = '';


            for (var i = 0; i < data.length; i++) {
                var valor = "R$ " + data[i].valor.toString().replace(".", ",");

                texto += '<div class="col-md-4" style="margin-bottom: 20px;">' +
                    '<div class="card text-white bg-dark" style="width: 18rem;"> ' +
                    '<img class="card-img-top" height="350px" src="public/img/' + data[i].img + '" alt="Imagem de capa do card">' +
                    '<div class="card-body">' +
                    '<h5 class="card-title">' + data[i].descricao + '</h5>' +
                    '<p class="card-text">Valor: ' + valor + '</p>' +
                    '<button type="button" valor="' + data[i].id + '" class="buy btn btn-primary">Comprar!</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

            }

            $("#linhas").html(texto);
            callback();
        })


    }

    $(document).on("click", ".buy", function () {

        var pro = $(this).attr("valor");
        $.post('index/addCompra', { produto: pro }).done(function (data) {
            listaCompra();

        });

    });

    $(document).on("click", ".del", function () {
        var pro = $(this).attr("valor");
        $.post('index/rmCompra', { produto: pro }).done(function (data) {
            listaCompra();
        });

    });

    function listaCompra() {

        $.post('index/listaCompra/', function (data) {

            $("#tabcompras").find("tr:gt(0)").remove();

            try {
                data = JSON.parse(data);

                var texto = '';
                var vtotal = 0;

                for (var i = 0; i < data.length; i++) {
                    var valor = "R$ " + data[i].valorun.toString().replace(".", ",");

                    texto += '<tr>' +
                        '<td>' + data[i].descricao + '</td>' +
                        '<td>' + valor + '</td>' +
                        '<td>' + data[i].qtd + '</td>' +
                        '<td><img src="public/img/' + data[i].img + '" alt="imagem" style="height:40px; width:30px"></td>' +
                        '<td><button type="button" class="buy btn btn-success" valor="' + data[i].id + '" aria-hidden="true"><i class="fas fa-plus"></i></button><button class="del btn btn-danger" valor="' + data[i].id + '" type="button"><i class="fas fa-minus"></i></button></td>' +
                        '</tr>';

                    vtotal += data[i].valortotal;
                }
                var valor = "R$ " + vtotal.toString().replace(".", ",");

                $("#tablinhas").html(texto);
                $("#svalortotal").val(valor);
                $("#svalortotal").focus();
            }
            catch (ee) {

            }
        });
    }

    $(document).on("click", "#finalizar", function () {

        $.post('index/finalizarcompra').done(function (data) {
            console.log(data);
            if (data == '3') {
                alert('Você precisa estar logado como cliente para finalizar a compra.');
            }
        })

    });

});


