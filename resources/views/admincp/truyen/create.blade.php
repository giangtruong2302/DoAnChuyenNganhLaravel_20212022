@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm truyện</div>
                

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('truyen.store')}}" enctype="multipart/form-data">
                        <!-- khong co @csrf bi loi 419 -->
                        @csrf 
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Tên truyện </label>
                            <input type="text" class="form-control" value="{{(old('tentruyen'))}}" name="tentruyen" id="slug" aria-describedby="emailHelp" 
                            placeholder="Tên truyện..." onkeyup="ChangeToSlug();">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Tác giả </label>
                            <input type="text" class="form-control" value="{{(old('tacgia'))}}" name="tacgia"  aria-describedby="emailHelp" 
                            placeholder="Tên tác giả..."">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug truyện </label>
                            <input type="text" class="form-control" value="{{(old('slug_truyen'))}}" name="slug_truyen" id="convert_slug" aria-describedby="emailHelp" 
                            placeholder="Slug truyện ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt truyện </label>
                            <textarea name="tomtat" class="form-control" rows="5" style="resize:none;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Danh mục truyện</label>
                            <select class="custom-select" name="danhmuc">
                                @foreach($danhmuc as $key => $muc)
                                <option value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Thể loại truyện</label>
                            <select class="custom-select" name="theloai">
                                @foreach($theloai as $key => $the)
                                <option value="{{$the->id}}">{{$the->tentheloai}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện </label>
                            <input type="file" class="form-control-file" name="hinhanh"  >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt danh mục </label>
                            <select class="custom-select" name="kichhoat">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" name="themtruyen" class="btn btn-primary">Thêm truyện</button>
                    </form>

                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
