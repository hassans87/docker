<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PageSettings extends Controller
{
    public function savePref(Request $request)
    {
        $userx = Auth::user()->name;
        $target_page = $request->dbpage;
        $rD = json_encode($request->all());
        $dex = DB::table('user_pref')->select('user_name', 'page_id', 'pref')
            ->where('page_id', '=', $target_page)
            ->where('user_name', '=', $userx)
            ->exists();
        if ($dex) {
            DB::table('user_pref')
                ->where('page_id', '=', $target_page)
                ->where('user_name', '=', $userx)
                ->update(['pref' => $rD]);
        } else {
            DB::table('user_pref')->insert([
                'page_id' => $target_page, 'user_name' => $userx, 'pref' => $rD
            ]);
        }
    }
}
