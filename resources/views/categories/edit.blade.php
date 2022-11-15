@extends("layouts.layout")

@section("content")
	<h2>{{ __("app.edit_category") }}</h2>

	<form method="post" action="{{ route("category.update", $category->id) }}">
		@csrf
		@method("put")
		<div class="mb-3">
			<label for="name" class="form-label">{{ __("app.name") }}</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ old("name", $category->name) }}">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

@endsection