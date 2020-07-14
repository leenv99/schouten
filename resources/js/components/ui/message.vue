<template>
	<div class="alert" 
		 :class="{'alert-danger': message.type == 'error', 
		 		  'alert-success': message.type == 'normal'}">
		{{ message.text }}
	</div>
</template>

<script>
	export default {
		props: ['message']
	}
</script>