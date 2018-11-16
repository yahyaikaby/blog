
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
				<!-- Left Side Of Navbar -->
				<div class="collapse navbar-collapse">
						<ul class="navbar-nav  ml-auto">
								<li class="nav-item"> <a class="nav-link" href="\index">Home</a></li>
								<li class="nav-item"><a class="nav-item nav-link" href="about">Features</a></li>
							   <li class="nav-item"> <a class="nav-item nav-link" href="services">Pricing</a></li>

						</ul>
				</div>

				<!-- Right Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
					<!-- Authentication Links -->
					@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						<li class="nav-item">
							@if (Route::has('register'))
								<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
							@endif
						</li>
					@else

						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}"
								   onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>
								<a class="dropdown-item" href="/">Dashboard</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					@endguest
				</ul>

	</nav>


