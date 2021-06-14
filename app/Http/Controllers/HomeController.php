<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class HomeController extends MailController
{


    public function index(){
        $user = Auth::user();
        $packages=DB ::select('select tp.*,ib.file_nm,ib.path from travel_pack tp
        left join travel_img ti on tp.id=ti.travel_id and iscover=1
        left join image_bank ib on ib.id=ti.img_id
        where tp.use_mk=1
        ;');
        $data=array(
           // 'welcome'=>$images,
            'packages'=>$packages,
            'user'=>$user
        );
        return view('../pages/homeview',$data);
     //   return "Data";
    }
    public function detailpack(Request $request,$id){
        $user = Auth::user();
        $images=DB::table('travel_img as ti')
        ->leftJoin('image_bank as ib','ti.img_id','=','ib.id')
        ->where('travel_id',$id)
        ->where('iscover',false)->get();
        $imagecov=DB::table('travel_img as ti')
        ->leftJoin('image_bank as ib','ti.img_id','=','ib.id')
        ->where('travel_id',$id)
        ->where('iscover',1)->first();
        $packages=DB::table('travel_pack')->where('id',$id)->first();
        $facilities= DB::table('facility as f')
        ->leftJoin('travel_facility as tf',function($join) use ($id){
            $join->on('f.id','=','tf.fac_id');
            $join->on('tf.travel_id','=',DB::raw($id));
        })
        ->select('f.*', 'tf.note', 'tf.use_mk')
        ->where('f.fac_kind','Tour')
        ->get();
        $dates=DB::table('travel_time')->where('travel_id',$id)->get();
        $data=array(
             'images'=>$images,
             'packages'=>$packages,
             'cover'=>$imagecov,
             'facilities'=>$facilities,
             'dates'=>$dates,
             'user'=>$user
         );
        return view('pages/detailpack',$data);
    }
    public function bookpack(Request $request,$id){

        if (Auth::check()) {
            $user = Auth::user();
            if($user->name==null || $user->phone_no==null){}
            $packages=DB::table('travel_pack')->where('id',$id)->first();
            $dalelist=DB::table('travel_time')->where('travel_id',$id)->get();
            $data=array(
             'packages'=>$packages,
             'user'=>$user,
             'datelist'=>$dalelist
            );
            return view('pages/bookpack',$data);
        }else{
            return view('pages/loginpage');
        }

    }
    public function loginPage(Request $request){
        return view('pages/loginpage');
    }
    public function confirmbook(Request $request){
        //$request->user('api');
        $validated = $request->validate([
            'pack_id' => 'required',
            'QTY' => 'required',
            'PACK_DATE' => 'required',
            'uphone' => 'required|min:10|regex:/(08)[0-9]{9}/',
            'uname' => 'required',
            'gid' => 'required',
        ]);
        $iduserfake = $request->input('gid');
        $idpack=$request->input('pack_id');
        $qty=$request->input('QTY');
        $date=$request->input('PACK_DATE');
        $name=$request->input('uname');
        $phone_no=$request->input('uphone');


        $iduser=explode("Wr00bT,",$iduserfake)[1];
        $user = User::where('google_id', $iduser)->first();
        if (!$user) {
            throw new Exception("Connot Found Session");
        }

        $travel=DB::table('travel_pack')->where('id',$idpack)->where('use_mk','1')->first();
        if(!$travel){
            throw new Exception("Paket Travel ini Sedang Tidak Tersedia");
        }
        DB::beginTransaction();
        try{
            DB::table('users')->where('google_id',$iduser)->update(['name'=>$name,'phone_no'=>$phone_no]);
            $arg=array(
                'pack_id'=>$idpack,
                'member_id'=>$iduser ,
                'pack_qty'=>$qty,
                'pay_status'=>'booked',
                'pack_date'=>$date,
                'price'=>$travel->price,
                'disc'=>0,
                'book_time'=>Carbon::now()
            );
            $idbook=DB::table('travel_book')->insertGetId($arg);
            $bookNo='AST-'.str_pad($idpack, 3, "0", STR_PAD_LEFT).Carbon::now()->format('Ymd').str_pad($idbook, 5, "0", STR_PAD_LEFT);
            DB::table('travel_book')->where('id',$idbook)->update(['book_no'=>$bookNo]);
            DB::commit();
            $this->sendMail($user->name,$bookNo,$user->email,$idbook);
        }catch(Exception $e){
            DB::rollback();
            throw $e;
        }
        return response()->json(['STATUS'=>'OK','ID'=>$idbook],Response::HTTP_OK);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function invoicedet(Request $request,$id){
        $packages=DB::table('travel_book as b')
        ->join('travel_pack as p','b.pack_id','=','p.id')
        ->join('users as u','u.google_id','=','b.member_id')
        ->select('b.*','p.pack_nm','p.city','u.name','u.email','u.phone_no')
        ->where('b.id',$id)->first();
        $user = Auth::user();
        $data=array(
            'packages'=>$packages,
            'user'=>$user,
        //    'datelist'=>$dalelist
           );
        return view('pages/invoicedet',$data);
    }
}
