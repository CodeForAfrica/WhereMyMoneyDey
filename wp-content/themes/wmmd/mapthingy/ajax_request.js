// create the XMLHttpRequest object, according browser
function get_XmlHttp() {
	  // create the variable that will contain the instance of the XMLHttpRequest object (initially with null value)
	  var xmlHttp = null;

	  if(window.XMLHttpRequest) {		// for Forefox, IE7+, Opera, Safari, ...
		xmlHttp = new XMLHttpRequest();
	  }
	  else if(window.ActiveXObject) {	// for Internet Explorer 5 or 6
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }

	return xmlHttp;
}
// sends data to a php file, via POST, and displays the received answer
function ajaxrequest(file, ed_id) {
  var request =  get_XmlHttp();		// call the function for the XMLHttpRequest instance
  var requestwinners = get_XmlHttp();
  document.getElementById("loading").style.display = 'block';
  	var the_data = 'region='+ed_id;
  	request.open("POST", file, true);
	
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send(the_data);	
	
  	request.onreadystatechange = function() {
   if (request.readyState == 4) {
      document.getElementById("context").innerHTML = request.responseText;

	  document.getElementById("loading").style.display='none';
    }
	}
  }