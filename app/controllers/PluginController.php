<?php

class PluginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /plugin
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin.plugins.index')->with('plugins', Plugin::paginate('10'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /plugin/create
	 *
	 * @return Response
	 */
    public function create()
    {
        return View::make('admin.plugins.create');
    }

	/**
	 * Store a newly created resource in storage.
	 * POST /plugin
	 *
	 * @return Response
	 */
    public function store()
    {
        $rules = [
            'name'  => 'required|min:3',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator->messages());
        }

        $plugin = new Plugin;
        $plugin->name = Input::get('name');
        $plugin->docurl = Input::get('docurl');
        $plugin->save();

        return Redirect::action('plugin.version.create',[$plugin->id]);
    }

	/**
	 * Display the specified resource.
	 * GET /plugin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show($id)
    {
        if($plugin = Plugin::find($id))
        {
            return View::make('admin.plugins.show')->with(['plugin' => Plugin::find($id), 'versions' => Plugin::find($id)->versions()->paginate('10')]);
        }
    }

	/**
	 * Show the form for editing the specified resource.
	 * GET /plugin/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function edit($id)
    {
        if($plugin = Plugin::find($id))
        {
            return View::make('admin.plugins.edit')->with(['plugin' => Plugin::find($id)]);
        }
    }

	/**
	 * Update the specified resource in storage.
	 * PUT /plugin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update($id)
    {
        $rules = [
            'name'  => 'required|min:3',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator->messages());
        }

        $plugin = Plugin::find($id);
        $plugin->name = Input::get('name');
        $plugin->docurl = Input::get('docurl');
        $plugin->save();

        return Redirect::action('plugin.show',[$plugin->id])->withSuccess('Plugin saved.');
    }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /plugin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $plugin = Plugin::find($id);
        $plugin->versions()->delete();
        $plugin->delete();

        return Redirect::back()->withSuccess('Plugin removed.');
	}

}