<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class RO1Normalisation extends Controller
{

    public function viewRO1Normalization()
    {
        $userx = Auth::user()->name;
        $dex = DB::table('user_pref')->select('pref')
        ->where('page_id', '=', 'ro1_norm')
        ->where('user_name', '=', $userx)
        ->exists();
if($dex){
    $userx = Auth::user()->name;
    $dex = DB::table('user_pref')->select('pref')
    ->where('page_id', '=', 'ro1_norm')
    ->where('user_name', '=', $userx)
    ->get();
    return view('ro1_normalisation', ["dex"=>$dex]);
}else{
    $dexs = DB::table('user_pref')->select('pref')
        ->where('page_id', '=', 'ro1_norm')
        ->where('user_name', '=', 'Sajid Hassan')
        ->get();
        return view('ro1_normalisation', ["dex"=>$dexs]);
}

        
    }
    public function firstPassNorms(Request $request)
    {
        $data1 = $request->ufdata1;
        $data2 = $request->ufdata2;
        $data3 = $request->ufdata3;
        $data4 = $request->ufdata4;
        $data5 = $request->ufdata5;
        $data6 = $request->ufdata6;
        $data7 = $request->ufdata7;
        $bay1 = $request->d1;
        $bay2 = $request->d2;
        $bay3 = $request->d3;
        $bay4 = $request->d4;
        $bay5 = $request->d5;
        $bay6 = $request->d6;
        $bay7 = $request->d7;
        $dinvt = $request->datainvt;
        $target_skid = '41'.$request->roskid.'_normalization';
        $dex = DB::table($target_skid)-> select('query_date','full_flushing','membrane_flushing','dbna_flushing','cip',$data1,$data2,$data3,$data4,$data5,$data6,$data7)
        ->whereBetween('query_date',[$request->from,$request->dateto])
        ->orderBy('query_date', 'asc')
        ->get();
        $x_axis=array();
        $line1=array();
        $line2=array();
        $line3=array();
        $line4=array();
        $line5=array();
        $line6=array();
        $line7=array();
        $data_check1=($bay1 AND ($data1=='full_flushing' ||$data1=='membrane_flushing'||$data1=='dbna_flushing'||$data1=='cip'))? $data_check=true:false;
        $data_check2=($bay2 AND ($data2=='full_flushing' ||$data2=='membrane_flushing'||$data2=='dbna_flushing'||$data2=='cip'))? $data_check=true:false;
        $data_check3=($bay3 AND ($data3=='full_flushing' ||$data3=='membrane_flushing'||$data3=='dbna_flushing'||$data3=='cip'))? $data_check=true:false;
        $data_check4=($bay4 AND ($data4=='full_flushing' ||$data4=='membrane_flushing'||$data4=='dbna_flushing'||$data4=='cip'))? $data_check=true:false;
        $data_check5=($bay5 AND ($data5=='full_flushing' ||$data5=='membrane_flushing'||$data5=='dbna_flushing'||$data5=='cip'))? $data_check=true:false;
        $data_check6=($bay6 AND ($data6=='full_flushing' ||$data6=='membrane_flushing'||$data6=='dbna_flushing'||$data6=='cip'))? $data_check=true:false;
        $data_check7=($bay7 AND ($data7=='full_flushing' ||$data7=='membrane_flushing'||$data7=='dbna_flushing'||$data7=='cip'))? $data_check=true:false;
        $flushing_check=($data_check1||$data_check2||$data_check3||$data_check4||$data_check5||$data_check6||$data_check7)?true:false;
        $date_interval =strtotime("2016-01-01 15:18:00");
        foreach ($dex as $row){
            $ff= (int)$row->full_flushing;
            $mf= (int)$row->membrane_flushing;
            $df= (int)$row->dbna_flushing;
            $cf= (int)$row->cip;
            $is_running =(int)$row->query_date;
            $ddf = abs(strtotime($row->query_date) - $date_interval)/3600;
            if(($ddf >=$dinvt AND $is_running>=100) OR ($flushing_check AND ($ff>0.5 OR $mf>0.5 OR $df>0.5 OR $cf>0.5))){
            array_push($x_axis,$row->query_date);
            if($bay1=='true'){array_push($line1,$row->$data1);}
            if($bay2=='true'){array_push($line2,$row->$data2);}
            if($bay3=='true'){array_push($line3,$row->$data3);}
            if($bay4=='true'){array_push($line4,$row->$data4);}
            if($bay5=='true'){array_push($line5,$row->$data5);}
            if($bay6=='true'){array_push($line6,$row->$data6);}
            if($bay7=='true'){array_push($line7,$row->$data7);}
            $stream = [$x_axis,$line1,$line2,$line3,$line4,$line5,$line6,$line7];
            $date_interval = strtotime($row->query_date);
        }}
return json_encode($stream); 
    }


}
