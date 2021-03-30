@extends('layout.adminapp')
@section('content')
@section('title')
Edit product
@endsection
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Update product</h4>
          {{-- <form class="cmxform" id="commentForm" method="get" action="#"> --}}
            @if(session('status1'))
             <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>{{session('status1')}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                 @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                 @endforeach
              </ul>
             </div>
            @endif
            {!!Form::open(['action'=>'ProductController@UpdateProduct', 'class'=>'cmxform', 'id'=>'commentForm', 'method'=>'post', 'enctype'=>'multipart/form-data'])!!}
     
                {{csrf_field()}}
              <div class="form-group">
                 {{-- <label for="cname">Name (required, at least 2 characters)</label>
                <input id="cname" class="form-control" name="category_name" minlength="2" type="text" required> --}}
               {{Form::hidden('id',$product->id, ['for'=>'cname'])}}
               {{Form::label('','Product name', ['for'=>'cname'])}}
               {{Form::text('product_name',$product->product_name, ['class'=>'form-control','minlength'=>'2'])}}
              </div>

              <div class="form-group" >
               {{Form::label('','Product price', ['for'=>'cname'])}}
               {{Form::number('product_price',$product->product_price, ['class'=>'form-control'])}}
              </div>

              <div class="form-group">
               {{Form::label('','Product category')}}
              
               {{Form::select('product_category', $categories, $product->product_category, ['class'=>'form-control' ])}}
             </div>

             
              <div class="form-group" >
                {{Form::label('','Upload image')}}
                {{Form::file('product_image',['class'=>'form-control'])}}
            
              </div>
           
                {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
             {!!Form::close()!!}
              {{-- <input class="btn btn-primary" type="submit" value="Submit"> --}}
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
{{-- <script src="{{asset('Admin/js/form-validation.js')}}"></script> --}}
<script src="{{asset('Admin/js/bt-maxLength.js')}}"></script>
@endsection

