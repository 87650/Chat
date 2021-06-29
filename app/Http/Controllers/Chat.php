<?php

namespace App\Http\Controllers;

use App\Models\channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Chat extends Controller
{
    function chat(){
        //$user = Auth::user()->name();
      return view('chat.chat');
    }
    function chennal(){
        $results = DB::select('select * from channel ');
        return ['body' => $results];
    }
    function chanal(Request $request){

       $input = $request->name;
        $input1 = $request->img;
        DB::insert("insert into channel (name, img) values (?, ?)", [$input, $input1]);
    }
    function chennal1(){
        $results = DB::select('select * from messages ');
        return ['message' => $results];
    }
    function mes(Request $request){

        $input = $request->log;
        $input1 = $request->mes;
        $input2 = $request->chan;
        DB::insert("insert into messages (login, message,channel) values (?, ?, ?)", [$input,$input1,$input2]);
    }
}
