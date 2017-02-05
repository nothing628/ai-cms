<script type="text/javascript">
	window.Laravel = {
		csrfToken: '{{ csrf_token() }}',
		apiToken: 'Bearer {{ Auth::check()?Auth::user()->api_token:'' }}'
	}
</script>
