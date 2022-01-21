$('#dodajForm').submit(function () {
  event.preventDefault();
  console.log("Dodavanje");
  const $form = $(this);
  const $input = $form.find('input, select, button, textarea');

  const serijalizacija = $form.serialize();
  console.log(serijalizacija);

  $input.prop('disabled', true);

  req = $.ajax({
    url: 'DodajKnjigu.php',
    type: 'post',
    data: serijalizacija
  });

  req.done(function (res, textStatus, jqXHR) {
    if (res == "Ok") {
      alert("Knjiga je uspesno dodata");
      location.reload(true);
    } else console.log("Dodata je knjiga " + res);
    console.log(res);
  });

  req.fail(function (jqXHR, textStatus, errorThrown) {
    console.error('Sledeca greska se desila> ' + textStatus, errorThrown)
  });
});



$('.btn-danger').click(function () {
  console.log("Brisanje");
  const trenutni = $(this).attr('data-id1');
  const trBrisi = $('button[name=btnObrisi]');
  console.log(trenutni);
  req = $.ajax({
    url: 'obrisiKnjigu.php',
    type: 'post',
    data: { 'id': trenutni }
  });

  req.done(function (res, textStatus, jqXHR) {
    if (res == "Ok") {
      $(this).closest('tr').remove();
      alert('Uspesno ste obrisali knjigu');
      location.reload(true);
      console.log('Obrisan');
    } else {
      console.log("Knjiga nije izbrisana " + res);
      alert("Knjiga nije izbrisana ");

    }
    console.log(res);
  });

});



$('#btn-pretraga').click(function () {

  var para = document.querySelector('#myInput');
  console.log(para);
  var style = window.getComputedStyle(para);
  console.log(style);
  if (!(style.display === 'inline-block') || ($('#myInput').css("visibility") == "hidden")) {
    console.log('block');
    $('#myInput').show();
    document.querySelector("#myInput").style.visibility = "";
  } else {
    document.querySelector("#myInput").style.visibility = "hidden";
  }
});

$('#btn').click(function () {
  $('#pregled').toggle();
});

$('#btnDodaj').submit(function () {
  $('#myModal').modal('toggle');
  return false;
});

$('#btnIzmeni').submit(function () {
  $('#myModal').modal('toggle');
  return false;
});


//promena vrednosti cba
$("#zanr").change(function(){

  console.log("u fji changeeeeeeeeeeeeeeeeeee;");
  var idZanra =  $('#zanr').val();
  $('#idZanra').val(idZanra);
  
});


//Edit
$('.btn-info').click(function () {
  console.log("u oasdfosodfosadofo");
  const trenutni = $(this).attr('data-id2');


  console.log(trenutni);
  var naziv = $(this).closest('tr').children('td[data-target=naziv]').text();
  console.log(naziv);
  var autor = $(this).closest('tr').children('td[data-target=autor]').text();
  var zanr = $(this).closest('tr').children('td[data-target=zanr]').text();
  var idZanra =  $('#zanr').val();
  console.log(zanr);


  $('#idKnjige').val(trenutni);
  $('#naziv').val(naziv);
  $('#autor').val(autor);
  $('#test').val(zanr);
  $('#idZanra').val(idZanra);


  switch (zanr) {
    case "Autobiografija":
      $('#zanr').val("1");
      break;
    case "Avanturistički":
      $('#zanr').val("2");
      break;
    case "Bojanka":
      $('#zanr').val("3");
      break;
    case "Psihološki":
      $('#zanr').val("4");
      break;
    default:$('#zanr').val("1");
    
  }

  $('#my').modal('toggle');
});










//Update
$('#izmeniForma').submit(function(){

  event.preventDefault();
  console.log("Izmena");
  const $form = $(this);
  const $input = $form.find('input, select, button, textarea');

  const serijalizacija = $form.serialize();
  console.log(serijalizacija);

  $input.prop('disabled', true);

  req = $.ajax({
    url: 'AzurirajKnjigu.php',
    type: 'post',
    data: serijalizacija
  });

  req.done(function (res, textStatus, jqXHR) {
    if (res == 'Ok') {
      alert("Knjiga je uspesno azurirana");
      location.reload(true);
    } else console.log("Knjiga nije azurirana " + res);
    console.log(res);
  });

  req.fail(function (jqXHR, textStatus, errorThrown) {
    console.error('Sledeca greska se desila> ' + textStatus, errorThrown)
  });


});

