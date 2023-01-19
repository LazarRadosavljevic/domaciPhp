function prikaziGrad(gradId1, gradId2, gradId3, element)
{
    document.getElementById(gradId1).style.display = element.value == "Srbin" ? 'block' : 'none';
    document.getElementById(gradId2).style.display = element.value == "Bosanac" ? 'block' : 'none';
    document.getElementById(gradId3).style.display = element.value == "Crnogorac" ? 'block' : 'none';
}

function validacijaIme () {
    console.log("Prvo slovo imena mora veliko");
     const poruka=document.getElementById("imePoruka");
     poruka.innerHTML="";
     var x = document.getElementById("ime").value;
     try {
         if (!x.match(/^[A-Z]{1}/)) throw "Prvo slovo imena mora biti veliko";
        else poruka.innerHTML="";
     } catch(err) {
         poruka.innerHTML=err;
     }
 }


 function validacijaPrezime () {
    console.log("Prvo slovo prezimena mora veliko");
     const poruka=document.getElementById("prezimePoruka");
     poruka.innerHTML="";
     var x = document.getElementById("prezime").value;
     try {
         if (!x.match(/^[A-Z]{1}/)) throw "Prvo slovo prezimena mora biti veliko";
        else poruka.innerHTML="";
     } catch(err) {
         poruka.innerHTML=err;
     }
 }
