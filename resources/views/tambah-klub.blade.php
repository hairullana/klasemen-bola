@extends('template')

@section('body')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Tambah Klub</h5>

            @if (Session::has('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('tambah-klub-action') }}">
                @csrf
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Klub</label>
                    <div class="col-sm-10">
                        <input required type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="nama klub" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kota" class="col-sm-2 col-form-label">Kota Klub</label>
                    <div class="col-sm-10">
                        <input required type="text" id="kota" name="kota" class="form-control @error('kota') is-invalid @enderror" placeholder="kota klub" value="{{ old('kota') }}">
                        @error('kota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
