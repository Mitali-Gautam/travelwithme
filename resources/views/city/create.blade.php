@extends('layouts.app')

@section("content")
    <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> City Info </h3>
        @if (session()->has("success"))
            <p class="font-weight-bold text-success">{{session("success")}}</p>
        @endif
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('cities')}}">Cities</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add City</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <form class="form-sample" name="city_info" method="post" action="{{ route('city.store') }}">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                        <label for="country_id" class="col-sm-3 col-form-label">Country</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="country_id" id="country_id">
                                <option>Select</option>
                                @foreach ($countries as $country)
                                <option value={{$country->id}}>{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" >City Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="City Name" name="name" value="{{ old('name')}}"/>
                        </div>
                        @error('name')
                            <div class="alert text-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="city_desciption" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="city_desciption" id="city_desciption" rows="4"></textarea>
                        </div>
                      </div>
                  </div>
                </div>
                <input type="submit" class="btn btn-primary mr-2" name="submit" value="Submit">
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @include('layouts.footer')
      <!-- partial -->
  </div>
  @endsection("content")
