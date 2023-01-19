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
$('#imeKorisnika1').click(function() {
    console.log("Sortiranje");
    var brPromena=0;
  var tabela, red, promeni, i, x, y, trebaPromena;
  tabela = document.getElementById("tabela");
  promeni = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (promeni) {
    //start by saying: no switching is done:
    promeni = false;
    red = tabela.getElementsByTagName('tr');
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 3; i < (red.length - 2); i++) {
      //start by saying there should be no switching:
      trebaPromena = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = red[i].getElementsByTagName('td')[1];
      y = red[i + 1].getElementsByTagName('td')[1];
      console.log(x);
      console.log(y);
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        trebaPromena = true;
        brPromena++;
        break;
      }
    }
    if (trebaPromena) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      red[i].parentNode.insertBefore(red[i + 1], red[i]);
      promeni = true;
    }
  }
  if (brPromena>0) {
      brPromena=0;
      $('#imeKorisnika1').html('Ime&#8593');
      $('#prezimeKorisnika1').html('Prezime');
  }
});


$('#prezimeKorisnika1').click(function() {
    console.log("Sortiranje");
    var brPromena=0;
  var tabela, red, promeni, i, x, y, trebaPromena;
  tabela = document.getElementById("tabela");
  promeni = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (promeni) {
    //start by saying: no switching is done:
    promeni = false;
    red = tabela.getElementsByTagName('tr');
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 3; i < (red.length - 2); i++) {
      //start by saying there should be no switching:
      trebaPromena = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = red[i].getElementsByTagName('td')[2];
      y = red[i + 1].getElementsByTagName('td')[2];
      console.log(x);
      console.log(y);
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        trebaPromena = true;
        brPromena++;
        break;
      }
    }
    if (trebaPromena) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      red[i].parentNode.insertBefore(red[i + 1], red[i]);
      promeni = true;
    }
  }
  if (brPromena>0) {
      brPromena=0;
      $('#prezimeKorisnika1').html('Prezime&#8593');
      $('#imeKorisnika1').html('Ime');
  }
});