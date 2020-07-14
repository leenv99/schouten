<template>
	<div>
		<message v-if="message" :message="message"></message>

		<div v-if="results.length == 0" class="input-wrapper">
			<div class="input">	
				<input v-model="params.q" type="text" class="form-control" placeholder="Zoeken">
			</div>
			
			<button :disabled="!params.q" @click="loadData(params)" class="btn btn-primary">
				Resultaten ophalen	
			</button>			
		</div>

		<div v-else id="results">
			<button @click="save(params, results)" class="btn btn-primary">
				Resultaten opslaan
			</button>

			<div class="results">
				<result v-for="(result, key) in results.organic_results" 
						:result="result"
						:key="key">			
				</result>
			</div>
		</div>

		<loading v-if="loading">{{ loading }}</loading>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				params: {
					api_key: 'F0E59043AE24466C950E4A27BA0CC2E0',
					gl: 'nl',
					num: '100',
					q: null,
				},
				results: [],
				message: null,
				loading: false,
			}
		},
		methods: {
			loadData(params) {
				this.loading = 'Resultaten laden...';
				axios.get('https://api.scaleserp.com/search', {params: params}).then(response => {
					this.loading = null
					this.results = response.data;
				}).catch(error => {
					this.catch(error);
				});
			},
			save(params, results) {
				this.loading = 'Resultaten opslaan...';
				axios.post('/queries', {
					input: {input: params.q},
					results: results.organic_results
				}).then(response => {
					this.loading = null;
					this.results = [];
					this.message = {
						type: 'normal',
						text: 'Resultaten opgeslagen.'
					},
					this.params = {
						params: {
							api_key: 'F0E59043AE24466C950E4A27BA0CC2E0',
							gl: 'nl',
							num: '100',
							q: null,
						},						
					}
				}).catch(error => {
					this.catch(error);
				});
			}
		},
		watch: {
			message(val) {
				if(val) {
					window.setTimeout(() => {
						this.message = null;
					}, 3000)
				}
			}
		}
	}
</script>