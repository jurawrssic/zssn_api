<?php

namespace App\Http\Controllers;  
use Illuminate\Http\Request;
use App\Models\Survivor;
  
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trade');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request){
        $data = Survivor::where("name","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }
}