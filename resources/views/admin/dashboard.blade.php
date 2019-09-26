    @extends('layouts.app')

    @section('title',"Dashboard")

@push('css')


@endpush


@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Category/Item</p>
                  <h3 class="card-title">{{$categories}}/{{$items}}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-info">info</i>
                    <a href="#">Total Categories and Items</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Slider</p>
                  <h3 class="card-title">{{$sliders}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-info">info</i>
                      <a href="{{route('slider.index')}}"> Get Details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons ">info</i>
                  </div>
                  <p class="card-category">Reservations</p>
                    </br>
                  <p class="card-category">Confirmed/Not Confirmed</p>
                  <h3 class="card-title">{{$reserve_confirmed->count()}}/{{$reserve_not_confirmed->count()}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                      <i class="material-icons text-info">info</i>
                      <a href="{{route('reservation_admin.index')}}"> Get Details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Contacts</p>
                  <h3 class="card-title">{{$contacts}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                      <i class="material-icons text-info">info</i>
                      <a href="{{route('contact_admin.index')}}"> Get Details</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>


      @endsection

      @push('scripts')


      @endpush
