<?php

namespace App\Http\Controllers\atlas\requirements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atlas\Requirements\StudentRequirement;
use Illuminate\Http\Client\ResponseSequence;

class StudentRequirementController extends Controller
{
    public function index(){
        $req = StudentRequirement::all();
        // dd($req->toArray());

        return response()->json($req);        
    }
}
