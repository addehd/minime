let url = "http://localhost:8888/acfrest/wp-json/acf/v3/pages/2/rubrik"

//https://stackoverflow.com/questions/44617825/passing-headers-with-axios-post-request
let axiosConfig = {
  headers: {
      "X-WP-Nonce": wpdata.nonce
  }
}
var app = new Vue({
  el: '#app',
  data: {
    message: '',
    counter: 0
  },
  methods: {
  	sendMessage: function(){	
			axios.post(url,  {
			"fields": {
				"rubrik": this.message } }, axiosConfig)
			.then(function (response) {
				// console.log(response)
			})
			.catch(function (error) {
				// console.log(error);
			})
  	}
  }, mounted(){
  	 	axios.get(url)
  	 	.then((response)=>
  	 		this.message = response.data.rubrik
  	 	)
  }
})