$(document).ready(function () {

	$.post('cadastro/getEstados', function (data) {

		$("#estadocad").find("option").remove();

		try {
			data = JSON.parse(data);

			var texto = '<option value="" disabled selected>Selecione seu estado *</option>';

			for (var i = 0; i < data.length; i++) {
				texto += '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
			}
			$("#estadocad").html(texto);
		}
		catch (ee) {

		}

	});

	$("#estadocad").on("change", function () {

		$.post('cadastro/getCidades', $("#estadocad").serialize(), function (data) {

			$("#cidadecad").find("option").remove();

			try {
				data = JSON.parse(data);

				var texto = '<option value="" disabled selected>Selecione sua cidade *</option>';

				for (var i = 0; i < data.length; i++) {
					texto += '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
				}
				$("#cidadecad").html(texto);
			}
			catch (ee) {

			}
		});
	});


	$("#btncad").click(function (e) {
		e.preventDefault();

		if (isNotEmpty($("#nomecad")) && isNotEmpty($("#emailcad"))
			&& isNotEmpty($("#telcad")) && isNotEmpty($("#enderecocad"))
			&& isNotEmpty($("#estadocad")) && isNotEmpty($("#cidadecad"))
			&& isNotEmpty($("#usucad")) && isNotEmpty($("#senhacad"))) {
			
			$.post('cadastro/inserir', $("#forcad").serialize(), function (data) {
				if (data == "OK") {
					window.location = 'index';
				}
				else {
					$('#exampleModal').modal('show');
					$('#exampleModalLabel').html('<label">Atenção!</label>');
					$('#modal-body').html(data);
				}
			});
		} else {
			$('#exampleModal').modal('show');
			$('#exampleModalLabel').html('<label">Atenção!</label>');
			$('#modal-body').html('<label">Todos os campos devem estar preenchidos!</label>');
		}
	});
});

function isNotEmpty(caller) {
	if (caller.val() == '') {
		caller.css('border', '1px solid red');
		return false;
	} else
		caller.css('border', '');
	return true;
}
