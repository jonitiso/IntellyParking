@if(Session::has('info'))

<div class="alert alert-info">
	<button class="close" type="button" data-dismiss="alert">
		&times;
	</button>

	{{ Session::get('info') }}


</div>

@endif