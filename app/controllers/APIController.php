<?php

class APIController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /api
	 *
	 * @return Response
	 */
	public function js($id)
	{
        $js = "";

        foreach(Application::find($id)->versions()->get() as $version)
        {
            $js = $js . $version->js;
        }

        return $js;
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /api/create
	 *
	 * @return Response
	 */
	public function css($id)
	{
        $css = "";

        foreach(Application::find($id)->versions()->get() as $version)
        {
            $css = $css . $version->css;
        }

        return $css;
	}

}