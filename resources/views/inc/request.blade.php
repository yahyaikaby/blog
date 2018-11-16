
@if (count($errors)>0)
@foreach ($errors->all() as $error)
   <div class="alert alert-danger">
     {{$error}}
   </div>
   @endforeach
@endif

@if (session('success'))
<div class="alert alert-success">
{{session('success')}}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
{{session('error')}}
</div>
@endif

<!-- will be used to show any messages-->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

