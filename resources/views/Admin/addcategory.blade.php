@extends('layout.adminapp')
@section('content')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add category</h4>
          @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{session('status')}}</strong> 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
            </div>
          @endif

        @if(session('status1'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
            {!!Form::open(['action'=>'CategoryController@SaveCategory', 'class'=>'cmxform', 'method'=>'POST', 'id'=>'commentForm'])!!}
                {{csrf_field()}}
              <div class="form-group">
                {{Form::label('','Product category', ['for'=>'cname'])}}
                {{Form::text('category_name','', ['class'=>'form-control', 'minlenght'=>'2'])}} 
              </div>
              {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
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
