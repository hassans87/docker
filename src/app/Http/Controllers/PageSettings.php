<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
}
