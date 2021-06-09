$(function () {
    $('#confirmbtn').click(function(){

    })

    $('#packqty').keyup(function(){
        $('#subtotprice').html('<small>IDR</small>'+addCommas(this.value*$('#packprice').val()));
    });
});
