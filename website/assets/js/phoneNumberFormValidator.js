var inputCounter  = 0;
var phoneNumberInput = document.getElementById('phoneNumber');
phoneNumberInput.setAttribute( "autocomplete", "off" );
phoneNumberInput.setAttribute( "autofill", "off" );

phoneNumberInput.onkeydown = myFunction;
phoneNumberInput.oninput = isLetter;

function isLetter() {
  var checkPosition = phoneNumberInput.value.length - 1;
  var valueToCheck  = phoneNumberInput.value.substring(checkPosition, phoneNumberInput.value.length);


  if((isNaN(valueToCheck) && valueToCheck != '-') || checkPosition > 11)
    phoneNumberInput.value = '';
  else if(valueToCheck === '-' && (checkPosition === 3 || checkPosition === 7) )
  {
    return;
  }
  else if (isNaN(valueToCheck) )
  {
    phoneNumberInput.value = '';
  }
}

function myFunction() {

	  var key = event.keyCode || event.charCode;
    var isNumber = (47 < key && key < 58) || (95 < key && key < 106);
    var isDelete = key == 8 || key == 46; //backspace or delete
    var isDirectional = 36 < key && key < 41 ;
    var isDash = 109 == key || 189 == key;
    var checkPosition = phoneNumberInput.value.length;
    var valueToCheck  = phoneNumberInput.value.substring(checkPosition, phoneNumberInput.value.length+1);

	  if (isNumber) inputCounter++;
    else if (isDash && (inputCounter == 3 || inputCounter == 7) ) {
      inputCounter++;
      return;
    }
    else {
      phoneNumberInput.value = '';
    	inputCounter = 0;
    	return;
    } 
    
    if (inputCounter == 4 || inputCounter == 8) {
      var dashAppend = phoneNumberInput.value+'-';
      phoneNumberInput.value = dashAppend;
      inputCounter++;
    }

    if ( phoneNumberInput.value.length == 12) myFunctionUtil(); 
}

function myFunctionUtil() {
  var val = phoneNumberInput.value.slice(0, phoneNumberInput.value.length - 1);
  phoneNumberInput.value = val;
}