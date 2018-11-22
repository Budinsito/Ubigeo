<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ubigeoController extends Controller
{
   public function create(){

	   	$region=  DB::table('regions')->get();
	    return view('ubigeo',compact('region'));
   }


	public function BuscaProvincias(Request $request){

		$listprov = DB::table('provinces')->where('region_id', $request->varcodreg)->get();
		$provincias= $listprov;
		$data = ['provincias' => $provincias ] ;
		return response($data, 200)->header('Content-Type', 'text/plain');

	}


public function BuscaDistritos(Request $request){

$listdist = DB::table('districts')
->where('region_id', $request->varcodreg)
->where('province_id', $request->varcodprov)->get();

dd($listdist);
}

}
