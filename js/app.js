var App = Vue.extend({})

var router = new VueRouter()

var postList = Vue.extend({
	template: "<h1>Hej</h1>"
})

new VueRouter({
  routes: [
    { path: '/', component: Hello }
  ],
});

console.log(router)

// router.start(App, '#app2')