@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="row">
        <div class="col-md-8">
            <a href="{{ route('categories.create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Add Category</a> 
        </div>
         <table class="table">
  <thead class="thead-dark">
    <tr class="row">
      <th class="col-sm-2">ID</th>
      <th class="col-sm-7">Category Name</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($categories as $category)
    <tr class="row">
      <td class="col-sm-2">{{ $category->id }}</td>
      <td class="col-sm-7">{{ $category->name }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

        </div>
    </div>
</div>
@endsection
