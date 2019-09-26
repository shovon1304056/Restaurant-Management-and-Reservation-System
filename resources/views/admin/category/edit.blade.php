@extends('layouts.app')
@section('title',"Category")
@push('css')

@endpush
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partials.message')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit Category</h4>


                        </div>
                        <div class="col-md-3">
                            <a href="{{route('category.index')}}" class="btn btn-danger">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <form method="POST" action="{{route('category.update',$id)}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">


                                            <div class="form-group label-floating">
                                                <label class="control-label">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{$category->name}}">
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Save</button>
                                </form>
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
