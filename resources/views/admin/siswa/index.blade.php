@extends('_layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Siswa
                    <div class="float-right">
                        <form action="{{ route('admin.siswa.pdf') }}" method="POST">
                            @csrf
                            <button class="btn btn-primary shadow">Print PDF</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <span>{{ session('success') }}</span>
                            <button class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>JK</th>
                                    <th>Asal Sekolah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswa as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $s->name }}</td>
                                        <td>{{ $s->nis }}</td>
                                        <td>{{ $s->kelas }}</td>
                                        <td>{{ $s->jurusan->name }}</td>
                                        <td>{{ $s->jk }}</td>
                                        <td>{{ $s->asal_sekolah }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success"
                                                onclick="document.location.href='{{ route('admin.siswa.edit', $s->id) }}'">
                                                Edit
                                            </button>
                                            <form action="{{ route('admin.siswa.destroy', $s->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger" onclick="return remove()">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" align="center"><strong>Kosong</strong></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
        const remove = function () {
            let x = confirm("Yakin untuk menghapus data ini?");
            if (x) return true;
            else return false;
        }
    </script>
@endpush