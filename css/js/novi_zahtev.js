function prikaziGrad(gradId1, gradId2, gradId3, element)
{
    document.getElementById(gradId1).style.display = element.value == "Srbin" ? 'block' : 'none';
    document.getElementById(gradId2).style.display = element.value == "Bosanac" ? 'block' : 'none';
    document.getElementById(gradId3).style.display = element.value == "Crnogorac" ? 'block' : 'none';
}