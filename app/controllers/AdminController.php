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
	public function index()
	{
		return View::make('admin.create');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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

        $photo1 = Input::file('photo1');
        $photo2 = Input::file('photo2');
        $photo3 = Input::file('photo3');
        $photo4 = Input::file('photo4');
        $photo5 = Input::file('photo5');

        $photo1->move(base_path().'/public/img');
        $photo2->move(base_path().'/public/img');
        $photo3->move(base_path().'/public/img');
        $photo4->move(base_path().'/public/img');
        $photo5->move(base_path().'/public/img');


        $restaurant->photo1 = $photo1->getRealPath();
        $restaurant->photo2 = $photo2->getRealPath();
        $restaurant->photo3 = $photo3->getRealPath();
        $restaurant->photo4 = $photo4->getRealPath();
        $restaurant->photo5 = $photo5->getRealPath();

        $restaurant->save();

        return 'Ve y checa si jala';
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
		//
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
		//
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
		//
	}

}