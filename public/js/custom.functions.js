//Select2

$('.kt-select2').select2({
  placeholder: 'Seleccione una opción'
});



//Obtener ciudades segun estado seleccionado
$( "#state" ).change(function() {
			
});


function intValidate(evt, type) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  
  var regex = null;
  
  if(type == 1){
	  regex = /[0-9]/;
  }
  else{
	  regex = /[0-9]|\./;
  }
  
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}