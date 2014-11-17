<?php

use YomiTrack\Forms\Admin;
use YomiTrack\Forms\FormValidationException;

class AdminController extends \BaseController {

    protected $adminForm;

    /**
     * @param Admin $adminForm
     */
    function __construct(Admin $adminForm)
    {
        $this->adminForm = $adminForm;
    }

    /**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function index() {
        $users = User::paginate(5);
		return View::make('admin.index', [
            'users' => $users
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin
	 *
	 * @return Response
	 */
	public function store()
	{
        $this->adminForm->validate(Input::all());
        $user = new User();
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));

        $user->save();

        $user_id = $user->id;

		$restaurant = new Restaurant();

        $restaurant->user_id = $user_id;
        $restaurant->name = Input::get('name');
        $restaurant->description = Input::get('description');
        $restaurant->address = Input::get('address');
        $restaurant->latitude = Input::get('latitude');
        $restaurant->longitude = Input::get('longitude');
        $restaurant->radius = Input::get('radius');
        $restaurant->email = Input::get('rest_email');
        $restaurant->tel = Input::get('tel');
        $restaurant->rate = 4.8;
        $restaurant->photo1 = 'http://lorempixel.com/750/480/food/';
        $restaurant->photo2 = 'http://lorempixel.com/751/480/food/';
        $restaurant->photo3 = 'http://lorempixel.com/752/480/food/';
        $restaurant->photo4 = 'http://lorempixel.com/753/480/food/';
        $restaurant->photo5 = 'http://lorempixel.com/754/480/food/';

        $restaurant->save();

        return Redirect::to('admin');
	}

	/**
	 * Display the specified resource.
	 * GET /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
        $restaurant = $user->restaurant;
        return View::make('admin.edit', [
            'user'       => $user,
            'restaurant' => $restaurant
        ]);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $this->adminForm->validate(Input::all());
        $user = User::find($id);
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));

        $user->save();

        $restaurant = $user->restaurant;
        $restaurant->name = Input::get('name');
        $restaurant->description = Input::get('description');
        $restaurant->address = Input::get('address');
        $restaurant->latitude = Input::get('latitude');
        $restaurant->longitude = Input::get('longitude');
        $restaurant->radius = Input::get('radius');
        $restaurant->email = Input::get('rest_email');
        $restaurant->tel = Input::get('tel');
        $restaurant->rate = 4.8;
        $restaurant->photo1 = 'http://lorempixel.com/750/480/food/';
        $restaurant->photo2 = 'http://lorempixel.com/751/480/food/';
        $restaurant->photo3 = 'http://lorempixel.com/752/480/food/';
        $restaurant->photo4 = 'http://lorempixel.com/753/480/food/';
        $restaurant->photo5 = 'http://lorempixel.com/754/480/food/';

        $restaurant->save();
        return Redirect::to('admin');
    }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user = User::find($id);
        $user->delete();
        //$restaurant = $user->restaurant;
        return Redirect::to('admin');
	}

}