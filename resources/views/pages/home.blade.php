@extends('../layout')
@section('slide')
    @include('pages.slide')
@endsection
@section('content')

                <div class="container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="{{asset('public/images/barner1.jpg')}}"  style="height:300px" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="{{asset('public/images/barner2.jpg')}}" style="height:300px" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="{{asset('public/images/barner3.jpg')}}" style="height:300px" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev btn-outline-secondary" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next btn-outline-secondary" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                </div>
                <br>
                <hr>
<div class="container">
    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-wellcome-tab" data-toggle="tab" href="#nav-wellcome" role="tab"
         aria-controls="nav-home" aria-selected="true">Sách hay mới cập nhật</a>

        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" 
        aria-controls="nav-profile" aria-selected="false">Top đề cử</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" 
        aria-controls="nav-contact" aria-selected="false">Truyện full</a>
    </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-wellcome" role="tabpanel" aria-labelledby="nav-profile-tab">
    <br>
            <div class="album py-5">
                <div class="container">
                
                <div class="row">
                    @foreach($truyen as  $key => $value  )
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <a href="#">
                            <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" style="height: 350px;">
                            <div class="card-body">
                            <h5 style="height:45px;">{{$value->tentruyen}}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" type="button" class="btn btn-danger btn-sm">Đọc ngay</a>
                                <a class="btn btn-sm btn-outline-secondary" ><i class="fas fa-eye"></i>999</a>
                                </div>
                                <small class="text-muted">9 mins ago</small>
                            </div>
                            </div>
                            
                        </div>
                    
                    </div>
                    @endforeach
                    
                    
                </div>
                
                </div>
            </div>
    </div>
        
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><br>
            <div class="album py-5">
                <div class="container">
                
                <div class="row">
                    @foreach($truyen as  $key => $value  )
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <a href="#">
                            <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" style="height: 350px;">
                            <div class="card-body">
                            <h5 style="height:45px;">{{$value->tentruyen}}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" type="button" class="btn btn-danger btn-sm">Đọc ngay</a>
                                <a class="btn btn-sm btn-outline-secondary" ><i class="fas fa-eye"></i>999</a>
                                </div>
                                <small class="text-muted">9 mins ago</small>
                            </div>
                            </div>
                            
                        </div>
                    
                    </div>
                    @endforeach
                    
                    
                </div>
                
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <br>
            <div class="album py-5">
                <div class="container">
                
                <div class="row">
                    @foreach($truyen as  $key => $value  )
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <a href="#">
                            <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" style="height: 350px;">
                            <div class="card-body">
                            <h5 style="height:45px;">{{$value->tentruyen}}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" type="button" class="btn btn-danger btn-sm">Đọc ngay</a>
                                <a class="btn btn-sm btn-outline-secondary" ><i class="fas fa-eye"></i>999</a>
                                </div>
                                <small class="text-muted">9 mins ago</small>
                            </div>
                            </div>
                            
                        </div>
                    
                    </div>
                    @endforeach
                    
                    
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

        @endsection