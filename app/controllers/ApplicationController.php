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
        //check applications for high or medium risk
        $applications = DB::table('applications')
            ->join('application_version', 'applications.id', '=', 'application_version.application_id')
            ->join('versions', 'application_version.version_id', '=', 'versions.id')
            ->select('applications.name','applications.id','applications.url','versions.risk')
            ->where('versions.risk', '>' , '1')
            ->paginate('10');

		return View::make('admin.applications.index')->with('applications', $applications);
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
        $rules = [
            'name'  => 'required|min:3',
            'url'   => 'required|active_url'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator->messages());
        }

        $app = new Application;
        $app->name = Input::get('name');
        $app->url = Input::get('url');
        $app->save();

        return Redirect::action('application.show',[$app->id])->withSuccess('Application created.');
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
        if($app = Application::find($id))
        {
            $dangerplugin = Application::find($id)->versions()->orderBy('risk', 'desc')->first();
            if($dangerplugin)
                $risk = $dangerplugin->thread();
            else
                $risk = 'None';
            return View::make('admin.applications.show')->with(['app' => Application::find($id),'connectedPlugins' => Application::find($id)->versions()->paginate('10'), 'risk' => $risk]);
        }
        else
        {
            return Redirect::action('application.index')->withErrors(['Application does not exist.']);
        }
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
        if($app = Application::find($id))
            return View::make('admin.applications.edit')->with(['app' => Application::find($id)]);
        else
            return Redirect::action('application.index')->withErrors(['Application does not exist.']);
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
            'name'  => 'required|min:3',
            'url'   => 'required|active_url'
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

        return Redirect::action('application.show',[$id])->withSuccess('Application settings saved.');
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
     * Links a plugin to an application
     * GET /application/{appid}/link
     *
     * @param  int  $appid
     * @return Response
     */
    public function link($appid)
    {
        if(Application::find($appid))
            return View::make('admin.applications.link')->with(['app' => Application::find($appid), 'pluginlist' => Plugin::lists('name','id')]);
        else
            return Redirect::action('application.index')->withErrors(['Application does not exist.']);
    }

    /**
     * Links a plugin to an application
     * GET /application/{appid}/link
     *
     * @param  int  $appid
     * @return Response
     */
    public function storePlugin($appid)
    {
        intval($appid);
        $rules = [
            'plugin'  => 'required|integer'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator->messages());
        }

        if(Plugin::find(Input::get('plugin')))
            return Redirect::action('application.plugin.linkversion',[$appid,Input::get('plugin')]);
        else
            return Redirect::back()->withErrors(['Plugin does not exist.']);
    }

    /**
     * Links a version to an application
     * GET /application/{appid}/link/{pluginid}
     *
     * @param  int  $appid
     * @param  int  $pluginid
     * @return Response
     */
    public function linkVersion($appid, $pluginid)
    {
        if(Application::find($appid) && Plugin::find($pluginid))
            return View::make('admin.applications.linkversion')->with(['app' => Application::find($appid), 'plugin' => Plugin::find($pluginid), 'versionslist' => Plugin::find($pluginid)->versions()->lists('name','id')]);
        else
            return Redirect::action('application.index')->withErrors(['Application or plugin does not exist.']);
    }

    /**
     * Links a plugin to an application
     * GET /application/{appid}/link
     *
     * @param  int  $appid
     * @return Response
     */
    public function storeLink($appid,$pluginid)
    {
        intval($pluginid);
        intval($appid);
        $rules = [
            'version'  => 'required|integer'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator->messages());
        }

        if(Version::find(Input::get('version')) && Application::find($appid))
        {
            Application::find($appid)->versions()->attach(Input::get('version'));
            return Redirect::action('application.show',[$appid])->withSuccess('Plugin connected.');
        }
        else
            return Redirect::action('application.index')->withErrors(['Version or application does not exist.']);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /application/{appid}/{versionid}
     *
     * @param  int  $appid
     * @param  int  $versionid
     * @return Response
     */
    public function deleteLink($appid,$versionid)
    {
        Application::find($appid)->versions()->detach($versionid);
        return Redirect::action('ApplicationController@show',[$appid])->withSuccess('Plugin removed.');
    }


}