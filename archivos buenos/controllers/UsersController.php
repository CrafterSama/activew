<?php

class UsersController extends \BaseController {

	private $autorizado;
	public function __construct() {
		$this->autorizado = (Auth::check() and Auth::user()->role_id == 1);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!$this->autorizado) return Redirect::to('/login');
		$users  = 	User::where('id','!=',Auth::user()->id)->paginate(10);
		$roles 	= 	Role::all();
		foreach ($users as $user) {
			$rol 	= 	Role::find($user->role_id);	# code...
		}
		if(is_null($users))
		{
			return View::make('admin.users');
		}
		else
		{
			return View::make('admin.users')->with('users',$users)->with('roles',$roles)->with('rol',$rol);
		}		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!$this->autorizado) return Redirect::to('/login');
		$user = new User();
		return View::make('users.form')->with('user', $user);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(!$this->autorizado) return Redirect::to('/login');
		$user = new User();
		$user->full_name = Input::get('full_name');
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->role_id = Input::get('role_id');
		/*$user->active = true;*/
		$validator = User::validate(array(
			'full_name' => Input::get('full_name'),
			'username' => Input::get('username'),
			'email' => Input::get('email'),
			'password' => Input::get('password'),
			'role_id' => Input::get('role_id'),
		));
		if($validator->fails()){
			$errors = $validator->messages()->all();
			$user->password = null;
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
			$user->save();
			return Redirect::to('admin/usuarios')->with('notice', 'El usuario ha sido creado correctamente.');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(!$this->autorizado) return Redirect::to('/login');
		$user 	= 	User::find(Auth::user()->id);
		$idRol 	= 	$user->role_id;
		$rol 	= 	Role::find($idRol);
		return View::make('users.profile')->with('user', $user)->with('rol', $rol);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(!$this->autorizado) return Redirect::to('/login');
		$user = User::find($id);
		if (is_null ($user))
		{
			App::abort(404);
		}
		return View::make('users.form')->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(!$this->autorizado) return Redirect::to('/login');
		$user = User::find($id);
		$user->full_name = Input::get('full_name');
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->role_id = Input::get('role_id');
		if(is_null(Input::get('password')))
		{
			$password = $user->password;

		}
		else
		{
			$password = Hash::make(Input::get('password'));
		}
		$user->password = $password;
		$validator = User::validate(array(
			'full_name' => Input::get('full_name'),
			'username' => Input::get('username'),
			'email' => Input::get('email'),
			'password' => $password,				
			'role_id' => Input::get('role_id'), 
		), $user->id);
		if($validator->fails()){
			$errors = $validator->messages()->all();
			$user->password = null;
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
			$user->save();
			return Redirect::to('admin/usuarios')->with('notice', 'El usuario ha sido modificado correctamente.');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(!$this->autorizado) return Redirect::to('/login');
		$user = User::find($id);
		if ($user->id == Auth::user()->id) 
		{
			return Redirect::to('admin/usuarios')->with('notice', 'No puedes borrar tu propio usuario.');
		} 
		else 
		{
			if (is_null($user))
			{
				App::abort(404);
			}
		
			$user->forceDelete();
			
			if (Request::ajax())
			{
				return Response::json(array(
					'success' => true,
					'msg'	 => 'Usuario '.$user->full_name.' eliminado',
					'id'	 => $user->id
				));
			} 
			else 
			{
				return Redirect::back()->with('notice', 'El usuario ha sido eliminado correctamente.');	
			}
		}
	}
	public function showProfile($id)
	{
		$user 	= 	User::find($id);
		$idRol 	= 	$user->role_id;
		$rol 	= 	Role::find($idRol);
		return View::make('users.profile')->with('user', $user)->with('rol', $rol);
	}
	public function showRegister()
    {
        $user = new User();
    	return View::make('registration');
    }
    public function postRegister()
    {
		$user = new User();
		$user->full_name = Input::get('full_name');
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->role_id = 2;
   		$validator = User::validate(array(
			'full_name' => Input::get('full_name'),
			'username' => Input::get('username'),
			'email' => Input::get('email'),
			'password' => $user->password,
		), $user->id);
		if($validator->fails()){
			$errors = $validator->messages()->all();
			$user->password = null;
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
			$user->save();
			return Redirect::to('/registrarse')->with('notice', 'El usuario ha sido modificado correctamente.');
		}
    }
    public function bannedUsers()
    {
    	if(!$this->autorizado) return Redirect::to('/login');
    	$users = User::onlyTrashed()->get();
		$roles 	= 	Role::all();
		foreach ($users as $user) {
			$rol 	= 	Role::find($user->role_id);	# code...
		}
		if(is_null($users))
		{
			return View::make('users.banned');
		}
		else
		{
			return View::make('users.banned')->with('users',$users)->with('roles',$roles);
		}	

    }
    public function restoreUser($id)
    {
    	if(!$this->autorizado) return Redirect::to('/login');
    	$user = User::withTrashed()->where('id', $id)->restore();
    	/*var_dump($user);*/
    	/*$user->restore();*/
    	return Redirect::back()->with('notice', 'El usuario ha sido restaurado correctamente.');
    }

}
