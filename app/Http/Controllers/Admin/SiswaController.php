<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class SiswaController extends Controller
{
    private $siswa;

    public function __construct()
    {
        $this->siswa = new Siswa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = $this->siswa->latest()->paginate(15);
        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $user = User::find($siswa->user_id);
        $jurusan = Jurusan::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('admin.siswa.edit', compact('siswa', 'user', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            'name' => 'required',
            'nis' => 'required|min:8|max:8|unique:siswas,nis,' . $siswa->id,
            'kelas' => 'required|in:10,11,12',
            'jk' => 'required|in:L,P',
            'tgl_lahir' => 'required',
            'temp_lahir' => 'required|string',
            'alamat' => 'required|string',
            'jurusan_id' => 'required|exists:jurusans,id',
            'asal_sekolah' => 'required',
        ]);

        $siswa->update([
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

        return redirect()->route('admin.siswa.index')->with('success', 'Berhasil Mengedit Siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $user = User::find($siswa->user_id);

        $user->delete();
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Berhasil Menghapus Siswa');
    }

    public function printPdf()
    {
        $students = $this->siswa->all();

        $pdf = PDF::loadview('siswa.pdf', compact('students'));
        return $pdf->download('laporan-pdf.pdf');
    }
}
