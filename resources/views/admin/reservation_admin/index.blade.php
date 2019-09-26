@extends('layouts.app')
@section('title','Reservation')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Reservations</h4>

                        </div>
                        <div class="col-md-3">
                            <a href="{{route('reservation_admin.create')}}" class="btn btn-info">Add</a>
                        </div>


                        @include('layouts.partials.message')

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dt" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Date and Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($reservation_admin as $key=>$r_a)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$r_a->name}}</td>
                                            <td>{{$r_a->phone}}</td>
                                            <td>{{$r_a->email}}</td>
                                            <td>{{$r_a->message}}</td>
                                            <td>{{$r_a->date_time}}</td>
                                            <td>
                                            @if($r_a->status==true)
                                                <span class="badge badge-success">Confirmed</span>
                                                @elseif($r_a->status==false)
                                                <span class="badge badge-warning">Not Confirmed</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($r_a->status==false)
                                                    <form action="{{route('reservation_admin.status',$r_a->id)}}"
                                                          method="post" id="change_status">
                                                        {{csrf_field()}}
                                                        <button type="submit" class="btn btn-info"
                                                                onclick="return confirm('Are You Sure to Verify this with phone????!!')"><i
                                                                class="material-icons">check</i></button>
                                                    </form>
                                                    @endif

                                                <form action="{{route('reservation_admin.destroy',$r_a->id)}}"
                                                      method="post" id="delete_date">
                                                    {{csrf_field()}}
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are You Sure to Delete??!!')"><i
                                                            class="material-icons">delete</i></button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#dt').DataTable();
        });
    </script>
@endpush


