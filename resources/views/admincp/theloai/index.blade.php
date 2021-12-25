@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê thể loại</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Tên thể loại</th>
                            <!-- <th scope="col">Slug danh mục</th> -->
                            <th scope="col">Mô tả</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($theloai as  $key => $theloaine)
                            <tr>
                            <th scope="row">{{$key}}</th>
                            <td >{{$theloaine->tentheloai}}</td>
                           
                            <td>{{$theloaine->mota}}</td>
                            <td>
                                @if($theloaine->kichhoat ==0)
                                    <span class="text text-success"> Kích hoạt</span>
                                @else
                                    <span class="text text-danger"> Không kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('theloai.edit',[$theloaine->id])}}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                
                                <form method="POST" action="{{route('theloai.destroy',[$theloaine->id])}}"> 
                                    @method('delete')
                                    @csrf
                                    <button onclick=" return confirm('bạn có chắc chắn muốn xóa ?') ;" class="btn btn-danger">Delete</button>
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
@endsection
