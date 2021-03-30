<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
    @foreach($sliders as $slider) 
      @if($slider->slider_status==1)
    <div class="slider-item" style="background-image: url(storage/slider_image/{{$slider->slider_image}});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-12 ftco-animate text-center">
            <h1 class="mb-2">{{$slider->describtion_one}} </h1>
            <h2 class="subheading mb-4">{{$slider->describtion_two}} </h2>
            <p><a href="#" class="btn btn-primary">View Details</a></p>
          </div>

        </div>
      </div>
    </div>
    @endif
    @endforeach 
  </div>
</section>
