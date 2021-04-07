<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('siswa.daftar', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'nis' => 'required|min:8|max:8|unique:siswas',
            'kelas' => 'required|in:10,11,12',
            'jk' => 'required|in:L,P',
            'tgl_lahir' => 'required',
            'temp_lahir' => 'required|string',
            'alamat' => 'required|string',
            'jurusan_id' => 'required|exists:jurusans,id',
            'asal_sekolah' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $user->assignRole('siswa');

        $siswa = Siswa::create([
            'user_id' => $user->id,
            'nis' => $request->nis,
            'name' => $request->name,
            'jk' => $request->jk,
            'temp_lahir' => $request->temp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'kelas' => $request->kelas,
            'jurusan_id' => $request->jurusan_id,
        ]);

        $user->update([
            'pemilik_id' => $siswa->id
        ]);

        Auth::login($user);
        return redirect()->route('siswa.home');
    }
}
