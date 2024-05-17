@extends('layouts.app')

@section("content")
    <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Country Info </h3>
        @if (session()->has("success"))
            <p class="font-weight-bold text-success">{{session("success")}}</p>
        @endif
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('countries')}}">Countries</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Country</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <form class="form-sample" name="country_info" method="post" action="{{ route('country.store') }}">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" >Country Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Country Name" name="name" value="{{ old('name')}}"/>
                      </div>
                      @error('name')
                        <div class="alert text-danger" role="alert">
                            {{ $message }}
                        </div>
                     @enderror
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" >Country Code</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" placeholder="Country Code" name="country_code" value="{{ old('country_code')}}"/>
                        </div>
                        @error('country_code')
                          <div class="alert text-danger" role="alert">
                              {{ $message }}
                          </div>
                       @enderror
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" >Description</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" placeholder="Description" name="country_desciption" value="{{ old('description')}}"></textarea>
                        </div>
                        @error('description')
                          <div class="alert text-danger" role="alert">
                              {{ $message }}
                          </div>
                       @enderror
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
