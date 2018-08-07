<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shoppedcart;
use DB;
 


class ShoppedcartController extends Controller
{
	function save(Request $req)
	{
	 

		$user_email = $req->input('user_email');
		$item = $req->input('item'); 
		$number =$req->input('number');
        $delivery_address=$req->input('delivery_address');
        $boda_id =$req->input('boda_id');
		
		$data = array('user_email'=>$user_email,'item'=>$item,'number'=>$number,'delivery_address'=>$delivery_address,'boda_id'=>$boda_id);

		DB::table('shoppedcarts')->insert($data);

		return response('success');
 
		 
	}
	function edit(Request $req)
	{
	   $shoppedcart_id = $req->input('shoppedcart_id');
       $checkdata = shoppedcart::where('shoppedcart_id',$shoppedcart_id)->get();
      // return response()->json($checkdata);
		if (! empty($checkdata)) {
			# code...
		$user_email = $req->input('user_email');
		$item = $req->input('item'); 
		$number =$req->input('number');
        $delivery_address=$req->input('delivery_address');
        $boda_id =$req->input('boda_id');
		
		$data = array('user_email'=>$user_email,'item'=>$item,'number'=>$number,'delivery_address'=>$delivery_address,'boda_id'=>$boda_id);

		DB::table('shoppedcarts')->where('shoppedcart_id',$shoppedcart_id)->update($data);
		return response('success');

		}
		else
		{
			return response('order does not exist');
		}
		 
	}
    function showcart(Request $req)
    {
    	$shoppedcart_id = $req->input('shoppedcart_id');

    	$data = shoppedcart::where('shoppedcart_id',$shoppedcart_id)->get();

    	return response()->json($data);

    }
    function viewall()
    {
    	$data = shoppedcart::all();

    	return response()->json($data);
    }
    function delete(Request $req)
    {
    	$shoppedcart_id = $req->input('shoppedcart_id');

    	DB::table('shoppedcarts')->where('shoppedcart_id',$shoppedcart_id)->delete();
    	//delete logic
    }
		
}
