@extends('layout')

@section('content')
	<div>
		<div class="navbar">
			<a href="#" @click.prevent="navigateTo('load-results')" :class="{'selected': page == 'load-results'}">
				Resultaten importeren
			</a>
			<a href="#" @click.prevent="navigateTo('retrieve-results')" :class="{'selected': page == 'retrieve-results'}">
				Resultaten tonen
			</a>
		</div>

		<div class="container content">
			<div v-if="page == 'load-results'">
				<load-results></load-results>
			</div>

			<div v-if="page == 'retrieve-results'">
				<retrieve-results></retrieve-results>
			</div>
		</div>
	</div>
@stop