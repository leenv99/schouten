export const globalMixin = {
	methods: {
		catch(error) {
			this.loading = null;
			this.message = {
				type: 'error',
				text: `Er is een fout opgetreden. ${error}`
			}
		},		
	}	
}