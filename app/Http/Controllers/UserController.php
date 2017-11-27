<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */

class UserController extends Controller
{   
    
    public function getLink()
    {
        return view('users.index');
    }

    public function index(Request $request)
    {
        $users = User::orderBy('id','DESC')->paginate(7);
        return [
            'pagination' => [
                'total'         => $users->total(),
                'current_page'  => $users->currentPage(),
                'per_page'      => $users->perPage(),
                'last_page'     => $users->lastPage(),
                'from'          => $users->firstItem(),
                'to'            => $users->lastItem(),
            ],
            'users' => $users
        ];                   
    }

    public function create()
    {
        return view('users.add');   
    }

    public function edit($id)
    {
    	$user = User::findOrFail($id); 

    	return response()->json($user);
    }

    public function store(User $user, Request $request)
    {    	
        
    	$this->validate($request, [
			'cc'        => 'required',
			'firstname' => 'required|string|max:190',
			'lastname'  => 'required|string|max:190',
			'role'      => 'required|in:admin,edit,normal',
			'email'     => 'required|email|unique:users',
			'area'      => 'required|in:administracion,comercial,farmacia',
			'nick'      => 'required|string|max:10',
			'avatar'    => 'required',
			'password'  => 'required|min:6',
        ]);
    	
    	$user->create([
            'cc'        => $request->get('cc'),
            'firstname' => $request->get('firstname'),
            'lastname'  => $request->get('lastname'),
            'role'      => $request->get('role'),
            'email'     => $request->get('email'),
            'area'      => $request->get('area'),
            'nick'      => $request->get('nick'),
            'avatar'    => $request->get('avatar'),
            'password'  => bcrypt($request->get('password')),			
    	]);            
        
    	return Redirect()->back();
    }

    public function update(User $user, Request $request)
    {

    	$this->validate($request, [
			'cc'        => 'required',
			'firstname' => 'required|string|max:190',
			'lastname'  => 'required|string|max:190',
			'role'      => 'required|in:admin,edit,normal',
			'email'     => 'required|email',
			'area'      => 'required|in:administracion,comercial,farmacia',
			'nick'      => 'required|string|max:10',
			'avatar'    => 'required',
        ]);

        $user->cc        = $request->cc;
        $user->firstname = $request->firstname;
        $user->lastname  = $request->lastname;
        $user->role      = $request->role;
        $user->email     = $request->email;
        $user->area      = $request->area;
        $user->nick      = $request->nick;
        $user->avatar    = $request->avatar;       
    	
    	$user->update();
    	// $users = User::paginate(5);

    	// return view('users.list', compact('users'));
    }
}
