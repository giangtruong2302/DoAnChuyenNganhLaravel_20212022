<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuctruyen = DanhmucTruyen::orderBy('id','DESC')->get();
        return view('admincp.danhmuctruyen.index')->with(compact('danhmuctruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.danhmuctruyen.create');
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
        // dd($data);
        $danhmuctruyen=  new DanhmucTruyen();
        $danhmuctruyen->tendanhmuc =$data['tendanhmuc'];
        $danhmuctruyen->slug_danhmuc =$data['slug_danhmuc'];
        $danhmuctruyen->mota =$data['mota'];
        $danhmuctruyen->kichhoat =$data['kichhoat'];
        $danhmuctruyen->save();
        return redirect()->back()->with('status','thêm danh mục thành công');
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
        $danhmuc=DanhmucTruyen::find($id);
        return view('admincp.danhmuctruyen.edit')->with(compact('danhmuc'));
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

        $request->validate([
            'tendanhmuc' =>'required|max:255',
            
            'mota' =>'required|max:255',
            'kichhoat'=>'required',
        ],
        [
            'tendanhmuc.required' =>'tên danh mục không được bỏ trống!',
            
            'mota.required' =>'mô tả cần phải có',
        ],

        );
        $data=$request->all();
        // dd($data);
        $danhmuctruyen=   DanhmucTruyen::find($id);
        $danhmuctruyen->tendanhmuc =$data['tendanhmuc'];
        $danhmuctruyen->slug_danhmuc =$data['slug_danhmuc'];
        $danhmuctruyen->mota =$data['mota'];
        $danhmuctruyen->kichhoat =$data['kichhoat'];
        $danhmuctruyen->save();
        return redirect()->back()->with('status','cập nhật danh mục thành công');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DanhmucTruyen::find($id)->delete();
        return redirect()->back()->with('status','xóa thành công danh mục');
    }
}
