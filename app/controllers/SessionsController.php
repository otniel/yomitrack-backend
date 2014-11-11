<?php

class SessionsController extends \BaseController {


	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
        if (Auth::check()) {
            return Redirect::to('dashboard');
        }
		return View::make('login');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
        // validate
		$input = Input::all();

        $attempt = Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ]);

        if($attempt) {
            return Redirect::intended('dashboard')->with('flash_message', 'You Have been logged in');
        }

        return Redirect::back()->withInput();
	}



	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

        return Redirect::to('login');
	}

}