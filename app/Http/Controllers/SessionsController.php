<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = \request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            if (auth()->user()->notDisabled()) {
                session()->regenerate();
                return redirect('/')
                    ->with('success', 'Welcome, ' . auth()->user()->name . '!');
            } else {
                $this->destroy();
                return back()
                    ->with('success', 'Your account is disabled!');
            }
        }

        // failed
        return back()
            ->withInput()
            ->withErrors(['email' => 'Your credentials are wrong']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Successfully logout');
    }
}
