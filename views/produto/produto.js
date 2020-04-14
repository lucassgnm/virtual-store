
$(document).ready(function () {

  $("#valor").keypress(function (e) {
    //o evento keydown pega o valor da tecla e compara 
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {

      //$("#errmsg").html("Digits Only").show().fadeOut("slow");
      return false;
    }
  });
  $('#valor').mask('#.##0,00', {reverse: true});

  $(document).on("click", "#ok", function () {
    var formData = new FormData(document.getElementById("formprod"));

    $.ajax({
        url: 'produto/salvar',
        type: 'POST',
        data: formData,
        success: function (data) {
          alert('Produto salvo com sucesso!');
          $('#formprod').each (function(){
            this.reset();
            $('#blah').remove();
            $('#imgreload').append('<img id="blah" width="300"/>');
          });
        },
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function () {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
        return myXhr;
        }
    });
  });
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#img").change(function () {
    readURL(this);
  });

});