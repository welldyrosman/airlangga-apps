<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index(){
        //$id = Auth::id();
        $packages=DB ::select('select tp.*,ib.file_nm,ib.path from travel_pack tp
        left join travel_img ti on tp.id=ti.travel_id and iscover=1
        left join image_bank ib on ib.id=ti.img_id
        where tp.use_mk=1
        ;');
        $data=array(
           // 'welcome'=>$images,
            'packages'=>$packages,
          //  'id'=>$id
        );
        return view('../pages/homeview',$data);
     //   return "Data";
    }
    public function detailpack(Request $request,$id){
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
             'dates'=>$dates
         );
        return view('pages/detailpack',$data);
    }
}
