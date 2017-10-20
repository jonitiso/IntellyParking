<script>
$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".alert").alert('close');
    }, 2000);
});
</script>



@if(Session::has('info'))

<div class="alert alert-info">
	<button class="close" type="button" data-dismiss="alert">
		&times;
	</button>

	{{ Session::get('info') }}


</div>

@endif



@if(Session::has('warning'))

<div class="alert alert-warning">
	<button class="close" type="button" data-dismiss="alert">
		&times;
	</button>

	{{ Session::get('warning') }}


</div>

@endif

@if(Session::has('success'))

<div class="alert alert-success">
	<button class="close" type="button" data-dismiss="alert">
		&times;
	</button>

	{{ Session::get('success') }}


</div>

@endif