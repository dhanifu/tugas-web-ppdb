<?php

use Illuminate\Support\Facades\Auth;

function getName()
{
    $role = Auth::user()->roles[0]->name;
    $name = '';

    if ($role == 'admin') {
        $name = Auth::user()->admin->name;
    }
    if ($role == 'siswa') {
        $name = Auth::user()->siswa->name;
    }

    return $name;
}

function getHome()
{
    if (Auth::user()->roles[0]->name == 'admin') {
        return route('admin.home');
    }
    if (Auth::user()->roles[0]->name == 'siswa') {
        return route('siswa.home');
    }
}
