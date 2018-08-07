<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use DB;

class CartController extends Controller
{
	function save(Request $req)
	{
	 

		$user_email = $req->input('user_email');
		$super_id = $req->input('super_id');
		$item = $req->input('item'); 
		$number =$req->input('number');
        $delivery_address=$req->input('delivery_address');
		
		$data = array('user_email'=>$user_email,'super_id'=>$super_id,'item'=>$item,'number'=>$number,'delivery_address'=>$delivery_address);

		DB::table('carts')->insert($data);

		return response('success');
 
		 
	}
	function edit(Request $req)
	{
		$cart_id = $req->input('cart_id');
        $checkdata = cart::where('cart_id',$cart_id)->get();
        //return response()->json($checkdata);
        $data = json_decode($checkdata, true);
         if (!empty($data))
		{
			//return response('not null');
			# code...
		$user_email = $req->input('user_email');
		$super_id = $req->input('super_id');
		$item = $req->input('item'); 
		$number =$req->input('number');
       $delivery_address=$req->input('delivery_address');
		
		$data = array('user_email'=>$user_email,'super_id'=>$super_id,'item'=>$item,'number'=>$number,'delivery_address'=>$delivery_address);

		DB::table('carts')->where('cart_id',$cart_id)->update($data);
		return response('sucess');


		}
		else
		{
			return response('order does not exist');
		}
		 
	}
    function showcart(Request $req)
    {
    	$cart_id = $req->input('cart_id');

    	$data = cart::where('cart_id',$cart_id)->get();

    	return response()->json($data);

    }
    function viewall()
    {
    	$data = cart::all();

    	return response()->json($data);
    }
    function delete(Request $req)
    {
    	$cart_id = $req->input('cart_id');


    	DB::table('carts')->where('cart_id',$cart_id)->delete();

      return response('deleted');
    	//delete logic
    }
    function viewsuppercart(Request $req)
    {
    	$super_id =$req->input('super_id');

    	DB::table('carts')->where('super_id',$super_id)->get();
    	


    }
		
}
