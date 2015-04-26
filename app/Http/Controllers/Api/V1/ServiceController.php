<?php 

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;

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
		$users = User::all();
		if(is_null($users)) {
			$users = null;
		}
		echo json_encode(array('usuarios' => $users));
	}
	
	public function create()
	{
		$usuario = \Request::input('usuario');
		$password = \Request::input('password');
		//$password = \Hash::make($password);
		$email = \Request::input('email');
		
		$disk = \Storage::disk('local');
		
		$valor = \Request::all();
		foreach($valor as $i){
			
			$disk->append("X2.log", $i);
		}	
		
	
		/*$user = new User;
		$user->usuario = $usuario;
		$user->password = $password;
		$user->email = $email;
		$resp = $user->save();*/
		
		echo json_encode(array('token' => \Request::all(), 'resp' => true));
	}
	
	public function store()
	{
		
		$usuario = \Request::input('usuario');
		$password = \Request::input('password');
		//$password = \Hash::make($password);
		$email = \Request::input('email');
		
		$user = new User;
		$user->usuario = $usuario;
		$user->password = $password;
		$user->email = $email;
		$resp = $user->save();
		
		$disk = \Storage::disk('local');
		if (\Storage::exists('X2.log'))
		{
		    $disk->append("X2.log", "Salvouuuu");
		}else{
			$disk->put("X2.log", "Isso é aqui");
		}
		echo json_encode(array('resp' => $resp));
	}
	
	public function show($id)
	{
		$user = User::find($id);
		if(is_null($user)) {
			$user = null;
		}
		echo json_encode(array('usuario' => $user));
	}
	
	public function edit($id)
	{
		$resp = $this->atualizar_usuario($id);
		
		echo json_encode(array('resp' => $resp));
	}
	
	public function update($id)
	{
		$disk = \Storage::disk('local');
		$disk->put("exemplo2.log", "Salvouuuu");
		$input = \Request::input('user_id');
		
		$resp = $this->atualizar_usuario($id);
		
		echo json_encode(array('resp' => $resp));
	}
	
	public function destroy($id)
	{
		$user = User::find($id);
		if (!is_null($user)) {
			$user->delete();
		}
		
		echo json_encode(array('DELETE'));
	}
	
	public function atualizar_usuario($id)
	{
		$user = User::find($id);
		if (!is_null($user)) {
			$usuario = \Request::input('usuario');
			$password = \Request::input('password');
			$password = \Hash::make($password);
			$email = \Request::input('email');
			
			$user->usuario = $usuario;
			$user->password = $password;
			$user->email = $email;
			$resp = $user->save();	
		}
		
		return $resp;
	}
}
