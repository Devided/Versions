<?php

class VersionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /version
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /version/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.plugins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /version
	 *
	 * @return Response
	 */
    public function store()
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

        $app = new Application;
        $app->name = Input::get('name');
        $app->url = Input::get('url');
        $app->active = true;
        $app->save();

        return Redirect::action('applications.index')->withSuccess('Application created.');
    }

	/**
	 * Display the specified resource.
	 * GET /version/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show($id)
    {
        if($plugin = Plugin::find($id))
        {
            return View::make('admin.plugins.show')->with(['plugin' => Plugin::find($id)]);
        }
    }

	/**
	 * Show the form for editing the specified resource.
	 * GET /version/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function edit($id)
    {
        if($plugin = Plugin::find($id))
            return View::make('admin.applications.edit')->with(['app' => Application::find($id)]);
    }

	/**
	 * Update the specified resource in storage.
	 * PUT /version/{id}
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
	 * DELETE /version/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}