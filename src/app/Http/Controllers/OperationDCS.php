<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OperationDCS extends Controller
{
    public function ro1ECfromDCS(Request $request)
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
        $dex = DB::table('dcs_ro1_ec')-> select('i_date',$data1,$data2,$data3,$data4,$data5,$data6,$data7)
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
            }
    return json_encode($stream);
        }


        public function ro2ECfromDCS(Request $request)
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
        $dex = DB::table('dcs_ro2_ec')-> select('i_date',$data1,$data2,$data3,$data4,$data5,$data6,$data7)
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
            }
    return json_encode($stream);
        }




        public function ro1DPIfromDCS(Request $request)
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
            $dex = DB::table('dcs_ro1_dpi')-> select('i_date',$data1,$data2,$data3,$data4,$data5,$data6,$data7)
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
                }
        return json_encode($stream);
            }





public function onlineDBNPAtest(Request $request)
            {
                $data1 = $request->ufdata1;
                $data2 = $request->ufdata2;
                $data3 = $request->ufdata3;
                $data4 = $request->ufdata4;
                $data5 = $request->ufdata5;
                $data6 = $request->ufdata6;
                $data7 = $request->ufdata7;
                $data8 = $request->ufdata8;
                $data9 = $request->ufdata9;
                $data10 = $request->ufdata10;
                $bay1 = $request->d1;
                $bay2 = $request->d2;
                $bay3 = $request->d3;
                $bay4 = $request->d4;
                $bay5 = $request->d5;
                $bay6 = $request->d6;
                $bay7 = $request->d7;
                $bay8 = $request->d8;
                $bay9 = $request->d9;
                $bay10 = $request->d10;
                $dinvt = 0.7;
                $dex = DB::table('rofeed_dbnpa')-> select('i_date',$data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10)
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
                $line8=array();
                $line9=array();
                $line10=array();
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
                        if($bay8=='true'){array_push($line8,$row->$data8);}
                        if($bay9=='true'){array_push($line9,$row->$data9);}
                        if($bay10=='true'){array_push($line10,$row->$data10);}
                        $stream = [$x_axis,$line1,$line2,$line3,$line4,$line5,$line6,$line7,$line8,$line9,$line10];
                        $date_interval = strtotime($row->i_date);
                    }}
            return json_encode($stream);
                }
}
