<form method="post" action="{{ route("submit") }}">
	@csrf
	<input name="name" type="text">
	<input name="email" type="email">
	<input name="phone" type="text">

	<input type="submit">
</form>