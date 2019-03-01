$(document).ready(function () {

    $("#create").click(function(event) {

        storeProduct(event);

    });

    $("#updateProduct").click(function(event) {

        updateProduct(event);

    });

});

function storeProduct(event) {

    if (!validarForm("produtossForm", event)) {
        return false;
    }

    var form = {
        "data": {
            "name": $("#name").val(),
            "price": $("#price").val(),
        },
    };

    $.ajax({
        url: "/api/produto/cadastrar",
        type: "post",
        data: form,
        async: true,
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(response) {

            alert(response.message);

            if (response.status) {

                window.location = "/";

            }
        },
        error: function(error) {
            console.log(error.responseJSON || error.responseText);
        },
    });
}



function updateProduct(event) {

    if (!validarForm("updateProductsForm", event)) {
        return false;
    }

    var form = {
        "data": {
            "name": $("#name").val(),
            "price": $("#price").val(),
        },
    };

    var id = $("#idProduct").val();

    if (id == "") {
        alert("Error");
        window.location = "/";
    }

    $.ajax({
        url: "/api/produto/atualizar/" + id,
        type: "put",
        data: form,
        async: true,
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(response) {

            alert(response.message);

            if (response.status) {

                window.location = "/";

            }
        },
        error: function(error) {
            console.log(error.responseJSON || error.responseText);
        },
    });
}

function deleteProduct(id) {
    
    $.ajax({
        url: "/api/produto/delete/" + id,
        type: "delete",
        async: true,
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(response) {

            alert(response.message);

            if (response.status) {

                window.location = "/";

            }
        },
        error: function(error) {
            console.log(error.responseJSON || error.responseText);
        },
    });

}

function validarForm(form, event) {

    var form = $('#' + form);

    if (form.length <= 0 ) {
        return true;
    }

    if (form[0].checkValidity() === false) {

        if (!event ) {
            form[0].reportValidity();
        }else {
            event.preventDefault();
            event.stopPropagation();
        }

        form.addClass('was-validated');
        return false;

    }

    form.removeClass('was-validated');
    return true;

}