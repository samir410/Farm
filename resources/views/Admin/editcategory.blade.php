@extends('layout.adminapp')
@section('content')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit category</h4>
          @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{session('status')}}</strong> 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
            </div>
          @endif
          

     
            {!!Form::open(['action'=>'CategoryController@UpdateCategory', 'class'=>'cmxform', 'method'=>'POST', 'id'=>'commentForm'])!!}
                {{csrf_field()}}
              <div class="form-group">
                {{Form::hidden('id',$category->id, ['for'=>'cname'])}}
                {{Form::label('','Product category', ['for'=>'cname'])}}
                {{Form::text('category_name',$category->category_name, ['class'=>'form-control', 'minlenght'=>'2'])}} 
              </div>
              {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
            {!!Form::close()!!} 
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
{{-- <script src="Admin/js/form-validation.js"></script> --}}
<script src="{{asset('Admin/js/bt-maxLength.js')}}"></script>
@endsection
