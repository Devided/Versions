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
        return 'ok';
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /version/create
	 *
	 * @return Response
	 */
	public function create($pluginid)
	{
		return View::make('admin.version.create')->with(['plugin' => Plugin::find($pluginid)]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /version
	 *
	 * @return Response
	 */
    public function store($pluginid)
    {
        $rules = [
            'name'  => 'required|min:1'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator->messages());
        }

        $version = new Version;
        $version->name = Input::get('name');
        $version->js = Input::get('js');
        $version->css = Input::get('css');
        $version->save();

        return Redirect::action('plugin.show',[$pluginid])->withSuccess('Version created.');
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