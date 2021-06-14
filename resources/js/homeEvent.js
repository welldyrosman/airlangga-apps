$(function () {
    $('#confirmbtn').click(function(){
        var obj=toolToObj($('#formbook'));
        var tok=$('meta[name="csrf-token"]').attr('content');
        var gid=tok.split('x').reverse().join()+'Wr00bT,'+obj.gid+'Wr00bT,'+tok.split('b').reverse().join();
        var data=new FormData($('#formbook')[0]);
        data.delete("gid");
        data.append("gid",gid);
        callService('/api/confirmbook',data,"POST").then((ret)=>{
            document.location.ID=ret;
            Swal.fire({
                    icon: 'success',
                    title: 'Tour Baru Berhasil Disimpan',
                    showConfirmButton: false,
                    timer: 1500,
            }).then((result) => {
                    var dt= JSON.parse(document.location.ID)
                    window.location='/invoicedet/'+dt.ID;
                });
                $('#saveBtn').html('Simpan Data');
            }).catch((err)=>{
                Swal.fire({
                    icon: 'error',
                    title: JSON.parse(err.responseText).message
                    })
                $('#saveBtn').html('Simpan Data');
            });
    })
    $('#QTY').keyup(function(){
        $('#subtotprice').html('<small>IDR</small>'+addCommas(this.value*$('#packprice').val()));
    });
});
