@extends('../layout')

@section('content')
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">{{$truyen->tentruyen}}</a></li>
    </ol>
    </nav>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh )}}">
                </div>
                <div class="col-md-9">
                    <style>
                        .menutruyen{
                            list-style:none;
                        }
                        .infotruyen{
                            list-style:none;
                        }
                    </style>
                    <ul class="infotruyen">
                        <li>Tác giả: {{$truyen->tacgia}}</li>
                        <li>Số Chapter: 100</li>
                        <li>Số lượt xem: 2000</li>
                        <li>Danh mục truyện: <a href="">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
                        <li>Thể loại truyện: <a href="">{{$truyen->theloai->tentheloai}}</a></li>
                        <li><a href="#">Xem mục lục</a></li>
                        @if($chapter_dau)
                        <li><a class="btn btn-outline-success" href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}">Đọc online</a></li>
                        @else
                                <a class="btn btn-sm btn-outline-success" href="{{url('/')}}"><= Quay về trang chủ </a>
                                <p style="color:red; font-style: italic; ">Truyện hiện tại chưa có chương.....</p>
                               
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <p>
                    {!! $truyen->tomtat !!}
                </p>
            </div>
            <hr>
            <h5>Danh sách chương</h5>
            <ul class="mucluctruyen">
                     @foreach($chapter as $key => $chap)   
                        <li><a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
                    @endforeach
            </ul>
           
            <h3>Sách cùng danh mục</h3>
            <div class="row">
                @foreach($cungdanhmuc as  $key => $value  )
                        <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <a href="#">
                            <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
                            <div class="card-body">
                            <h5>{{$value->tentruyen}}</h5>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" type="button" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                
                                <a class="btn btn-sm btn-outline-secondary" ><i class="fas fa-eye"></i>11111</a>
                                </div>
                                <small class="text-muted">9 mins ago</small>
                            </div>
                            </div>
                            
                        </div>
                        
                        </div>
                        @endforeach
                    </div>                    
                
                </div>

                    
               
           
        



        <div class="col-md-3">
            <h5>Danh mục truyện</h5>
        </div>
        
    </div>
@endsection