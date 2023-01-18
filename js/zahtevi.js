$(document).ready(function() {
    $(document).on('click','.edit_data',function() {
    
    var zahtev_id=$(this).attr("id");
    
    $.ajax ({
    
        url:"pomocne/fetch.php",
        method: "POST",
        data: {
            zahtev_id: zahtev_id
        },
        dataType:"json",
        success: function(data) {
            $('#zahtev1').val(data.zahtev);
            $('#id_zahteva').val(data.id);
            $('#insert').val("Update");
            $('#add_data_Modal').modal('show');
        }
    
    });
    
    });
    
    $('#insert_form').on("submit",function(event) {
    event.preventDefault();
    if ($('#zahtev1').val()=="") {
        alert("Popunite novi zahtev");
    } else {
        $.ajax ({
            url:"pomocne/insert.php",
            method:"POST",
            data: $('#insert_form').serialize(),
            beforeSend: function() {
                $('#insert').val("Inserting");
            },
            success: function(data) {
                $('#insert_form')[0].reset();
                $('.tabela')[0].reset();
                $('#add_data_Modal').modal('hide');
                $('#promeniZahtev').html(data);
            }    
    
        });
    }
    
 });

     $('#obrisiDugme').click(function(){

        var zaBrisanje = $('input[name=cekboks]:checked');

        $.ajax ({
            url: 'pomocne/delete.php',
            type:'post',
            data: { zahtev_id:zaBrisanje.val()},
        success: function(rez) {
            if (rez=="Da") {
            zaBrisanje.closest('tr').remove();
            alert("Uspesno obrisan zahtev!");
            } else {
                alert("Niste izabrali nijedan zahtev!");
            }

        },
            error: function() {
            alert("Doslo je do greske, neuspesno brisanje!");
        }


    });

});    
        
});