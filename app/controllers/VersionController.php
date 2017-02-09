<?php

class VersionController extends \BaseController
{
    /**
     * Display a listing of the resource.
     * GET /version.
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
     * GET /version/create.
     *
     * @return Response
     */
    public function create($pluginid)
    {
        return View::make('admin.version.create')->with(['plugin' => Plugin::find($pluginid)]);
    }

    /**
     * Store a newly created resource in storage.
     * POST /version.
     *
     * @return Response
     */
    public function store($pluginid)
    {
        $rules = [
            'name'  => 'required|min:1',
            'risk'  => 'required|min:1',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->messages());
        }

        $version = new Version();
        $version->name = Input::get('name');
        $version->plugin_id = intval($pluginid);
        $version->js = Input::get('js');
        $version->css = Input::get('css');
        $version->risk = Input::get('risk');
        $version->save();

        return Redirect::action('plugin.show', [$pluginid])->withSuccess('Plugin created.');
    }

    /**
     * Display the specified resource.
     * GET /version/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if ($plugin = Version::find($id)) {
            return View::make('admin.plugins.show')->with(['plugin' => Plugin::find($id)]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * GET /version/{id}/edit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($pluginid, $versionid)
    {
        return View::make('admin.version.edit')->with(['version' => Version::find($versionid), 'plugin' => Plugin::find($pluginid)]);
    }

    /**
     * Update the specified resource in storage.
     * PUT /version/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($pluginid, $versionid)
    {
        $rules = [
            'name'  => 'required|min:1',
            'risk'  => 'required|min:1',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->messages());
        }

        $version = Version::find($versionid);
        $version->name = Input::get('name');
        $version->js = Input::get('js');
        $version->css = Input::get('css');
        $version->risk = Input::get('risk');
        $version->save();

        return Redirect::action('plugin.show', [$pluginid])->withSuccess('Plugin updated.');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /version/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($pluginid, $versionid)
    {
        intval($versionid);
        intval($versionid);

        Version::find($versionid)->delete();

        return Redirect::action('PluginController@show', [$pluginid])->withSuccess('Version removed.');
    }
}
