@extends('layouts.app')

@section("content")
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Country List </h3>
        @if (session()->has("success"))
            <p class="font-weight-bold text-success">{{session("success")}}</p>
        @endif
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li><a href="" class="btn btn-primary btn-icon-text"> Add City <i class="icon-plus"></i></a></li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered table-hover table-striped table-responsive">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> City Name </th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <td> {{$city->id}} </td>
                            <td> {{$city->name}} </td>
                            <td><a href="" class="btn btn-dark btn-icon-text btn-sm"> Edit <i class="icon-doc btn-icon-append icon-sm"></i></a></td>
                            <td><a href="" class="btn btn-danger btn-icon-text btn-sm"> Delete <i class="icon-trash icon-sm"></i></a></td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    @include('layouts.footer')
  </div>

@endsection("content")
