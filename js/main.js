function displayHeading(){
	var ourRequest = new XMLHttpRequest()
	ourRequest.open('GET', 'http://localhost:8888/acfrest/wp-json/acf/v3/pages')
	ourRequest.onload = function() {
	  if (ourRequest.status >= 200 && ourRequest.status < 400) {
	    var data = JSON.parse(ourRequest.responseText)
	    createHtml(data)
	  } else {
	    console.log('Connected to the server, but it returned an error.')
	  }
	}
	ourRequest.onerror = function() {
	  console.log("Connection error")
	}
	ourRequest.send()
}
displayHeading()

var rubrik = document.querySelector('#rubrik')
function createHtml(fieldData){
	rubrik.innerText = fieldData[2].acf.rubrik
}

var addPostBtn = document.querySelector('#field_change')
var changeHeading = function(){

	var postData = {
		"fields": {
			"rubrik": document.querySelector("#field_form [type='text']").value } }

	var postRequest = new XMLHttpRequest()
	postRequest.open('POST', 'http://localhost:8888/acfrest/wp-json/acf/v3/pages/2/rubrik')
	postRequest.setRequestHeader("X-WP-Nonce", wpdata.nonce)
	postRequest.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
	postRequest.send(JSON.stringify(postData))
}

addPostBtn.addEventListener('click', changeHeading)