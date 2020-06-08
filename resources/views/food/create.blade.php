@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<h3>Add New Food</h3>
          @include('errors')
     	<form action="{{ route('foods.store') }}" method="post">
     		@csrf
  <div class="form-group">
    <label >Name</label>
    <input type="text" class="form-control"  placeholder="Enter Food Name" name="name" value="{{old('name')}}">
  </div>
    <div class="form-group">
    <label >Description</label>
    <textarea class="form-control" name="description" rows="3" placeholder="Enter Description">{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
    <label >Price</label>
    <input type="text" class="form-control"   placeholder="Enter Price" name="price" value="{{old('price')}}">
  </div>
    <div class="form-group">
    <label >Category</label>
    echo {{old('category_id')}}
    <select id="inputState" class="form-control" name="category_id">
        <option value ="0" <?php if(old('category_id') == "") {echo "selected";} ?>>Select Category</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" <?php if(old('category_id') == $category->id) {echo "selected";} ?>>{{ $category->name }}</option>
        @endforeach
      </select>  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
</div>
@endsection
