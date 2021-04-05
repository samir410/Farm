<section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 ftco-animate">
            {!!Form::open(['action'=>'ClientController@postcheckout', 'method'=>'POST', 'class'=>'billing-form', 'id' =>'checkout-form'])!!}
              {{csrf_field()}}
              <h3 class="mb-4 billing-heading">Billing Details</h3>
              @if(session('error'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('error')}}</strong> 
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
              </div>
            @endif
                <div class="row align-items-end">
                    <div class="col-md-6">
                  <div class="form-group">
                      <label for="firstname">Firt Name</label>
                    <input type="text" class="form-control" id="card-number" placeholder="">
                  </div>
                </div>
                <div class="w-100"></div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="streetaddress"> Address</label>
                        <input type="text" class="form-control" id="card-number" placeholder="House number and street name">
                      </div>
                  </div>
                  <div class="w-100"></div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="postcodezip">Name on card</label>
                          <input type="text" class="form-control" id="card-name" placeholder="">
                       </div>
                  </div>
             
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="number">Number</label>
                      <input type="text" class="form-control" id="card-number" placeholder="">
                  </div>
                </div>

                <div class="w-100"></div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="Expiaration_month">Expiaration month</label>
                      <input type="text" class="form-control" id="card-expiry-month" placeholder="">
                  </div>
                </div>

                {{-- <div class="w-100"></div> --}}
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="Expiaration_year">Expiaration year</label>
                      <input type="text" class="form-control" id="card-expiry-year" placeholder="">
                  </div>
                </div>

                <div class="w-100"></div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="CVC">CVC</label>
                      <input type="text" class="form-control" id="card-cvc">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Buy now">
                  </div>
                </div>
            
           </div>
            {!!Form::close()!!} <!-- END -->
                  </div>
                  <div class="col-xl-5">
            <div class="row mt-5 pt-3">
                <div class="col-md-12 d-flex mb-5">
                    <div class="cart-detail cart-total p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Cart Total</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>$20.60</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$5.00</span>
                        </p>
                        <p class="d-flex">
                             <span>Discount</span>
                             <span>$3.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                             <span>Total</span>
                             <span>${{Session::get('cart')->totalPrice+5.00}}</span>
                        </p>
                      </div>
                </div>
                <div class="col-md-12">
                    <div class="cart-detail p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Payment Method</h3>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="checkbox">
                                             <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                                          </div>
                                      </div>
                                  </div>
                                  <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
                       </div>
                </div>
            </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section> <!-- .section -->