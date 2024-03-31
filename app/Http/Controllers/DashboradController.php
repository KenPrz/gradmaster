<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
class DashboradController extends Controller
{
    public function index(){
        if(auth()->user()->user_type_id == 1){
            return Inertia::render('StudentDashboard');
        }
        else if(auth()->user()->user_type_id == 2){
            return Inertia::render('ProfessorDashboard');
        }else{
            abort(500);
        }
    }
}
