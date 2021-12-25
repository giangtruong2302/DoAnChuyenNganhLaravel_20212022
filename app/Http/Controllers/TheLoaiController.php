<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Theloai;
class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloai = Theloai::orderBy('id','DESC')->get();
        return view('admincp.theloai.index')->with(compact('theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'tentheloai' =>'required|unique:theloai|max:255',
            'slug_theloai' =>'required|unique:theloai|max:255',
            'mota' =>'required|max:255',
            'kichhoat'=>'required',
        ],
        [
            'tentheloai.unique' =>'tên thể loại đã tồn tại!',
            'slug_theloai.unique' =>'slug thể loại đã tồn tại!',
            'tentheloai.required' =>'tên thể loại không được bỏ trống!',
            'mota.required' =>'mô tả cần phải có',
        ],

        );
        //=$request->all();
        // dd($data);
        $theloai=  new Theloai();
        $theloai->tentheloai =$data['tentheloai'];
        $theloai->mota =$data['mota'];
        $theloai->kichhoat =$data['kichhoat'];
        $theloai->slug_theloai =$data['slug_theloai'];
        $theloai->save();
        return redirect()->back()->with('status','thêm thể loại thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
