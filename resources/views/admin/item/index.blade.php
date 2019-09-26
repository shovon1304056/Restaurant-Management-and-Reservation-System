@extends('layouts.app')
@section('title','Item')
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
                            <h4 class="card-title ">All Items</h4>

                        </div>
                        <div class="col-md-3">
                            <a href="{{route('item.create')}}" class="btn btn-info">Add New Item</a>
                        </div>


                        @include('layouts.partials.message')

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dt" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $key=>$item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->category->name}}</td>
                                            <td style="width: 10%">{{$item->description}}</td>
                                            <td>
                                                <img src="{{asset('uploads/items/'.$item->image)}}" class="img-responsive img-thumbnail"
                                                style="height:100px; width: 100px" >

                                            </td>
                                            <td>{{$item->price}}</td>
                                            <td>
                                                <a href="{{route('item.edit',$item->id)}}"
                                                   class="btn btn-primary"><i class="material-icons">edit</i></a>

                                                <form action="{{route('item.destroy',$item->id)}}"
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


