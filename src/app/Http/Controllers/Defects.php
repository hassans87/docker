<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Defects extends Controller

{
    // load new defect view
    public function defectMainView()
    {
        return view('defects_menu');
    }
    // load new defect view
    public function newDefectView()
    {
        return view('add_new_defect');
    }
    // Create New Defect
    public function addNewDefectData(Request $request)
    {
        $formFields = $request->validate([
            'area' => ['required', 'min:3'],
            'equipment' =>  ['required', 'min:3', 'string', 'max:255'],
            'tag' => ['required', 'min:3'],
            'pidnumber' => ['required', 'min:3'],
            'raised_by' => ['required', 'min:3'],
            'file1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        DB::table('new_defects')->insert([
            'i_date' => $request->event_date,
            'area' => strtoupper($request->area),
            'equipment' => strtoupper($request->equipment),
            'tag' => strtoupper($request->tag),
            'pid_number' => strtoupper($request->pidnumber),
            'description' => strtoupper($request->desciption),
            'raised_by' => strtoupper($request->raised_by),
            'updated_by' => strtoupper($request->raised_by),
        ]);
        if ($request->hasFile('file1')) {
            $imageName = time() . '.' . $request->file1->extension();
            $request->file1->move(public_path('images'), $imageName);
        }

        return redirect('/raw_defects_list')->with('message', 'New defect has been created');
    }
    //raw defects list
    public function rawDefectsList()
    {
        $dex = DB::table('new_defects')
            ->orderBy('i_date', 'desc')
            ->get();
        return view('raw_defects_list', ["dex" => $dex]);
    }
    public function defectReviewLoading(Request $request)
    {
        $dex = DB::table('new_defects')
            ->where('sr', '=', $request->id)
            ->get();
        return view('raw_defect_review', ["dex" => $dex]);
    }

    public function mdrfDefectsList()
    {
        $dex = DB::table('defect_cm_db')
            ->orderBy('i_date', 'desc')
            ->limit('100')
            ->get();
        return view('mdrf_defect_list', ["dex" => $dex]);
    }
    public function ReviewMDRFLoading(Request $request)
    {
        $defectqry = $request->id;
        $defectMaxRange = intval(DB::table('defect_cm_db')->count());
        if ($defectqry < 1) {
            return redirect('/mdrfReview/1')->with('message', "{$defectqry} out of Databse range !");
        }
        if ($defectqry > $defectMaxRange) {
            return redirect('/mdrfReview/' . $defectMaxRange)->with('message', "{$defectqry} out of Database range !");
        } else {
            $dex = DB::table('defect_cm_db')
                ->where('mdrf_nb', '=', $defectqry)
                ->get();
            return view('mdrf_view', ["dex" => $dex]);
        }
    }
}
