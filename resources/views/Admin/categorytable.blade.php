@extends('layout.adminapp')
@section('title')
View category
@endsection
@section('content')
{{Form::hidden('', $increment=1)}}
<div class="card">
    <div class="card-body">

      @if(session('status'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{session('status')}}</strong> 
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
        </div>
      @endif

      <h4 class="card-title">Category</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
             
              <thead>
                <tr>
                    <th>Order #</th>
                    <th>Category name</th> 
                    <th>Action</th> 
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$increment}}</td>
                    <td>{{$category->category_name}}</td>
                 
                    <td>
                      <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit_category/'.$category->id)}}'">Edit</button>
                      <button class="btn btn-outline-danger" id="delete" href="/delete_category/{{$category->id}}">Delete</button>
                      <button class="btn btn-outline-primary">View</button>
                    </td>
                </tr>
                {{Form::hidden('', $increment=$increment+1)}}
                @endforeach
             </tbody>
            
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('scripts')
<script src="{{asset('Admin/js/data-table.js')}}"></script>
@endsection