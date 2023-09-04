<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class RO1Normalisation extends Controller
{
    public function viewRO1Normalization()
    {
        $userx = Auth::user()->name;
        $dex = DB::table('user_pref')->select('pref')
            ->where('page_id', '=', 'ro1_norm')
            ->where('user_name', '=', $userx)
            ->exists();
        if ($dex) {
            $userx = Auth::user()->name;
            $dex = DB::table('user_pref')->select('pref')
                ->where('page_id', '=', 'ro1_norm')
                ->where('user_name', '=', $userx)
                ->get();
            return view('ro1_normalisation', ["dex" => $dex]);
        } else {
            $dexs = DB::table('user_pref')->select('pref')
                ->where('page_id', '=', 'ro1_norm')
                ->where('user_name', '=', 'Sajid Hassan')
                ->get();
            return view('ro1_normalisation', ["dex" => $dexs]);
        }
    }
    public function ro1DataExpView()
    {
        $userx = Auth::user()->name;
        $dex = DB::table('user_pref')->select('pref')
            ->where('page_id', '=', 'ro1_norm')
            ->where('user_name', '=', $userx)
            ->exists();
        if ($dex) {
            $userx = Auth::user()->name;
            $dex = DB::table('user_pref')->select('pref')
                ->where('page_id', '=', 'ro1_norm')
                ->where('user_name', '=', $userx)
                ->get();
            return view('ro1_dataexport', ["dex" => $dex]);
        } else {
            $dexs = DB::table('user_pref')->select('pref')
                ->where('page_id', '=', 'ro1_norm')
                ->where('user_name', '=', 'Sajid Hassan')
                ->get();
            return view('ro1_dataexport', ["dex" => $dexs]);
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
        $target_skid = '41' . $request->roskid . '_normalization';
        $dex = DB::table($target_skid)->select('query_date','hp_pump_ft101','full_flushing', 'membrane_flushing', 'dbna_flushing', 'cip', $data1, $data2, $data3, $data4, $data5, $data6, $data7)
            ->whereBetween('query_date', [$request->from." 00:00:00",$request->dateto." 23:59:00"])
            ->orderBy('query_date', 'asc')
            ->get();
        $x_axis = array();
        $line1 = array();
        $line2 = array();
        $line3 = array();
        $line4 = array();
        $line5 = array();
        $line6 = array();
        $line7 = array();
        $line8 = array();
        $data_check1 = ($bay1 and ($data1 == 'full_flushing' || $data1 == 'membrane_flushing' || $data1 == 'dbna_flushing' || $data1 == 'cip')) ? $data_check = true : false;
        $data_check2 = ($bay2 and ($data2 == 'full_flushing' || $data2 == 'membrane_flushing' || $data2 == 'dbna_flushing' || $data2 == 'cip')) ? $data_check = true : false;
        $data_check3 = ($bay3 and ($data3 == 'full_flushing' || $data3 == 'membrane_flushing' || $data3 == 'dbna_flushing' || $data3 == 'cip')) ? $data_check = true : false;
        $data_check4 = ($bay4 and ($data4 == 'full_flushing' || $data4 == 'membrane_flushing' || $data4 == 'dbna_flushing' || $data4 == 'cip')) ? $data_check = true : false;
        $data_check5 = ($bay5 and ($data5 == 'full_flushing' || $data5 == 'membrane_flushing' || $data5 == 'dbna_flushing' || $data5 == 'cip')) ? $data_check = true : false;
        $data_check6 = ($bay6 and ($data6 == 'full_flushing' || $data6 == 'membrane_flushing' || $data6 == 'dbna_flushing' || $data6 == 'cip')) ? $data_check = true : false;
        $data_check7 = ($bay7 and ($data7 == 'full_flushing' || $data7 == 'membrane_flushing' || $data7 == 'dbna_flushing' || $data7 == 'cip')) ? $data_check = true : false;
        $flushing_check = ($data_check1 || $data_check2 || $data_check3 || $data_check4 || $data_check5 || $data_check6 || $data_check7) ? true : false;
        $date_interval = strtotime("2016-01-01 15:18:00");
        foreach ($dex as $row) {
            $ff = (int)$row->full_flushing;
            $mf = (int)$row->membrane_flushing;
            $df = (int)$row->dbna_flushing;
            $cf = (int)$row->cip;
            $is_running = (int)$row->hp_pump_ft101;
            $ddf = abs(strtotime($row->query_date) - $date_interval) / 3600;
            
                
           
            if (($ddf >= $dinvt and $is_running >= 100) or ($flushing_check and ($ff > 0.5 or $mf > 0.5 or $df > 0.5 or $cf > 0.5))) 
            {
                array_push($x_axis, $row->query_date);
                if ($bay1 == 'true') {
                    array_push($line1, $row->$data1);
                }
                if ($bay2 == 'true') {
                    array_push($line2, $row->$data2);
                }
                if ($bay3 == 'true') {
                    array_push($line3, $row->$data3);
                }
                if ($bay4 == 'true') {
                    array_push($line4, $row->$data4);
                }
                if ($bay5 == 'true') {
                    array_push($line5, $row->$data5);
                }
                if ($bay6 == 'true') {
                    array_push($line6, $row->$data6);
                }
                if ($bay7 == 'true') {
                    array_push($line7, $row->$data7);
                }
                array_push($line8, $row->hp_pump_ft101);
                $stream = [$x_axis, $line1, $line2, $line3, $line4, $line5, $line6, $line7,$line8];
                $date_interval = strtotime($row->query_date); 
            }
            
        }
        return json_encode($stream);
    }
    public function ro1CIP()
    {
        $dex = DB::table('setting')
            ->where('target_page', 'ro_cip_log')
            ->get();
        // json_decode($details, true);
        // $dex=  json_decode($dex, true);
        // $dex=implode(",",$dex);
        //return view('ro1_cip_log', compact('dex'));
        return view('ro1_cip', ["dex" => $dex]);
        // return view('ro1_cip_log')->with('dex', $dex);
        //return view('ro1_cip_log', ["dex"=>$dex]);
    }

    function ro1DataExportTable(Request $request)
    {
        try {
            $resultx = DB::table('41'.$request->skid_tag.'_normalization')
                ->whereBetween('query_date', [$request->date1, $request->date2])
                ->orderBy('query_date', $request->ord)
                ->get();

            $total_row = $resultx->count();
            if ($total_row > 0) {
                $row = '';
                $sr = 1;
                $row .= '
            <div class="table-responsive">
            <table id="myTable" class="display hover compact row-border stripe nowrap" style="text-align:center; width:100%;">
            <thead>
            <tr >
            <th style="width:10px; word-wrap: break-word;"></th>
            <th style="width:20px; word-wrap: break-word;">🗓️</th>
            <th >Status </th>
            <th class="cll">Front Permeate Flow</th>
            <th class="cll">Rear Permeate Flow</th>
            <th class="cll">Hp pump Flow</th>
            <th class="cll">ERI out Flow-203</th>
            <th class="cll">ERI In Flow-207 </th> 
            <th class="cll">Over Flush</th>
            <th class="cll">ERI HP out EC</th>
            <th class="cll">ERI HP in EC</th>
            <th class="cll">ERI Mixing %</th>
            <th class="cll">Brine Flow</th>
            <th class="cll">Feed Pressure PT-108</th>
            <th >Brine Pressure </th>
            <th >Permeate Pressure  </th>
            <th >Feed TDS  </th>
            <th >Feed EC  </th> 
            <th >Front Permeate TDS  </th> 
            <th >Rear Permeate TDS  </th> 
            <th >Rear Permeate EC-301  </th> 
            <th >Front Permeate EC-303  </th> 
            <th >EC Average </th> 
            <th >TDS Average </th> 
            <th >Temperature C🌡️  </th> 
            <th >Temperature F🌡️   </th> 
            <th >Feed Temp. TIT-212 🌡️ </th> 
            <th >Feed Flow  </th> 
            <th >Days of Ops  </th> 
            <th >Recovery  </th> 
            <th >DPI  </th> 
            <th >Temp. Correction Factor  </th> 
            <th >Feed/Brine Avg Calc.  </th> 
            <th >Feed/Brine Osmatic Pressure  </th> 
            <th >Permeate Osmatic Pressure  </th> 
            <th > Net Driving Pressure  </th> 
            <th >Normalized Permeate Flow  </th> 
            <th >Salt Passage  </th> 
            <th >Salt Rejection </th> 
            
            </tr> 
                </thead><tbody >';
                $dinvt = 1;
                $date_interval = strtotime("2016-01-01 15:18:00");
                foreach ($resultx as $result) {
                    $ddf = abs(strtotime($result->query_date) - $date_interval) / 3600;
                    $status = "";
                if($result->rear_permeate_ft905>100){ $status="ONLINE"; $dde="green";}
                if(trim($result->full_flushing)==2){ $status="Full Flushing"; $dde="ff";}
                if(trim($result->membrane_flushing)==1){ $status="Memb. Flushing"; $dde="mf"; }
                if(trim($result->dbna_flushing)==4){ $status="DBNPA Flushing"; $dde="dbn"; }
                if(trim($result->cip)==3){ $status="CIP"; $dde="cip";}
                    if (true) {
                        $row .= '
            <tr>
            <td style="width:10px;">' . $sr . '</td>  
            <td style="width: 20px; word-wrap: break-word;">' . date_format(date_create($result->query_date), "d/m/Y H:i") . '</td>
            <td class="'.$dde.'">'.$status .'</td>
            <td class="cll">' . $result->front_permeate_ft_305 . '</td>
            <td class="cll">' . $result->rear_permeate_ft905 . '</td> 
            <td class="cll">' . $result->hp_pump_ft101 . '</td>
            <td class="cll">' . $result->eri_out_ft203 . '</td>
            <td class="cll">' . $result->eri_inlet_ft207 . '</td>
            <td class="cll">' . $result->overflush . '</td>
            <td class="cll">' . $result->eri_hp_out_cond_at306 . '</td>
            <td class="cll">' . $result->eri_hp_in_con_at206 . '</td>
            <td class="cll">' . $result->mixing_eri_calc . '</td>
            <td class="cll">' . $result->conc_flow_cal . '</td>
            <td class="cll">' . $result->feed_pres_pt108 . '</td>

            <td class="cll">' . $result->conc_pres_pt307 . '</td>
            <td class="cll">' . $result->per_pres_pt312 . '</td>
            <td class="cll">' . $result->feed_tds_calc . '</td>
            <td class="cll">' . $result->feed_cond_at211 . '</td>
            <td class="cll">' . $result->front_tds_calc . '</td>
            <td class="cll">' . $result->rear_tds_calc . '</td>
            <td class="cll">' . $result->rear_cond_at301 . '</td>
            <td class="cll">' . $result->front_cond_at303 . '</td>
            <td class="cll">' . $result->cond_average . '</td>
            <td class="cll">' . $result->tds_average . '</td>
            <td class="cll">' . $result->temp_calc . '</td>
            <td class="cll">' . $result->feed_temp . '</td>
            <td class="cll">' . $result->feed_temp_tit212 . '</td>
            <td class="cll">' . $result->feed_flow . '</td>
            <td class="cll">' . $result->days_operation . '</td>
            <td class="cll">' . $result->recovery . '</td>
            <td class="cll">' . $result->dpi_906 . '</td>
            <td class="cll">' . $result->temp_correc_fac . '</td>
            <td class="cll">' . $result->calc_feed_brine_avg . '</td>
            <td class="cll">' . $result->feed_brine_ro_press . '</td>
            <td class="cll">' . $result->per_ro_pres . '</td>
            <td class="cll">' . $result->net_driving_press . '</td>
            <td class="cll">' . $result->norm_perm_flow . '</td>
            <td class="cll">' . $result->norm_per_salt_pas . '</td>
            <td class="cll">' . $result->norm_per_salt_rej . '</td>
            </tr>
            ';
                        $sr++;
                        
                    }
                }
                '<tbody></table> </div>';
                return $row;
            } else {
                return "No Data Found!";
            }
        } catch (Exception $e) {
            return $e;
        }
    }
}
