<?php

class ApplicationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /application
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.applications.index')->with('applications', Application::paginate('10'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /application/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.applications.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /application
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /application/{id}
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
	 * GET /application/{id}/edit
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
	 * PUT /application/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $rules = [
            'name'  => 'required|alphaNum|min:3',
            'url'   => 'required|alphaNum|active_url'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator->messages());
        }

        $app = Application::find($id);
        $app->name = Input::get('name');
        $app->url = Input::get('url');
        $app->save();

        return Redirect::back()->withSuccess('Application saved.');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /application/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$app = Application::find($id);
        $app->delete();

        return Redirect::back()->withSuccess('Application removed.');
	}


    /**
     *  Switch app status
     *  PATCH /applications/switch/{id}
     *
     * @param $id
     * @return mixed
     */
    public function status($id)
    {
        $app = Application::find($id);

        $app->active = !$app->active;

        if(!$app->save()) { Redirect::back()->withErrors('Error, please try again.'); }

        return Redirect::back()->withSuccess('Application status switched.');
    }

}