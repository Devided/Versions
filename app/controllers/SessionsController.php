<?php

class SessionsController extends \BaseController {

    /**
     * Show the login form.
     * @return Response
     */
    public function getLogin()
    {
        return View::make('auth.login');
    }

    /**
     * Log the user in.
     * @return Response
     */
    public function postLogin()
    {

        // Validate the login request
        $rules = array(
            'username'    => 'required|alphaNum|min:3',
            'password' => 'required|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);

        // If the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            // create our user data for the authentication
            $userdata = array(
                'username' 	=> Input::get('username'),
                'password' 	=> Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {
                //check if user has access and is no admin
                if(!Auth::user()->access && !Auth::user()->admin)
                {
                    Auth::logout();
                    return Redirect::to('login')->withErrors('Deze account is nog niet actief.');
                }
                else
                {
                    return Redirect::action('dashboard');
                }
            } else {
                // validation not successful, send back to form
                return Redirect::to('login')->withErrors('Gebruikersnaam of wachtwoord onjuist.');
            }

        }

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /sessions/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        Auth::logout();
        return Redirect::to('/');
    }

}