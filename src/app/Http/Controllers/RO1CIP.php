<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RO1CIP extends Controller
{
    public function cipRoList(Request $request)
    {
        $col1 = $request->ufdata1;
        $col2 = $request->ufdata2;
        $col3 = $request->ufdata3;
        $col4 = $request->ufdata4;
        $col5 = $request->ufdata5;
        $col6 = $request->ufdata6;
        $col7 = $request->ufdata7;
        $bay1 = $request->d1;
        $bay2 = $request->d2;
        $bay3 = $request->d3;
        $bay4 = $request->d4;
        $bay5 = $request->d5;
        $bay6 = $request->d6;
        $bay7 = $request->d7;
        $dex = DB::table('ro_cip_log')-> select('query_date','cip_1','cip_2',$col1,$col2,$col3,$col4,$col5,$col6,$col7)
        ->whereBetween('query_date',[$request->from,$request->dateto])
        ->where('skid',[$request->roskid])
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
        $secondary_xaxis=array();

        foreach ($dex as $row){
            array_push($x_axis,$row->query_date);
            if($bay1=='true'){array_push($line1,$row->$col1);}
            if($bay2=='true'){array_push($line2,$row->$col2);}
            if($bay3=='true'){array_push($line3,$row->$col3);}
            if($bay4=='true'){array_push($line4,$row->$col4);}
            if($bay5=='true'){array_push($line5,$row->$col5);}
            if($bay6=='true'){array_push($line6,$row->$col6);}
            if($bay7=='true'){array_push($line7,$row->$col7);}
            if(!empty($row->cip_2)){$cipData = $row->cip_1.' + '.$row->cip_2;}else{$cipData = $row->cip_1;}
            array_push($secondary_xaxis,$cipData);
            $stream = [$x_axis,$line1,$line2,$line3,$line4,$line5,$line6,$line7,$secondary_xaxis];
        }
return json_encode($stream);

        
    }
}
