$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
let confirm = $('#confirm-delete');
let message = confirm.text();

function callApi(data, url, type, dataType = 'json') {
    return $.ajax({
        type: type,
        url: url,
        dataType: dataType,
        data: data,
    })
}


function alertSuccessDelete(message) {
    return swal({
        icon: "success",
        title: message,
    });
}


function destroyResource(url, type, message) {
    return swal({
        title: message,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                callApi(data = null, url, type)
                    .done(res => {
                        alertSuccessDelete('Bạn đã xóa thành công !!!')
                        $('.product_' + res.id).html("");
                    });
            }
        });
}







