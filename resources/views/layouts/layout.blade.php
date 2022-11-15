<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	{{--	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">--}}
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="/">Perfect Work Group</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="{{ route("category.index") }}">Categories</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route("product.index") }}">Products</a>
				</li>

			</ul>

			<div class="d-flex">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						@if(\Illuminate\Support\Facades\Auth::user())
							<a class="nav-link" href="{{ route('logout') }}"
							   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						@else
							<a class="nav-link" href="{{ route("login") }}">Login</a>
						@endif
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
<div class="m-4">
	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-body">
					@yield("content")
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-filestyle/2.1.0/bootstrap-filestyle.min.js" integrity="sha512-HfRdzrvve5p31VKjxBhIaDhBqreRXt4SX3i3Iv7bhuoeJY47gJtFTRWKUpjk8RUkLtKZUhf87ONcKONAROhvIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>