$(document).on('click','.track-result',function(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/tracking-order-result",
        data: {
            uuid:$('.uuid').val()
        },
        success: function (response) {
            $('#tracking-order').html(response.data);
        }   
    });
})