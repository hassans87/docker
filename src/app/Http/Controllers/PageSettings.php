<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class PageSettings extends Controller
{
    public function settings()
    {
        $dex = DB::table('setting')
        ->where('target_page','ro_cip_log')
        ->get();
       // json_decode($details, true);
      // $dex=  json_decode($dex, true);
      // $dex=implode(",",$dex);
       //return view('ro1_cip_log', compact('dex'));
        return view('ro1_cip', ["dex"=>$dex]);
       // return view('ro1_cip_log')->with('dex', $dex);
        //return view('ro1_cip_log', ["dex"=>$dex]);
    }

    public function testme()
    {
        $dexx = DB::table('user_pref')->select('pref')
        ->where('page_id', '=', 'ro1')
        ->where('user_name', '=', 'sajid')
        ->get();
        $dex = DB::table('setting')
        ->where('target_page','ro_cip_log')
        ->get();
        return view('veolink_care_export', ["dex"=>$dexx]);
    }

    public function savePref(Request $request)
    {
       // $rD = new RequestDelayed;
       // $rD = $request->all();
       $userx = Auth::user()->name;
       $target_page = $request->dbpage;
        $rD = json_encode($request->all());
        //dd(unserialize($rD->headers)); // All good
        
        $dex = DB::table('user_pref')-> select('user_name','page_id','pref')
        ->where('page_id', '=', $target_page)
        ->where('user_name', '=', $userx)
        ->exists();
        if($dex){
            DB::table('user_pref')
            ->where('page_id', '=', $target_page)
            ->where('user_name', '=', $userx)
            ->update(['pref' =>$rD]);
        }else{
            DB::table('user_pref')->insert([
                'page_id'=>$target_page,'user_name'=> $userx, 'pref' =>$rD]);
        }
        return $rD;
        //$dexc;
        //json_decode($dexc, true);
       
    }
}
