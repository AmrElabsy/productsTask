@extends("layouts.layout")

@section("content")
<form method="post" action="{{ route("product.store") }}" enctype="multipart/form-data">
	@csrf
	<div class="mb-3">
		<label for="name" class="form-label">{{ __("app.name") }}</label>
		<input type="text" class="form-control" id="name" name="name" value="{{ old("name") }}">
	</div>
	<div class="mb-3">
		<label for="description" class="form-label">{{ __("app.description") }}</label>
		<textarea class="form-control" id="description" name="description">{{ old("description") }}</textarea>
	</div>
	<div class="mb-3">
		<label for="category" class="form-label">{{ __("app.category") }}</label>
		<select name="category" id="category" class="form-control" >
			@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="mb-3">
		<label for="image" class="form-label">{{ __("app.image") }}</label>
		<input type="file" class="form-control" id="image" name="image">
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection