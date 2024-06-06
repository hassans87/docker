<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ROFeedQuality extends Controller
{
    public function roFeedQc(Request $request)
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
        DB::table('activity_log')->insert([
            'user_name' => Auth::user()->name, 'activity' => "RO FEED Query: ".$data1.", ".$data2.", ".$data3.", ".$data4.", ".$data5.", ".$data6.", ".$data7 
                ]);
        $dex = DB::table('ro_feed_qc')-> select('i_date',$data1,$data2,$data3,$data4,$data5,$data6,$data7)
        ->whereBetween('i_date',[$request->from,$request->dateto])
        ->orderBy('i_date', 'asc')
        ->get();
        $x_axis=array();
        $line1=array();
        $line2=array();
        $line3=array();
        $line4=array();
        $line5=array();
        $line6=array();
        $line7=array();
        $date_interval =strtotime("2016-01-01 15:18:00");
        foreach ($dex as $row){
            $ddf = abs(strtotime($row->i_date) - $date_interval)/3600;
            if($ddf >= $dinvt){
                array_push($x_axis,$row->i_date);
                if($bay1=='true'){array_push($line1,$row->$data1);}
                if($bay2=='true'){array_push($line2,$row->$data2);}
                if($bay3=='true'){array_push($line3,$row->$data3);}
                if($bay4=='true'){array_push($line4,$row->$data4);}
                if($bay5=='true'){array_push($line5,$row->$data5);}
                if($bay6=='true'){array_push($line6,$row->$data6);}
                if($bay7=='true'){array_push($line7,$row->$data7);}
                $stream = [$x_axis,$line1,$line2,$line3,$line4,$line5,$line6,$line7];
                $date_interval = strtotime($row->i_date);
            }}
    return json_encode($stream);
        }
}
