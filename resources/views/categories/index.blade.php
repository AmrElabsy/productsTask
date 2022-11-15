@extends("layouts.layout")

@section("content")
			<div class="d-flex justify-content-between">
				<h2>{{ __("app.categories") }}</h2>
				<a class="btn btn-lg btn-success" href="{{ route("category.create") }}">{{ __("app.add") }}</a>
			</div>

			<table class="table table-striped">
				<thead>
				<tr>
					<th>#</th>
					<th>{{ __("app.name") }}</th>
					<th>{{ __("app.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
						<td>
							<a class="btn btn-success" href="{{ route("category.edit", $category->id) }}">{{ __("app.edit") }}</a>
							<form class="d-inline" action="{{ route("category.destroy", $category->id) }}" method="post">
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