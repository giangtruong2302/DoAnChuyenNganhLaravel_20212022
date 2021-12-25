<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocGia;
use App\Controllers\mail;



class DocGiaControllerz extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docgia=DocGia::orderBy('id','DESC')->get();
        return view('admincp.docgia.index')->with(compact('docgia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $request->validate([
            'tendanhmuc' =>'required|unique:danhmuc|max:255',
            'slug_danhmuc' =>'required|unique:danhmuc|max:255',
            'mota' =>'required|max:255',
            'kichhoat'=>'required',
        ],
        [
            'tendanhmuc.unique' =>'tên danh mục đã tồn tại!',
            'slug_danhmuc.unique' =>'slug danh mục đã tồn tại!',
            'tendanhmuc.required' =>'tên danh mục không được bỏ trống!',
            'mota.required' =>'mô tả cần phải có',
        ],

        );
        $data=$request->all();
        dd($data);
        $docgia =  new DocGia();
        $docgia->hoten =$data['hoten'];
        $docgia->username =$data['username'];
        $docgia->password =$data['password'];
        $docgia->email =$data['email'];
        $docgia->phone =$data['phone'];
        $docgia->save();
        $mail=new Mailer();
        $mail->dangky($docgia->email);
        return redirect()->back()->with('status','thêm độc giả thành công');
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
        DocGia::find($id)->delete();
        return redirect()->back()->with('status','xóa thành công độc giả');
    }
}
