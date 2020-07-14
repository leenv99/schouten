<template>
	<div class="result">
		<h2>{{ result.title }}</h2>
			
		<a target="_blank" :href="result.link">{{ result.link }}</a>
		<p>{{ result.snippet }}</p>
	</div>
</template>

<script>
	export default {
		props: ['result']
	}
</script>