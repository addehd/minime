<?php 

/* Template Name: Front */ ?>


<script>

var ourRequest = new XMLHttpRequest()
ourRequest.open('GET', 'http://localhost:8888/min/wp-json/wp/v2/posts')
ourRequest.onload = function() {
  if (ourRequest.status >= 200 && ourRequest.status < 400) {
    var data = JSON.parse(ourRequest.responseText)
    console.log(data[0])

  } else {
    console.log("Connected to the server, but it returned an error.")
  }
}

ourRequest.onerror = function() {
  console.log("Connection error")
}

ourRequest.send()

</script>