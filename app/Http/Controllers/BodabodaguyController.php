<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bodabodaguy;
use App\shoppedcart;
use DB;

class BodabodaguyController extends Controller
{

	function save(Request $req)
	{
		 

		$name = $req->input('name');
		 
		$email = $req->input('email');
		$platenumber = $req->input('platenumber');
        $password=$req->input('password');
	 
         
		$data = array('name'=>$name,'email'=>$email,'platenumber'=>$platenumber,'password'=>$password);

		DB::table('Bodabodaguys')->insert($data);

		return response('success');


 
	}

function editboda(Request $req)
{
		$email = $req->input('email');
        $checkdata = bodabodaguy::where('email',$email)->get();
        //return response()->json($checkdata);
        $data = json_decode($checkdata, true);
         if (!empty($data))
		{
			$name = $req->input('name');
		 
		$email = $req->input('email');
		$platenumber = $req->input('platenumber');
        $password=$req->input('password');
	 
       
		$data = array('name'=>$name,'email'=>$email,'platenumber'=>$platenumber,'password'=>$password);

		DB::table('Bodabodaguys')->where('email',$email)->update($data);

		return response('success');

		}
		else
		{
			return response('user does not exist');

		}
    }

    function delete(Request $req)
    {
	$email = $req->input('email');

	DB::table('Bodabodaguys')->where('email',$email)->delete();
    }

	public function showusers()
	{
		$data = bodabodaguy::all();

		return response()->json($data);

	}


	public function loginbodauser(Request $req)
	{
	  $email=$req->input('email');
      $password=$req->input('password');

      $user = bodabodaguy::table('Bodabodaguys')->where('email',$email)->where('password',$password)->get();
      $checkdata = json_decode($user, true);
       if (!empty($data))
        {
        	return response('success');
        }
        else
      {
      	return response('error');
      }


         
    }
  

     

	
	public function myaccount(Request $req)
	{
		$email = $req->input('email');

		$data = bodabodaguy::where('email',$email)->get();

		return response()->json($data);

	}

	public function deliveries(Request $req)
	{
		$boda_id = $req->input('boda_id');

		$data = bodabodaguy::where('boda_id',$boda_id)->get();

		return response()->json($data);
	}
	function assigneddelivery(Request $req)
	{
		$boda_id =$req->input('boda_id');

		$data = shoppedcart::where('boda_id',$boda_id)->get();

		return response()->json($data);

	}

   
}

    //

