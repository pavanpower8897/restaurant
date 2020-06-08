@extends('layouts.app')

@section('content')
<div class="container">
    <div align="center">
    	<div class="row">
        <div class="col-md-4">
            <a href="{{ route('foods.create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Add Food Item</a> 
        </div>
      </div>
    </div>
    <div class="row">
         <table class="table" id="pavan">
  <thead class="thead-dark">
    <tr class="row">
      <th class="col-sm-1">ID</th>
      <th class="col-sm-2">Name</th>
      <th class="col-sm-2">Description</th>
      <th class="col-sm-2">Price</th>
      <th class="col-sm-2">Category</th>
      <th class="col-sm-1">Edit</th>
      <th class="col-sm-1">Delete</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($foods as $food)
    <tr class="row">
      <td class="col-sm-1">{{ $food->id }}</td>
      <td class="col-sm-2">{{ $food->name }}</td>
      <td class="col-sm-2">{{ $food->description}}</td>
      <td class="col-sm-2">{{ $food->price }}$</td>
      <td class="col-sm-2">{{  $food->category_name }}</td>
      <td class="col-sm-1">
        <a href="{{ route('foods.edit', $food->id) }}" class="btn btn-info">Edit</a>
      </td>
      <td class="col-sm-1">
      <a href="{{ route('foods.destroy', $food->id) }}" class="btn btn-danger delet" data-id="{{ $food->id }}">Delete</a>
      </td>    
    </tr>
    @endforeach
  </tbody>
</table>
      {{ $foods->links() }}
    </div>
  </div>
@endsection
