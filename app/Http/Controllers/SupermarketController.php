<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\supermarket;
use App\supermarketitem;
use DB;

class SupermarketController extends Controller
{

	function save(Request $req)
	{
	 

		$name = $req->input('name');
		$latitude = $req->input('latitude'); 
		$longitude =$req->input('longitude');
		//$email = $req->input('email');
        $password=$req->input('password');
		 
  
       // $password_hash= Hash::make('password');
		$data = array('name'=>$name,'latitude'=>$latitude,'longitude'=>$longitude,'password'=>$password);

		DB::table('supermarkets')->insert($data);
		return response('success');
 
		 
	}

	function viewsupermarkets()
	{
		$data = supermarket::all();

		return response()->json($data);
	}
	function viewnearsupermarket(Request $req)
	{
		$latitude = $req->input('latitude');
		$longitude = $req->input('longitude');
		$data = supermarket::where('latitude',$latitude)->where('longitude',$longitude)->get();

		return response()->json($data);

	}
	function delete(Request $req)
	{
    $super_id = $req->input('super_id');


    	DB::table('supermarkets')->where('super_id',$super_id)->delete();

      return response('deleted');
	}


	//add items

 


	function saveitem(Request $req)
	{
	 

		$name = $req->input('name');
		$available_number = $req->input('available_number'); 
		$category =$req->input('category');
		 $super_id =$req->input('super_id');
		 $price =$req->input('price');
		  
		$data = array('name'=>$name,'available_number'=>$available_number,'category'=>$category,'super_id'=>$super_id,'price'=>$price);

		DB::table('supermarketitems')->insert($data);

		return response('success');
 
		 
	}
	function updateitem(Request $req)
	{
		$item_id = $req->input('item_id');
		$name = $req->input('name');
		$available_number = $req->input('available_number'); 
		$category =$req->input('category');
		 $super_id =$req->input('super_id');
		 $price =$req->input('price');
		$checkdata = supermarketitem::where('item_id',$item_id)->get();

		$checkdatadecoded = json_decode($checkdata);

		if(! empty($checkdatadecoded))
        {
       

		$data = array('name'=>$name,'available_number'=>$available_number,'category'=>$category,'super_id'=>$super_id,'price'=>$price);

		DB::table('supermarketitems')->where('item_id',$item_id)->update($data);

		return response('success');

       }
	}
	function viewitem(Request $req)
	{
		$item_id = $req->input('item_id');

		$data = supermarketitem::where('item_id',$item_id)->get();

		return response()->json($data);

	}
	function viewallitems()
	{
		$data = supermarketitem::all();

		return response()->json($data);
	}
	function deleteitem(Request $req)
	{
		$item_id = $req->input('item_id');
		//code to delete

		DB::table('supermarketitems')->where('item_id',$item_id)->delete();
		return response('deleted');

	}
    //
}
