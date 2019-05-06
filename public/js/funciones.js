$(function () {
  $('[data-toggle="popover"]').popover()
})

// poner 0000000000 en campo identificacion al momento de selcionar posicion de Consumidor final
$('#tipoIdentificacion').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    var tp=clickedIndex;
    if (tp==5) {
        $('#identificacion').val('0000000000');
    }else{
        $('#identificacion').val('')
    }
});


// eliminar peticios
function eliminar(argument) {
    var msj=$(argument).data('msj');
    if (!msj) {
        msj='';
    }
    var url=$(argument).data('url');
    swal({
    html:true,
      title: "¿Estás seguro?",
      text: "Tu no podrás recuperar este archivo: <br>"+msj,
      type: "info",
      showCancelButton: true,
      confirmButtonClass: "btn-primary",
      confirmButtonText: "¡Sí, bórralo!",
      closeOnConfirm: false,
      cancelButtonText:"Cancelar",
      cancelButtonClass:"btn-dark"
    },
    function(){
      window.location.replace(url);
    });
}

// inicializar fileinput, especialmente para fotos individuales
function subirFoto(elemento) {
    $(elemento).fileinput({
      browseClass: "btn btn-primary btn-block",
      showCaption: false,
      showUpload: false,
      language:'es',
      theme:'fas',
      previewFileType: "image",
      browseLabel: "Foto",
      browseIcon: "<i class='far fa-image'></i>",
      browseClass: "btn btn-outline-dark float-right",
      allowedFileTypes: ["image"],
      
    });
  }


// cargar foto en file input, especialmente para actualizaciones fotos individuales
function cargarFoto(elemento,urlFoto,nombreFoto,urlFotoEditar,id) {
  $(elemento).fileinput({
    uploadUrl: urlFotoEditar,
    allowedFileExtensions: ["jpg", "png", "gif"],
    maxImageWidth: 200,
    maxImageHeight: 150,
    resizePreference: 'height',
    maxFileCount: 1,
    resizeImage: true,
    resizeIfSizeMoreThan: 1000,
    autoReplace: true,
    maxFileCount: 1,
    uploadExtraData: {
      'id':id
    },
  }).on('filepreupload', function() {
      $('#kv-success-box').html('');
  }).on('fileuploaded', function(event, data) {
      $('#kv-success-box').append(data.response.link);
      $('#kv-success-modal').modal('show');
  });
}