@extends('layout')

@section('content')
    <h1>Posts</h1>
        @if (count($posts)>0)
		@foreach ($posts as $I)
		<div class="well">
			<div class="row">
				<div class="col-md-4 col-sm-4">
                 <img src="/storage/cover_images/{{$I->cover_image}}" alt="" style="width:100%" srcset="">
				</div>
				<div class="col-md-8 col-sm-8">
				 <h3><a href="{!!route('index.show',[$I->id])!!}">{{$I->title}}</a></h3>
					<small>written at {{$I->created_at}} by {{$I->user->name}}</small>
				</div>
			</div>
		</div>
        @endforeach
        @else
        <p>post not founf</p>
        @endif

@endsection
