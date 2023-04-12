<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\ls_mua;
use App\danhmuc;
use App\hinhanhchitiet;
use App\files;
use Illuminate\Support\Facades\DB;
use App\comment;
use Validator;
use Illuminate\Support\Facades\File;
class HomeController extends Controller
{

    public function index(){
        $files=files::where('tinhtrang',1)->orderBy('id','desc')->paginate(12);
        $fnoibat=files::where('tinhtrang',1)->orderBy('view_count','desc')->take(5)->get();
    	return view('page.home',['files'=>$files,'fnoibat'=>$fnoibat]);
    }

    public function codechatluong(){
        $files=files::where('tinhtrang',1)->where('gia','>=',100)->paginate(12);
        $fnoibat=files::where('tinhtrang',1)->orderBy('view_count','desc')->take(5)->get();
        return view('page.home',['files'=>$files,'fnoibat'=>$fnoibat]);
    }
    public function codethamkhao(){
        $files=files::where('tinhtrang',1)->whereBetween('gia', [2, 99])->paginate(12);
        $fnoibat=files::where('tinhtrang',1)->orderBy('view_count','desc')->take(5)->get();
        return view('page.home',['files'=>$files,'fnoibat'=>$fnoibat]);
    }
    public function codemienphi(){
        $files=files::where('tinhtrang',1)->where('gia','<',2)->paginate(12);
        $fnoibat=files::where('tinhtrang',1)->orderBy('view_count','desc')->take(5)->get();
        return view('page.home',['files'=>$files,'fnoibat'=>$fnoibat]);
    }
    public function ngonngu(Request $rq){
        $files=files::where('tinhtrang',1)->where('danhmuc_id','=',$rq->abc)->paginate(12);
        return view('page.home',['files'=>$files]);
    }

