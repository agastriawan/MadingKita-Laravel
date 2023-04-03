@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Mading Organisasi</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-info col-lg-10" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-12">
        <a href="/admin/organisasi/create" class="btn btn-primary mb-3">Insert</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pengirim</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($organisasi as $org)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $org->judul }}</td>
                        <td>{{ $org->pengirim }}</td>

                        <td>
                            <a href="/admin/organisasi/{{ $org->id }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a>

                            <a href="/admin/organisasi/{{ $org->id }}/edit" class="badge bg-success"><span
                                    data-feather="edit"></span>
                            </a>

                            {{-- DELETE --}}
                            <form action="/admin/organisasi/{{ $org->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Anda yakin ingin menghapus data?')"><span
                                        data-feather="trash-2"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </section>

    {{ $organisasi->withQueryString()->links('pagination::bootstrap-5') }}
@endsection
