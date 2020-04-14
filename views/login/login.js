$(document).ready(function () {

	$("#btnlogar").click(function (e) {
		e.preventDefault();
		if (isNotEmpty($("#usulogin")) && isNotEmpty($("#senhalogin"))) {

			$.post('login/ver', $("#forlogin").serialize(), function (data) {
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
