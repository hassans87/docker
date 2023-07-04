<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataExport extends Controller
{

    function dataMainpage(){ 
    return view('veolink_care_export');
}
}
