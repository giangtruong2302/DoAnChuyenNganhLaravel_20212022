<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Đọc truyện Online </title>

        <!-- Fonts -->
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <!-- <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet"> -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
           
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body >
            <div class="container">
                <!-- menu -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light" >
                    <a class="navbar-brand" href="{{url('/')}}">Cùng Giang đọc truyện</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('/')}}">Trang chủ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Danh mục truyện
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($danhmuc as $key => $danh)
                            <a class="dropdown-item" href="{{url('danh-muc/'.$danh->slug_danhmuc)}}">{{$danh->tendanhmuc}}</a>
                            @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Thể loại truyện
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($theloai as $key => $the)
                            <a class="dropdown-item" href="{{url('the-loai/'.$the->slug_theloai)}}">{{$the->tentheloai}}</a>
                            @endforeach
                            </div>
                        </li>
                        <li>
                            <form class="form-inline my-2 my-lg-0">
                            <abbr title="admin đăng nhập">
                            <a href="{{url('login')}}" class="btn btn-outline-danger my-2 my-sm-0" type="submit">
                                <i class="fa fa-user"></i></a></abbr>
                            </form>
                        </li>
                        <li class="nav-item dropdown" >
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="padding:5px; margin:10px;color:black;">
                                <a href="#" class="DN" data-toggle="modal" data-target="#form1" style="padding:5px; margin:10px;color:black;">
                                                <i class="fa fa-user-circle"></i> Đăng nhập
                                </a></br>
                                <a href="#" class="DK" data-toggle="modal" data-target="#form2" style="padding:5px; margin:10px;color:black;">
                                                <i class="fa fa-plus"></i> Đăng ký
                                </a>
                            </div>
                        </li>
                        </ul>
                        <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{url('tim-kiem')}}" method="GET">
                         @csrf
                         <div id="search_ajax" class="nav-item dropdown-menu" ></div>
                        <input class="form-control mr-sm-2" name="tukhoa" id="keywords" type="search" placeholder="Tìm kiếm tên tác giả, tên truyện,..." aria-label="Search">
                       
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </nav>
                <!--Form Dang nhap-->
            <div class="modal fade" id="form1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h3 class="modal-title" id="exampleModalLabel"
                                style="text-align: center; text-shadow: 0 0 blue;">Đăng Nhập</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="modal-form" action="" method="GET" >
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <span style="width: 20px;"><i class="fas fa-user"> </i> Tài khoản</span>
                                    <input type="text" id="account" name="user" class="form-control"
                                        placeholder="tài khoản..." required>

                                </div>
                                <div class="form-group">
                                    <label for="password"><i class="fas fa-lock"> </i> Mật khẩu</label>
                                    <input type="password" class="form-control" name="password" id="name1" placeholder="...... "
                                        required>
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <button type="submit" name="dangnhap" class="btn btn-success">Xác nhận</button>
                                <button type="reset" class="btn btn-success">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Form Dang ky-->
            <div class="modal fade" id="form2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h3 class="modal-title" id="exampleModalLabel"
                                style="text-shadow: 0 0 blue; text-align: center;">Đăng Ký Tài Khoản</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <form method="GET" action="{{url('store')}}" >
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <span style="width: 20px;"><i class="fas fa-users"> </i> Họ và tên</span>
                                    <input type="text" id="account" name="hoten" class="form-control"
                                        placeholder="Họ tên..." required pattern=".{08,}" title="08 or more characters">
                                    <small id="emailHelp" class="form-text text-muted">Thông tin của bạn sẽ được bảo
                                        mật.</small>
                                </div>
                                <div class="form-group">
                                    <span style="width: 20px;"><i class="fas fa-user"> </i> Tài khoản</span>
                                    <input type="text" id="account" name="username" class="form-control"
                                        placeholder="tài khoản..." required pattern=".{08,}"
                                        title="08 or more characters">

                                </div>
                                <div class="form-group">
                                    <label for="password"><i class="fas fa-lock"> </i> Mật khẩu</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="....." required
                                        pattern=".{08,}" title="08 or more characters">
                                </div>
                                <div class="form-group">
                                    <label for="sdt"><i class="fas fa-phone"></i>Số điện thoại</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="SĐT"
                                     title=" nhập đủ số điện thoại">
                                </div>
                                <div class="form-group">
                                    <span style="width: 20px;"><i class="fab fa-mailchimp"></i> Email</span>
                                    <input type="email" id="account" name="email" class="form-control"
                                        placeholder="...@gmail.com" required
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                        title="Vui lòng nhập đúng định dạng mail!">
                                    <small id="emailHelp" class="form-text text-muted">Thông tin của bạn sẽ được bảo mật.</small>
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <button type="submit" name="themdocgia" class="btn btn-success">Xác nhận</button>
                                <button type="reset" class="btn btn-success"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <hr>
                <!-- sach moi cap nhat -->
                @yield('content')
                <hr>
                 <!-- slide -->
                 @yield('slide')
                <hr>
        <footer class="text-muted ">
        <div class="container">
            <p class="float-right">
            <a href="#">Back to top</a>
            </p>
            <p>Copyright by GiangGiang</p>
            <a href="https://www.facebook.com/profile.php?id=100037360239411"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/giangduong2302/"><i class="fab fa-instagram"></i></a>
        </div>
        </footer>
        <div id="back-to-top" class="fixed-action-btn smooth-scroll ">
            <a href="# " class="btn btn-outline-dark btn-lg" role="button" title="Trở về đầu trang " data-toggle="tooltip "
                data-placement="left "><i class="fa fa-chevron-up "></i></a>
        </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/js.js') }}" defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function () {
    // Sự kiện khi đóng modal form //
            $('#form1').on('hidden.bs.modal', function (e) {
                $('.chat-boxx').addClass('show');
                $('.chatIcon').show();
                $('#header-top').addClass('sticky');
            })
            $('#form2').on('hidden.bs.modal', function (e) {
                $('.chat-boxx').addClass('show');
                $('.chatIcon').show();
                $('#header-top').addClass('sticky');
            })
            // Sự kiện khi mở modal form // 
            $('.DN').click(function () {
                if ($('#form1').length) {
                    $('.chat-boxx').removeClass('show');
                    $('.chatIcon').hide();
                    $('#header-top').removeClass('sticky');
                }
            })
            $('.DK').click(function () {
                if ($('#form2').length)
                    $('.chat-boxx').removeClass('show');
                $('.chatIcon').hide();
                $('#header-top').removeClass('sticky');
            })
        });
    </script>
    <!-- nut scroll back -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body đến 0px 
            $('#back-to-top').click(function () {
                $('#back-to-top').tooltip('hide');
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
            $('#back-to-top').tooltip('show');

        });
    </script>
    <!-- goi y tim kiem -->
    <script type="text/javascript">
        $('#keywords').keyup( function(){
            var keywords=$(this).val();
            if(keywords !='')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/autocomplete-ajax')}}",
                    method:"POST",
                    data:{keywords:keywords,_token:_token},
                    success:function(data){
                       $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            }
            else{
                $('#search_ajax').fadeOut();
            }
        });

        $(document).on('click','.li_search_ajax',function(){
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
    
    <!-- carousel  -->
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dot:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
    <!-- chon chuong chapter -->
    <script type="text/javascript">
            $('.select-chapter').on('change',function(){
                var url=$(this).val();
                if(url){
                    window.location=url;
                }
                else{
                    return false;
                }
            });

            current_chapter();
            function current_chapter(){
                var url=window.location.href;
                $('.select-chapter').find('option[value="'+url+'"]').attr("selected",true);
            }
    </script>
    
    
    </body>
</html>
