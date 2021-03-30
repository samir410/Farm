@extends('layout.adminapp')
@section('content')
@section('title')
Edit slider
@endsection
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit slider</h4>
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
          {{-- <form class="cmxform" id="commentForm" method="get" action="#"> --}}
            {!!Form::open(['action'=>'ProductController@updateslider', 'class'=>'cmxform', 'id'=>'commentForm', 'method'=>'post', 'enctype'=>'multipart/form-data'])!!}
     
                {{csrf_field()}}
              <div class="form-group">
                {{Form::hidden('id',$slider->id, ['for'=>'cname'])}}
               {{Form::label('','Describtion one', ['for'=>'cname'])}}
               {{Form::text('describtion_one',$slider->describtion_one, ['class'=>'form-control', 'minlength'=>'2'])}}
              </div>
              <div class="form-group">
              {{Form::label('','Describtion two', ['for'=>'cname'])}}
              {{Form::text('describtion_two',$slider->describtion_one, ['class'=>'form-control','minlength'=>'2'])}}
             </div>             
              <div class="form-group" >
                {{Form::label('','Upload slider image')}}
                {{Form::file('slider_image',['class'=>'form-control'])}}
            
              </div>
             
                {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
            {!!Form::close()!!}
              {{-- <input class="btn btn-primary" type="submit" value="Submit"> --}}
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')

<script src="{{asset('Admin/js/bt-maxLength.js')}}"></script>
@endsection