    public function index2(){
        return view('page.Login');
    }
    public function Register(){
    	return view('page.register');
    }
    public function DoRegister(Request $request){

    	$user = new User;
    	$user->name = $request->fullname;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->p);
    	$user->sdt = $request->phone;
    	$user->loaiuser = 0;
    	$user->save();
    	return response()->json(['tt'=>1]);
    }
    public function Login(){
    	return view('index');
    }
    public function LoginAuth(Request $request){

        $email=$request->email;
        $pass=$request->password;
        if(Auth::attempt(['email' =>  $email,'password'=>$pass])){
            return response()->json(['d'=>3]);
        }
        else
            return response()->json(['d'=>2]);
    	}


    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function UserProfile(){
    	if(Auth::check())
    		return view('page.profile',['user_info' => Auth::user()]);
    	else
    		return redirect('/');
    }
      public function ExUserProfile(Request $request){
        $user=Auth::user();
        if($request->file('fulImage')){
            $path = $request->file('fulImage')->store('fulImage');
            $name=substr($path,9);
            $request->file('fulImage')->move(
                 'C:\xampp\htdocs\gdcode\public\assets\ima', //nơi cần lưu
                  $name //tên file
                 );
            $user->hinhanh=$name;
        }
        $user->name=$request->updateFullName;
        if(is_null($request->updateEmailMoney)){
            $user->emailnl=$request->updateEmailMoney;
        }
        else
            $user->emailnl=null;
        $user->sdt=$request->updatePhone;
        $user->save();
        return response()->json(['tt'=>0]);
    }
     public function checkmail(Request $request){
    	$email=$request->email;
    	$kq=User::where('email', $email)->count();
    	if($kq>=1)
    		return response()->json(['tt'=>1]);
    	else
    		return response()->json(['tt'=>0]);
    }
    public function changepass(){
    	if(Auth::check())
    		return view('page.changepass',['user_info' => Auth::user()]);
    	else
    		return redirect('/');
    }
    public function dochangepass(Request $request){
    	$user=Auth::user();
    	$pw=$request->newpass;
    	$user->password=bcrypt($pw);
    	$user->save();
    	return response()->json(['tt'=>'tc']);
    	}
    public function checkpassword(Request $request){
    	$email=$request->email;
    	$password=$request->password;
    	$pw=User::where('email',$email)->value('password');
    	if (Hash::check($password,$pw)) {
    		return response()->json(['tt'=>1]);
        }
    }
    public function upload(){
        $danhmuc=danhmuc::all();
        return view('page.upload',['danhmuc'=>$danhmuc]);
    }
    public function checknewtitle(Request $request){
        $tt=$request->title;
        $kq=files::where('tenfile', $tt)->count();
        if($kq>=1)
            return response()->json(['tt'=>1]);
        else
            return response()->json(['tt'=>0]);
    }
    public function checktitleupdate(Request $request){
        $id=$request->id;
        $tt=$request->title;
        $kq=files::where('tenfile', $tt)->count();
        if($kq>=1){
            $kq1=files::where('tenfile', $tt)->where('id',$id)->count();
            if($kq1>=1)
            return response()->json(['tt'=>0]);
            else
                return response()->json(['tt'=>1]);
        }
        else
            return response()->json(['tt'=>0]);
    }

    public function editsource(Request $request){
        //avatar
        $txtTitle=$request->txtTitle;
        $id=$request->id;
        $name=convert_vi_to_en($txtTitle);
        $tenkodau=changeTitle($txtTitle);
        $srcimage=$request->srcimage;
        $data = substr($srcimage, strpos($srcimage, ',') + 1);
        $avatar = base64_decode($data);
        $txtSubTitle=$request->txtSubTitle;
        if($request->txtLinkDemo!=null)
            $txtLinkDemo=$request->txtLinkDemo;
        else
            $txtLinkDemo=null;
        if($request->options=='Free')
            $txtPriceOther=0;
        else
            $txtPriceOther=$request->txtPriceOther;
        $ddlCategoryLang=$request->ddlCategoryLang;
        if($request->mota!=null)
            $mota=$request->mota;
        else
            $mota=null;
        if($request->hdcd!=null)
            $hdcd=$request->hdcd;
        else
            $hdcd=null;
        $file=files::find($id);
        $file->tenfile=$txtTitle;
        $file->motangnan=$txtSubTitle;
        //$file->anhdaidien=$tenkodau.'.png';
        $file->gia=$txtPriceOther;
        $file->mota=$mota;
        $file->hdcaidat=$hdcd;
        $file->tenkhongdau=$tenkodau;
        $file->linkdemo=$txtLinkDemo;
        $file->danhmuc_id =$ddlCategoryLang;
        $file->user_id=Auth::user()->id;

        $file->save();

        return response()->json(['tt'=>"tt"]);
    }
    public function uploadfile(Request $request){
        //avatar
        $txtTitle=$request->txtTitle;
        $name=convert_vi_to_en($txtTitle);
        $tenkodau=changeTitle($txtTitle);
        $srcimage=$request->srcimage;
        $data = substr($srcimage, strpos($srcimage, ',') + 1);
        $avatar = base64_decode($data);
        Storage::disk('local')->put($tenkodau.".png", $avatar);
        $img = Image::make('./storage/app/'.$tenkodau.'.png');
        $x1=$request->x1;
        $y1=$request->y1;
        $width=$request->width;
        $height=$request->height;
        $img->crop(round($width), round($height),round($x1),round($y1))->save('./public/assets/ima/'.$tenkodau.'.png');
        File::delete('./storage/app/'.$tenkodau.'.png');
        $txtSubTitle=$request->txtSubTitle;
        if($request->txtLinkDemo!=null)
            $txtLinkDemo=$request->txtLinkDemo;
        else
            $txtLinkDemo=null;
        if($request->options=='Free')
            $txtPriceOther=0;
        else
            $txtPriceOther=$request->txtPriceOther;
        $ddlCategoryLang=$request->ddlCategoryLang;
        if($request->mota!=null)
            $mota=$request->mota;
        else
            $mota=null;
        if($request->hdcd!=null)
            $hdcd=$request->hdcd;
        else
            $hdcd=null;
        $file=new files();
        $file->tenfile=$txtTitle;
        $file->motangnan=$txtSubTitle;
        $file->anhdaidien=$tenkodau.'.png';
        $file->gia=$txtPriceOther;
        $file->mota=$mota;
        $file->hdcaidat=$hdcd;
        $file->tenkhongdau=$tenkodau;
        $file->linkdemo=$txtLinkDemo;
        $file->danhmuc_id =$ddlCategoryLang;
        $file->user_id=Auth::user()->id;
         //source
        if($request->file('SourceUpload')){
         $tenf = $request->file('SourceUpload')->getClientOriginalName('SourceUpload');
           $request->file('SourceUpload')->move(
                 'assets/sourcecode/', //nơi cần lưu
                  $tenf //tên file
                 );
           $file->linkdown=$tenf;
        }
        $file->save();

        if($request->file('FileUpload2')){
            foreach ($request->FileUpload2 as $FileUpload) {
                $new_name=rand().$FileUpload->getClientOriginalName();
                $FileUpload->move(
                 'C:\xampp\htdocs\gdcode\public\assets\imadetail/', //nơi cần lưu
                  $new_name //tên file
                 );
                $hact=new hinhanhchitiet();
                $hact->hinhanh=$new_name;
                $hact->file_id=$file->id;
                $hact->save();
            }
        }
        return response()->json(['tt'=>"tt"]);
    }

    public function sourcecode($id){
        $files=files::find($id);
        $files->view_count+=1;
        $files->save();
        return view('page.detail',['files'=>$files]);
    }

    public function codetailen(){
        $user=Auth::user();
        $files=files::all()->where('user_id',Auth::user()->id);
        $abc=files::all()->where('user_id',Auth::user()->id)->count();
        return view('page.codetailen',['user'=>$user,'files'=>$files,'abc'=>$abc]);
    }
    public function codedownload(){
        $user=Auth::user();
           $files = DB::table('files')->join('ls_mua', 'files.id', '=', 'ls_mua.file_id')
           ->where('ls_mua.user_id','=',Auth::user()->id)
            ->select('files.*','ls_mua.*')
            ->get();
        $abc=files::all()->where('user_id',Auth::user()->id)->count();
        return view('page.codedownload',['user'=>$user,'files'=>$files,'abc'=>$abc]);
    }


    public function editfile($id){
        $danhmuc=danhmuc::all();
        $file=files::find($id);
        return view('page.editfile',['danhmuc'=>$danhmuc,'file'=>$file]);
    }
    public function search(Request $rq){
        if($rq->txtSearch==null && $rq->slSearch==0)
            $files=files::where('tinhtrang',1)->paginate(8);
        if($rq->txtSearch!=null && $rq->slSearch==0)
            $files=files::where('tinhtrang',1)->where('tenfile','like','%'.$rq->txtSearch.'%')
                        ->orWhere('tinhtrang',1)->Where('id',$rq->txtSearch)
                        ->paginate(8);
        if($rq->txtSearch==null && $rq->slSearch!=0)
            $files=files::where('tinhtrang',1)->where('danhmuc_id', '=', $rq->slSearch)
                        ->paginate(8);
        if($rq->txtSearch!=null && $rq->slSearch!=0)
            $files=files::where('tinhtrang',1)->where('tenfile','like','%'.$rq->txtSearch.'%')->where('danhmuc_id', '=', $rq->slSearch)
                        ->orWhere('tinhtrang',1)->Where('id',$rq->txtSearch)->where('danhmuc_id', '=', $rq->slSearch)
                        ->paginate(8);
        return view('page.kqtimkiem',['files'=>$files]);
    }
    public function commentdt(Request $rq){
       $id=$rq->id;
       $cmt=$rq->cmt;
       $comment= new comment();
       $comment->noidung=$cmt;
       $comment->file_id=$id;
       $comment->user_id=Auth::user()->id;
       $comment->save();
       return response()->json(['data'=>1]);
    }
    public function download(Request $rs){
        $lsmua=new ls_mua();
        $lsmua->file_id=$rs->id;
        $lsmua->user_id=Auth::user()->id;
        $lsmua->save();
        $id=$rs->id;
        $name=files::where('id',$id)->select('linkdown')->get();
        $name=substr($name,14,1000);
        $name=str_replace( '"}]', '', $name );
        $path="assets\sourcecode\ ";
        $path1=preg_replace('/\s+/', '', $path);
        return response()->download(public_path($path1.$name));
    }
}
