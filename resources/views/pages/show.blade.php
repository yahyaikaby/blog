@extends('layout')

@section('content')

        <a href="/index" class="btn btn-default ">Go Back</a>
		<h3>{{$post->title}}</h3>
		<img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width:50%" srcset="">
		<br><br>
        <div>
         {!!$post->body!!}
        </div>
        <hr>
		<small>written at {{$post->created_at}} by {{$post->user->name}}</small>
		<hr>
        @if (!Auth::guest())
         @if (Auth::user()->id==$post->user_id)



		<div class="container">
		 <div class="row">
			<div class="col col-lg-2 ">
				<a href="{!!route('index.edit', [$post->id]) !!}" >
					<span class="btn btn-default"> Edit</span>
			    </a>
			</div>
			<div class="col-md-auto">
			<form method="POST" action="{{ route('index.destroy', [$post->id]) }}">
				@csrf
				{{ method_field('DELETE') }}
				<button
					<span class="btn btn-danger"> DELETE</span>
				</button>
			</form>
			</div>
		</div>
		</div>
		@endif
		@endif

@endsection
