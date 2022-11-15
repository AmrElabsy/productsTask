@extends("layouts.layout")

@section("content")
	<div class="d-flex justify-content-between">
		<h2>{{ __("app.products") }}</h2>
		<a class="btn btn-lg btn-success" href="{{ route("product.create") }}">{{ __("app.add") }}</a>
	</div>
	<form class="mt-4" action="{{ route("product.index") }}" method="get">
		@csrf
		<div class="row">
			<div class="col-md-2">
				<label for="name" class="form-label">{{ __("app.name") }}</label>
			</div>
			<div class="col-md-3">
				<input type="text" class="form-control" id="name" name="name" value="{{ old("name") }}">

			</div>
			<div class="col-md-2">
				<label for="category" class="form-label">{{ __("app.name") }}</label>

			</div>
			<div class="col-md-3">
				<select name="category" id="category" class="form-control" >
					<option disabled selected>{{ __("app.choose_category") }}</option>
				@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-2">
				<input type="submit" value="submit" class="form-control">
			</div>
		</div>
	</form>

	<table class="table table-striped">
		<thead>
		<tr>
			<th>#</th>
			<th>{{ __("app.image") }}</th>
			<th>{{ __("app.name") }}</th>
			<th>{{ __("app.category") }}</th>
			<th>{{ __("app.description") }}</th>
			<th>{{ __("app.manage") }}</th>
		</tr>
		</thead>
		<tbody>
		@foreach($products as $product)
			<tr>
				<td>{{ $product->id }}</td>
				<td><img width="100" src="{{ asset( "storage/" . $product->image ) }}" alt=""></td>
				<td>{{ $product->name }}</td>
				<td>{{ $product->category->name }}</td>
				<td>{{ $product->description }}</td>
				<td>
					<a class="btn btn-success" href="{{ route("product.edit", $product->id) }}">{{ __("app.edit") }}</a>
					<form class="d-inline" action="{{ route("product.destroy", $product->id) }}" method="post">
						@csrf
						@method("delete")
						<input type="submit" class="btn btn-danger" value="{{ __("app.delete") }}">

					</form>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

@endsection