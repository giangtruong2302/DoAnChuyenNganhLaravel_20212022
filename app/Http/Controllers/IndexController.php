<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\Theloai;
use App\Models\DocGia;

class IndexController extends Controller
{
    public function autocomplete_ajax(Request $request){
        $data=$request->all();
        if($data['keywords']){
            $truyen=Truyen::where('kichhoat',0)->where('tentruyen','LIKE','%'.$data['keywords'].'%')->get();
            $output='
                <ul class="dropdown-menu" style="display:block; float:right; padding:10px;left: 800px;">';
            foreach($truyen as $key => $tr){
                $output .='
                <li class="li_search_ajax"><a href="#">'.$tr->tentruyen.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
    public function home(){
        $theloai=Theloai::orderBy('id','DESC')->get();
        $slide_truyen=Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen=Truyen::orderBy('id','DESC')->where('kichhoat',0)->get();
        return view('pages.home')->with(compact('danhmuc','truyen','theloai','slide_truyen'));
    }
    public function danhmuc($slug){
        $theloai=Theloai::orderBy('id','DESC')->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->get();
        $slide_truyen=Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $danhmuc_id=DanhmucTruyen::where('slug_danhmuc',$slug)->first();

        $truyen=Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('danhmuc_id',$danhmuc_id->id)->get();
        $tendanhmuc=$danhmuc_id->tendanhmuc;
        return view('pages.danhmuc')->with(compact('danhmuc','truyen','tendanhmuc','theloai','slide_truyen'));
    }
    public function theloai($slug){
        $theloai=Theloai::orderBy('id','DESC')->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->get();
        $slide_truyen=Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai_id=Theloai::where('slug_theloai',$slug)->first();
        $tentheloai=$theloai_id->tentheloai; 
        $truyen=Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('theloai_id',$theloai_id->id)->get();
        return view('pages.theloai')->with(compact('danhmuc','truyen','tentheloai','theloai','slide_truyen'));
    }
    public function xemtruyen($slug){
        $slide_truyen=Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai=Theloai::orderBy('id','DESC')->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen=Truyen::with('danhmuctruyen','theloai')->where('slug_truyen',$slug)->where('kichhoat',0)->first();
        $chapter=Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->get();
        $chapter_dau=Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();
        $cungdanhmuc=Truyen::with('danhmuctruyen','theloai')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->get();
        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','cungdanhmuc','chapter_dau','theloai','slide_truyen'));
    }
    public function xemchapter($slug){
        $slide_truyen=Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai=Theloai::orderBy('id','DESC')->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen=Chapter::where('slug_chapter',$slug)->first();
        $chapter=Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->first();
        $chapter_dau=Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();

        $all_chapter=Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();

        $next_chapter=Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');
        $previous_chapter=Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');
        $max_id=Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','DESC')->first();
        $min_id=Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','ASC')->first();
        return view('pages.chapter')->with(compact('danhmuc','chapter','chapter_dau','all_chapter','next_chapter','previous_chapter'
        ,'max_id','min_id','theloai','slide_truyen'));

    }
    public function timkiem(){
        $slide_truyen=Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai=Theloai::orderBy('id','DESC')->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->get();
        $tukhoa=$_GET['tukhoa'];
        $truyen=Truyen::with('danhmuctruyen','theloai')->where('tentruyen','LIKE','%'.$tukhoa.'%')->
        orWhere('tacgia','LIKE','%'.$tukhoa.'%')->get();
        return view('pages.timkiem')->with(compact('danhmuc','truyen','theloai','slide_truyen','tukhoa'));
    }
    
    public function create()
    {
        return view('layout');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('pages.store');
    }
}
