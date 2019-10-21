<?php 

/* Template Name: Vue Post */ ?>

<?php get_header(); ?>

<div id="app2"></div>

<div id="app">
	<h1>{{message}}</h1>
	<textarea v-model="message" placeholder="add multiple lines"></textarea>
	<button v-on:click="sendMessage()">Send	</button>
</div>

<?php get_footer(); ?>  