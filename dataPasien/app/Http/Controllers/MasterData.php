<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterDataModel;

class MasterData extends Controller
{
    //Homepage
    function index($id="") {

        $todo = null;
        if($id != "") {
            $todo = MasterDataModel::find($id);
        }
        
        $tododata = MasterDataModel::all();
    
        return view('default')->with(['bankData' => $tododata, 'data' => $todo]);
    }
    //Delete
    function delete($id) {
        $todo =MasterDataModel::find($id);
    
        $todo->delete();
    
        return redirect()->route('default');
    }
    
    public function manage(Request $request)
    {
        if($request->id != 0) {
            $todo = MasterDataModel::find($request->id);
            $todo->nama = $request->nama;
            $todo->keluhan = $request->keluhan;
            $todo->save();
        }else{
            $todo = new MasterDataModel();
            $todo->nama = $request->nama;
            $todo->keluhan = $request->keluhan;
            $todo->save();
        }

        return redirect()->route('default');
    }
}