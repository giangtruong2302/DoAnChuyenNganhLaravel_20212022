@extends('../layout')

@section('content')
<!-- quay lại trang trước -->
<?php
    $previous = "javascript:history.go(-1)";
    if(isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    }
?>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $previous ?>" >{{$chapter->truyen->tentruyen}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$chapter->tieude}}</li>
    </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <h4>{{$chapter->truyen->tentruyen}}</h4>
            <p>
                Chương hiện tại: {{$chapter->tieude}}
            </p>
            <div class="col-md-5">
                <style type="text/css">
                    .isDisabled{
                        color:currentColor;
                        pointer-events: none;
                        opacity:0,5;
                        text-decoration:none;
                    }
                </style>
                <div class="form-group">
                    <label>Chọn chương</label>
                    <p><a href="{{url('xem-chapter/'.$previous_chapter)}}" class="btn btn-primary
                    {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}"><-Chương trước</a></p>
                    <select class="custom-select select-chapter" id="select-chapter">
                        @foreach($all_chapter as $key => $chap)
                        <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}" >{{$chap->tieude}}</option>
                        @endforeach
                    </select>
                    <p class="mt-3"><a href="{{url('xem-chapter/'.$next_chapter)}} " 
                     class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}">Chương sau -></a></p>

                </div>
            </div>
            <div class="noidungchuong">
                <p>
                    {!! $chapter->noidung !!}
                </p>
                
               
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label>Chọn chương</label>
                    <select class="custom-select select-chapter" id="select-chapter">
                        @foreach($all_chapter as $key => $chap)
                        <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}" >{{$chap->tieude}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <h3>
                    Lưu và chia sẽ truyện
                </h3>
                <a class="btn" href="#"><i class="fab fa-facebook"></i>facebook</a>
                <a class="btn" href="#"><i class="fab fa-instagram"></i>instagram</a>
        </div>
    </div>
@endsection