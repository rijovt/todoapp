<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todolist;

class TodolistController extends Controller
{
    public function index(){
        $lists= Todolist::orderBy('order')->get();
    
        return view('home')->with(['lists'=>$lists]);
    }

    public function update(Request $request){      
        foreach($request->lists as $list){            
            Todolist::where('id',$list['id'])->update(['order' => $list['order'] ]);
        }

        return response('Updated successfully',200);
    }
}
