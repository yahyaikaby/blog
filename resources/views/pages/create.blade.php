@extends('layout')

@section('content')


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add post</div>
                <form method="POST" action="{{ route('index.store') }}" enctype="multipart/form-data">
                     @csrf
					@include('pages.fields')
				<div class= "form_group">
					<span class="btn button-blue"><input type="file" name="cover_image" id="" ></span>
					<button class="btn btn-success">{{ __('store') }}</button>
				</div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
