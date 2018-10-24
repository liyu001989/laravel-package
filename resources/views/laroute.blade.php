<!DOCTYPE html>
<html>
<head>
	<title>laroute</title>
</head>
<body>

	<script type="text/javascript" src="{{ asset('/js/laroute.js') }}"></script>
	<script type="text/javascript">
		
		console.log(laroute.action('UserController@show', {user: 1}));
		console.log(laroute.route('users.show', {user: 1}));
		console.log(laroute.url('laroute', []));

		console.log(laroute.link_to_route('users.show', 'User link', {user: 1}));
		console.log(laroute.link_to_action('UserController@show', 'User link', {user: 1}));

		console.log(laroute.route('laroute'));

	</script>

</body>
</html>