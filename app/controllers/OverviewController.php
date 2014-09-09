<?php

class OverviewController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /overview
	 *
	 * @return Response
	 */
	public function index()
	{
		//get CDN Control overview
        return View::make('admin.overview')->with(['totalapps' => Application::all()->count(),'totalplugins' => Plugin::all()->count()]);
	}

}