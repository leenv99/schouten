<template>
	<div>
		<message v-if="message" :message="message"></message>

		<div class="input-wrapper">
			<div class="input">
				<v-select :options="queries"
						  v-model="params.query_id"
						  :reduce="input => input.id"
						  placeholder="Selecteer een zoekopdracht"
						  label="input">					  
				</v-select>
			</div>

			<button :disabled="!params.query_id" 
					class="btn btn-primary"
					@click="loadResults(params, 1)">
				Resultaten weergeven
			</button>
		</div>

		<loading v-if="loading">{{ loading }}</loading>

		<div v-if="query.results" class="results">
			<h2>Resultaten voor '{{ query.query }}' {{ query.results.current_page }}/{{ query.results.last_page }}</h2>
			<div class="pages">
				<a href="#" 
				   @click.prevent="loadResults(params, page)" 
				   v-for="page in range(query.results)"
				   :class="{'selected': page == query.results.current_page}">
					{{ page }}   	
				</a>				
			</div>
			<result v-for="(result, key) in query.results.data" 
					:result="result"
					:key="key">			
			</result>
		</div>		
	</div>
</template>

<script>
	import vSelect from "vue-select";

	export default {
		mounted() {
			this.loadData();
		},
		data() {
			return {
				queries: [],
				query: {},
				params: {},
				loading: null,
				message: null
			}
		},
		methods: {
			loadData() {
				axios.get('/queries').then(response => {
					this.queries = response.data;
				}).catch(error => {
					this.catch(error);
				});
			},
			loadResults(params, page) {
				this.loading = 'Resultaten laden...';
				this.results = {}
				axios.get(`/queries/${params.query_id}`, {params: {
					page: page
				}}).then(response => {
					this.loading = null;
					this.query = response.data;
				}).catch(error => {
					this.catch(error);
				});
			},
			range(results) {
				// Using lodash to create a range of the pages that are needed for pagination
				return _.range(1, results.last_page + 1);
			}
		},
		components: {"v-select": vSelect},
	}
</script>