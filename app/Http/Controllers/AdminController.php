<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\files;
use App\User;
use App\comment;
class AdminController extends Controller
{
    public function index(){
        $files = files::where('tinhtrang',0)->take(4)->get();
        return view('admin.home',['files'=>$files]);
    }
    public function Login(){
        return view('admin.login');
    }
    public function LoginAuth(Request $request){
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required|min:6|max:32'
            ],
            [
                'email.required' => 'Bạn chưa nhập Địa chỉ Email!',
                'password.required' => 'Bạn chưa nhập Mật khẩu!',
                'password.min' => 'Mật Khẩu gồm tối thiểu 6 ký tự!',
                'password.max' => 'Mật Khẩu gồm tối đa 32 ký tự!'
            ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password,'loaiuser'=>1]))
            return redirect('admin/');
        else
            return redirect('admin/login')->with('message','Đăng Nhập không thành công!');
    }
    public function Logout(){
        Auth::logout();
        return redirect('admin/login');
    }

    public function duyet($id){
        $file = files::find($id);
        $file->tinhtrang=1;
        $file->save();
        return redirect('admin/');
    }

    public function delete($id){
        $file = files::find($id);
        $file->delete();
        return redirect('admin/');
    }
    public function detail($id){
        $file = files::find($id);
        return view('admin.source.detail',['file'=>$file]);
    }
    public function listuser(){
        $users = User::all();
        return view('admin.user.danhsach',['users'=>$users]);
    }
    public function edituser($id){
        $users = User::find($id);
        return view('admin.user.sua',['users'=>$users]);
    }
    public function xetquyen1(Request $request){
        $users = User::find($request->id);
        $users->loaiuser=$request->loai;
        $users->save();
        return response()->json(['tt'=>1]);
    }
    public function deleteuser($id){
        $users = User::find($id);
        $users->delete();
        return redirect('admin/user/danhsach');
    }
    public function comment(){
        $cm=comment::all();
        return view('admin.comment.danhsach',['cm'=>$cm]);
    }
    public function blchuaduyet(){
        $cm=comment::where('tinhtrang',0)->get();
        return view('admin.comment.danhsachchuaduyet',['cm'=>$cm]);
    }
    public function deletecmt($id){
        $cmt = comment::find($id);
        $cmt->delete();
        return redirect('admin/comment/danhsach');
    }
    public function duyetcmt($id){
        $cmt = comment::find($id);
        $cmt->tinhtrang=1;
        $cmt->save();
        return redirect('admin/comment/danhsach');
    }
    public function sourceds(){
        $files = files::all();
        return view('admin.source.danhsach',['files'=>$files]);
    }
}
