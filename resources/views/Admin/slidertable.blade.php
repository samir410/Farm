@extends('layout.adminapp')
@section('title')
View slider
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
      <h4 class="card-title">Slider</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Order #</th>
                    <th>Describtion one</th>
                    <th>Describtion two</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sliders as $slider)
                  
              
                <tr>
                    <td>{{$increment}}</td>
                    <td>{{$slider->describtion_one}}</td>
                    <td>{{$slider->describtion_two}}</td>
                    <td>
                      <img src="{{asset('storage/slider_image')}}/{{$slider->slider_image}}" alt="">
                    </td>
                    @if ($slider->slider_status==1)
                    <td>
                      <label class="badge badge-success">Activate</label>
                    </td>
                    @else
                    <td>
                      <label class="badge badge-danger">Unactivate</label>
                    </td>   
                    @endif
                      <td>
                        <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit_slider/'.$slider->id)}}'">Edit</button>
                        <button class="btn btn-outline-danger"id="delete" href="/delete_slider/{{$slider->id}}">Delete</button>
                        @if ($slider->slider_status==1)
                     
                          <button class="badge badge-danger" onclick="window.location='{{url('/unactivate_slider/'.$slider->id)}}'">Unctivate</button>
                        
                        @else
                       
                          <button class="badge badge-success" onclick="window.location='{{url('/activate_slider/'.$slider->id)}}'">Activate</button>
                          
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