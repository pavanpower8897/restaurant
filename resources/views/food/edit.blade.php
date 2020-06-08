@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<h3>Edit Food</h3>
          
          @include('errors')

     	<form action="{{ route('foods.update', $food->id) }}" method="post">
     		@csrf
        @method('PUT')
  <div class="form-group">
    <label >Name</label>
     {{old('name')}}
    <input type="text" class="form-control" value= "<?php if(old('name') =='') {echo "$food->name"; } else { echo old('name');} ?>"  placeholder="Enter Food Name" name="name">
  </div>
    <div class="form-group">
    <label >Description</label>
    {{old('description')}}
    <textarea class="form-control" name="description"  rows="3" >
      @if(old('description') == '')
      {{ $food->description }}
      @else
        {{ old('description')}}
      @endif   
       </textarea>
    </div>
    <div class="form-group">
    <label >Price</label>
    <input type="text" class="form-control"   value= "<?php if(old('price') =='') {echo "$food->price"; } else { echo old('price');} ?>"  placeholder="Enter Price" name="price">
  </div>
    <div class="form-group">
    <label >Category</label>
    <select id="inputState" class="form-control" name="category_id">
        <option value="0">Select Category</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" 
          <?php 
          if( old('category_id') != '' ){
           if( $category->id  == old('category_id')) {echo "selected" ;}
         } else
          { if($category->id == $food->category_id ) {echo "selected"; }
        }
         ?>  >
      {{ $category->name }}</option>
        @endforeach
      </select>  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
</div>
@endsection
