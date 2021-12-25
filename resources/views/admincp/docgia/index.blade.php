@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh sách đọc giả</div>

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
                            <th scope="col">Tên đọc giả</th>
                            <!-- <th scope="col">Slug danh mục</th> -->
                            <th scope="col">Mail</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($docgia as  $key => $dgia)
                                <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$dgia->hoten}}</td>
                                <td>{{$dgia->email}}</td>
                                <td>{{$dgia->phone}}</td>
                                <td>
                                    
                                    <form method="POST" action="{{route('docgia.destroy',[$dgia->id])}}"> 
                                        @method('delete')
                                        @csrf
                                        <button onclick=" return confirm('bạn có chắc chắn muốn xóa ?') ;" class="btn btn-danger">Xóa</button>
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
