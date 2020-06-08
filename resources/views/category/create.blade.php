@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<h3>Add New Category</h3>
           @include('errors')

     	<form action="{{ route('categories.store') }}" method="post">
     		@csrf
  <div class="form-group">
    <label >Category name</label>
    <input type="text" class="form-control" id="category_name"  placeholder="Enter Category Name" name="name" value="{{old('name')}}">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
</div>
@endsection
