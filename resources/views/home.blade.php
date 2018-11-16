@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>


                <div class="panel-body">
				<a class="btn btn-primary" href="{{route('index.create')}}">Add</a></li>
				<h3> Your blog posts</h3>
				<table class="table table-striped">
				  <thead>
					<tr>
							<th>Titel</th>
							<th>EDIT</th>
							<th>DELETE</th>
							<th>SHOW</th>
					</tr>
				</thead>
				<tbody>
						@foreach ($post as $I)
                          <tr>
							<td>{{$I->title}}</td>
							<td><a href="{!!route('index.edit', [$I->id]) !!}" class="glyphicon glyphicon-edit"></a></td>
                            <td><form method="POST" action="{{ route('index.destroy', [$I->id]) }}">
								@csrf
							   {{ method_field('DELETE') }}
							<button <span class="icon is-small"><i class="glyphicon glyphicon-trash"></i></span></button>
						   </form>
						 </td>
						 <td><a href="{!!route('index.show',[$I->id])!!}" class="glyphicon glyphicon-eye-open"></a></td>
                        </tr>

						@endforeach
					</tbody>
				</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
