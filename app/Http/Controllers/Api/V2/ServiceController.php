<?php 

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;

class ServiceController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$disk = \Storage::disk('local');
		
		echo json_encode(array(1,2,3,4,5));
	}
	
	public function create()
	{
		$input = \Request::input('token');
		echo json_encode(array('token' => $input. "_V2"));
	}
	
	public function store()
	{
		$disk = \Storage::disk('local');
		if (\Storage::exists('X2.log'))
		{
		    $disk->append("X2.log", "Salvouuuu");
		}else{
			$disk->put("X2.log", "Isso é aqui");
		}
		echo json_encode(array(200));
	}
	
	public function show($id)
	{
		$input = \Request::input('token');
		return $id;
	}
	
	public function edit()
	{
		$input = \Request::input('token');
		return $input . '_EDITADO';
	}
	
	public function update($id)
	{
		
		$disk = \Storage::disk('local');
		$disk->put("exemplo2.log", "Salvouuuu");
		$input = \Request::input('user_id');
		return $input . '_ATUALIZADO_' . $id;
	}
	
	public function destroy($id)
	{
		echo json_encode(array('DELETE'));
	}
}
