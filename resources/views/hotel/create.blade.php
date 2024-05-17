@extends('layouts.app')

@section("content")
    <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Hotel Info </h3>
        @if (session()->has("success"))
            <p class="font-weight-bold text-success">{{session("success")}}</p>
        @endif
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('hotels')}}">Hotels</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Hotel</li>
          </ol>
        </nav>
      </div>
      <form  action="{{route('hotel.store')}}" class="forms-sample" name="hotel_form" method = "post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <div class="form-group">
                    <label for="hotel_name">Hotel Name</label>
                    <input type="text" name="hotel_name" class="form-control" id="hotel_name" placeholder="hotel name">
                  </div>
                  <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control" name="country_id" id="country">
                        <option>Select</option>
                        @foreach ($countries as $country)
                        <option value = {{$country->id}}>{{$country->name}}</option>
                        @endforeach

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="city">City</label>
                    <select class="form-control" name="city_id" id="city">
                        <option>Select</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="hotel_description">Description</label>
                    <textarea class="form-control" id="hotel_description" name="hotel_description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="hotel_address">Address</label>
                    <textarea class="form-control" id="hotel_address" name="hotel_address"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="postal code">
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" name="email" id="email" placeholder="email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="contact_no" class="col-sm-3 col-form-label">Contact Number</label>
                    <div class="col-sm-9">
                      <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="Contact number">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="rating" class="col-sm-3 col-form-label">Rating</label>
                    <div class="col-sm-9">
                      <input type="text" name="rating" class="form-control" id="rating" placeholder="Rating">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="check_in" class="col-sm-3 col-form-label">Check In</label>
                    <div class="col-sm-9">
                      <input type="text" name="check_in" class="form-control" id="check_in" placeholder="Check In">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="check_out" class="col-sm-3 col-form-label">Check Out</label>
                    <div class="col-sm-9">
                      <input type="text" name="check_out" class="form-control" id="check_out" placeholder="Check Out">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hotel_image" class="col-sm-3 col-form-label">Hotel Image</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control" name="hotel_image" id="hotel_image">
                    </div>
                    @error('hotel_image')
                            <div class="alert text-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
              </div>
            </div>
          </div>
      </div>
      </form>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @include('layouts.footer')
    <script src="{{ asset('js/hotel.js') }}"></script>
      <!-- partial -->
  </div>
  @endsection("content")
