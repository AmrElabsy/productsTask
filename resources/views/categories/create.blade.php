@extends("layouts.layout")

@section("content")
<h2>{{ __("app.create_category") }}</h2>

<form method="post" action="{{ route("category.store") }}">
	@csrf
	<div class="mb-3">
		<label for="name" class="form-label">{{ __("app.name") }}</label>
		<input type="text" class="form-control" id="name" name="name" value="{{ old("name") }}">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection