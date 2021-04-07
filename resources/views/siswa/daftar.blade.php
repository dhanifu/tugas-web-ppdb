@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Form Pendaftaran') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('siswa.siswa-baru.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">{{ __('Name') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="email" class="col-md-2 col-form-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nis" class="col-md-2 col-form-label">{{ __('NIS') }}</label>

                            <div class="col-md-4">
                                <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="8">
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="kelas" class="col-md-2 col-form-label">{{ __('Kelas') }}</label>

                            <div class="col-md-4">
                                <select id="kelas" class="form-control @error('kelas') is-invalid @enderror" name="kelas">
                                    <option value="">-- Kelas --</option>
                                    <option value="10" {{old('kelas')=='10' ? 'selected' : ''}}>10</option>
                                    <option value="11" {{old('kelas')=='11' ? 'selected' : ''}}>11</option>
                                    <option value="12" {{old('kelas')=='12' ? 'selected' : ''}}>12</option>
                                </select>
                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jk" class="col-md-2 col-form-label">{{ __('Jenis Kelamin') }}</label>

                            <div class="col-md-4">
                                <select name="jk" id="jk" class="form-control @error('jk') is-invalid @enderror">
                                    <option value="">-- Jenis Kelamin --</option>
                                    <option value="L" {{old('jk')=='L' ? 'selected' : ''}}>Laki-laki</option>
                                    <option value="P" {{old('jk')=='P' ? 'selected' : ''}}>Perempuan</option>
                                </select>

                                @error('jk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="tgl_lahir" class="col-md-2 col-form-label">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-4">
                                <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir') }}">

                                @error('tgl_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="temp_lahir" class="col-md-2 col-form-label">{{ __('Tempat Lahir') }}</label>

                            <div class="col-md-4">
                                <input id="temp_lahir" type="text" class="form-control @error('temp_lahir') is-invalid @enderror" name="temp_lahir" value="{{ old('temp_lahir') }}">

                                @error('temp_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="alamat" class="col-md-2 col-form-label">{{ __('Alamat') }}</label>

                            <div class="col-md-4">
                                <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jurusan_id" class="col-md-2 col-form-label">{{ __('Jurusan') }}</label>

                            <div class="col-md-4">
                                <select name="jurusan_id" id="jurusan_id" class="form-control @error('jurusan_id') is-invalid @enderror">
                                    <option value="">-- Jurusan --</option>
                                    @foreach($jurusan as $j)
                                        <option value="{{ $j->id }}" {{old('jurusan_id')==$j->id ? 'selected' : ''}}>{{ $j->name }}</option>
                                    @endforeach
                                </select>

                                @error('jurusan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="asal_sekolah" class="col-md-2 col-form-label">{{ __('Asal Sekolah') }}</label>

                            <div class="col-md-4">
                                <input id="asal_sekolah" type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" value="{{ old('asal_sekolah') }}">

                                @error('asal_sekolah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="password-confirm" class="col-md-2 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-10">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                </button>
                                <button type="reset" class="btn btn-danger" title="Menghapus semua isi form">
                                    {{ __('Clear') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
