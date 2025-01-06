<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Stockx extends Controller
{
        public function tasi_Stocks_KSA(Request $request)
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
                    $company = $request->datainvt;
                    $dex = DB::table('tasi_ksa_stocks')-> select('i_date',$col1,$col2,$col3,$col4,$col5,$col6,$col7)
                    ->whereBetween('i_date',[$request->from,$request->dateto])
                    ->where('company',[$company])
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
                    foreach ($dex as $row){
                        array_push($x_axis,$row->i_date);
                        if($bay1=='true'){array_push($line1,$row->$col1);}
                        if($bay2=='true'){array_push($line2,$row->$col2);}
                        if($bay3=='true'){array_push($line3,$row->$col3);}
                        if($bay4=='true'){array_push($line4,$row->$col4);}
                        if($bay5=='true'){array_push($line5,$row->$col5);}
                        if($bay6=='true'){array_push($line6,$row->$col6);}
                        if($bay7=='true'){array_push($line7,$row->$col7);}
                        $stream = [$x_axis,$line1,$line2,$line3,$line4,$line5,$line6,$line7];
                    }
            return json_encode($stream);           
                    
                }
} 
