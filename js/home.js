//SEND CREATION QUERY



var URL = 'php/utils/vehicleUtil.php';

init();

$('.formVehicle').submit(function(e){
  e.preventDefault();
  $.ajax({
    method: 'POST',
    url: URL,
    data: $(this).serialize(),
    success: function(response){
      $('.listVehicle').append(response);
    }
  });

  $('.formVehicle')[0].reset();



});


function setUpdate(id){
  var element = $('.vh'+id);

  $('#Vmar').val($(element).children('.marque').html());
  $('#Vnom').val($(element).children('.code').html());
  $('#Vcol').val($(element).children('.couleur').html());
  $('#ACTION').val('update');
  $('#ID').val(id);

  element.hide();
}

function setDelete(id){
  //  alert('delete'+id);
  if(confirm('Voulez vous effacer l\'element?')){
    //$('.listVehicle').children('.vh'+id).css('background', '#000');
    //$('.listVehicle').children('.vh'+id).hide();
    $('.vh'+id).hide();
    $.post(
      URL,
      {
        action: 'delete',
        id: id
      },
      function(data){

      }
    );
  }

}

function init(){
  $.post(
    URL,
    {
      action: 'list'
    },
    function(data){
      $('.listVehicle').append(data);
    }
  );
}

function initRead(){
  $.post(
    URL,
    {
      action: 'read'
    },
    function(data){
      $('.listVehicleRead').append(data);
    }
  );
}

$('.menuELRead').click(function(){
  var section = $(this).attr('data');
  var body = $(this).attr('data-body');

  $('.zone').hide();

  $(section).toggle('drop');
  $(body).html('');
  initRead();
});

$('.menuELList').click(function(){

  var section = $(this).attr('data');
  var body = $(this).attr('data-body');

  $('.zone').hide();

  $(section).toggle('drop');
  $(body).html('');
  init();
});
