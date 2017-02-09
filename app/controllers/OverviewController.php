<?php

class OverviewController extends \BaseController
{
    /**
     * Display a listing of the resource.
     * GET /overview.
     *
     * @return Response
     */
    public function index()
    {
        //check applications for high or medium risk
        $overview = DB::table('applications')
                        ->join('application_version', 'applications.id', '=', 'application_version.application_id')
                        ->join('versions', 'application_version.version_id', '=', 'versions.id')
                        ->select('applications.name', 'applications.id', 'applications.url', 'versions.risk')
                        ->where('versions.risk', '>', '1')
                        ->paginate('5');

        //make view and return it to the user
        return View::make('admin.overview')->with(['totalapps' => Application::all()->count(), 'totalplugins' => Plugin::all()->count(), 'overview' => $overview]);
    }
}
