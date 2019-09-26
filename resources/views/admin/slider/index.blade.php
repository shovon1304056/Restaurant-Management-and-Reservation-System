@extends('layouts.app')
@section('title',"Slider")
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
                            <h4 class="card-title ">All Slider</h4>

                        </div>
                        <div class="col-md-3">
                            <a href="{{route('slider.create')}}" class="btn btn-info">Add New Slider</a>
                        </div>


                        @include('layouts.partials.message')

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dt" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>
                                        SL
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Sub Title
                                    </th>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        Created At
                                    </th>
                                    <th>
                                        Updated At
                                    </th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key=>$slider)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$slider->title}}</td>
                                            <td>{{$slider->sub_title}}</td>
                                            <td>{{$slider->image}}</td>
                                            <td>{{$slider->created_at}}</td>
                                            <td>{{$slider->updated_at}}</td>
                                            <td>
                                                <a href="{{route('slider.edit',$slider->id)}}"
                                                   class="btn btn-primary"><i class="material-icons">edit</i></a>

                                                <form action="{{route('slider.destroy',$slider->id)}}"
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
    </div>
@endsection
@push('scripts')


    <script>
        $(document).ready(function () {
            $('#dt').DataTable();
        });
    </script>
@endpush
