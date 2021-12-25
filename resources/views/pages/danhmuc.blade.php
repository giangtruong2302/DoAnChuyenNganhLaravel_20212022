@extends('../layout')
<!--  -->
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a >{{$tendanhmuc}}</a></li>
    </ol>
    </nav>
<h3>{{$tendanhmuc}}</h3>

            <div class="album py-5 bg-light">
                <div class="container">
                
                <div class="row">
                    <?php 
                         $count=count($truyen);
                    ?>
                    @if($count==0)
                    <div class="col-md-12">
                    <div class="card mb-12 box-shadow">
                        
                        
                        <div class="card-body">
                        <p>Truyện đang cập nhật....</p>
                        </div>
                    
                    @else
                    

                    
                    @endif
                    @foreach($truyen as  $key => $value  )
                    <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                        <a href="#">
                        <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
                        <div class="card-body">
                        <h5>{{$value->tentruyen}}</h5>
                        <p class="card-text">{{$value->tomtat}}</p>
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
                <a href="#" class="btn btn-success">xem tất cả</a>
                </div>
            </div>

        @endsection