@extends('layout.adminapp')
@section('title')
View product
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
      <h4 class="card-title">Product table</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Order #</th>
                    <th>Product image</th>
                    <th>Product name</th>
                    <th>Product price</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr>
                  <td>{{$increment}}</td>
                  <td>
                    <img src="{{asset('storage/product_images')}}/{{$product->product_image}}" alt="">
                  </td>
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->product_price}}</td>
                  <td>{{$product->product_category}}</td>
                  @if ($product->status==1)
                  <td>
                    <label class="badge badge-success">Activate</label>
                  </td>
                  @else
                  <td>
                    <label class="badge badge-danger">Unactivate</label>
                  </td>   
                  @endif
                    <td>
                      <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit_product/'.$product->id)}}'">Edit</button>
                      <button class="btn btn-outline-danger"id="delete" href="/delete_product/{{$product->id}}">Delete</button>
                      @if ($product->status==1)
                   
                        <button class="badge badge-danger" onclick="window.location='{{url('/unactivate_product/'.$product->id)}}'">Unctivate</button>
                      
                      @else
                     
                        <button class="badge badge-success" onclick="window.location='{{url('/activate_product/'.$product->id)}}'">Activate</button>
                        
                      @endif
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