@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm thể loại</div>
                

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
                    <form method="POST" action="{{route('theloai.store')}}"  enctype="multipart/form-data">
                        <!-- khong co @csrf bi loi 419 -->
                        @csrf 
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                            <input type="text" class="form-control" value="{{(old('tentheloai'))}}" name="tentheloai" id="slug" 
                            placeholder="Tên thể lọai..." onkeyup="ChangeToSlug();">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug thể loại </label>
                            <input type="text" class="form-control" value="{{(old('slug_theloai'))}}" name="slug_theloai" id="convert_slug" aria-describedby="emailHelp" 
                            placeholder="slug thể loại...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Mô tả thể loại </label>
                            <input type="text" class="form-control" value="{{(old('mota'))}}" name="mota" id="exampleInputEmail1" aria-describedby="emailHelp" 
                            placeholder="Mô tả danh mục...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt thể loại </label>
                            <select class="custom-select" name="kichhoat">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" name="themtheloai" class="btn btn-primary">Submit</button>
                    </form>

                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
