@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<div class="card-header">Add post</div>

                <form method="POST" action="{!!route('index.update', [$post->id]) !!}" enctype="multipart/form-data">
					 @csrf
					 {{method_field('PATCH')}}
					 @include('pages.fieldsEdit')
					 <div class= "form_group">
							<span class="btn button-blue"><input type="file" name="cover_image" id="" ></span>
							<button>{{ __('update') }}</button>
					</div>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
