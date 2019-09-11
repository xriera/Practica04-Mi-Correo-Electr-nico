$(document).ready(function () {

    //--------------------- SELECCIONAR FOTO PRODUCTO ---------------------
    $("#foto").on("change", function () {
        var uploadFoto = document.getElementById("foto").value;
        var foto = document.getElementById("foto").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');

        if (uploadFoto != '')
        {
            var type = foto[0].type;
            var name = foto[0].name;
            if (type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
            {
                contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                $("#img").remove();
                $(".delPhoto").addClass('notBlock');
                $('#foto').val('');
                return false;
            } else {
                contactAlert.innerHTML = '';
                $("#img").remove();
                $(".delPhoto").removeClass('notBlock');
                var objeto_url = nav.createObjectURL(this.files[0]);
                $(".prevPhoto").append("<img id='img' src=" + objeto_url + ">");
                $(".upimg label").remove();

            }
        } else {
            alert("No selecciono foto");
            $("#img").remove();
        }
    });

    $('.delPhoto').click(function () {
        $('#foto').val('');
        $(".delPhoto").addClass('notBlock');
        $("#img").remove();

        if ($("#foto_actual") && $("foto_remove")) {
            $("#foto_remove").val('img_producto.png')
        }

    });

    $('.add_product').click(function (e) {
        e.preventDefault();

        var producto = $(this).attr('product');
        var action = 'infoProducto';

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            async: true,
            data: {action: action, producto: producto},
            success: function (response) {
                console.log(response);
                if (response != 'error') {
                    var info = JSON.parse(response);
                    console.log(info);

                    $('#producto_id').val(info.codproducto);
                    $('.nameProducto').html(info.descripcion);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });

        $('.modal').fadeIn();
    });

    //Activa campos para registrar cliente
    $('.btn_new_cliente').click(function (e) {
        e.preventDefault();
        $('#nom_cliente').removeAttr('disabled');
        $('#tel_cliente').removeAttr('disabled');
        $('#dir_cliente').removeAttr('disabled');
        $('#div_registro_cliente').slideDown();
    });

});



function coloseModal() {
    $('.modal').fadeOut();
}