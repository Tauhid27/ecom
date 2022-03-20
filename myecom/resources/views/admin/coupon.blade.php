@extends('admin/layout')
@section('page_title','Coupon')
@section('container')
    {{ session('message') }}
    <h1>Coupon</h1>
    <a href="{{url('admin/coupon/manage_coupon')}}">
        <button type="button" class="btn btn-success m-t-20">Add Coupon</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->title }}</td>
                                <td>{{ $list->code }}</td>
                                <td>{{ $list->value}}</td>
                                <td>
                                    <a href="{{ url('admin/coupon/delete/') }}/{{ $list->id }}">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                    <a href="{{ url('admin/coupon/manage_coupon') }}/{{ $list->id }}">
                                        <button type="button" class="btn btn-success">Edit</button>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
