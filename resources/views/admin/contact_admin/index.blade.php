@extends('layouts.app')
@section('title','Contacts')
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
                            <h4 class="card-title ">All Contacts</h4>

                        </div>



                        @include('layouts.partials.message')

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dt" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($messages as $key=>$message)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->subject}}</td>
                                            <td>{{$message->message}}</td>
                                            <td>
                                                <a href="{{route('contact_admin.show',$message->id)}}"
                                                   class="btn btn-primary"><i class="material-icons">details</i></a>

                                                <form action="{{route('contact_admin.destroy',$message->id)}}"
                                                      method="post" id="delete_date">
                                                    {{csrf_field()}}
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure to Delete??!!')"><i class="material-icons">delete</i></button>
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


