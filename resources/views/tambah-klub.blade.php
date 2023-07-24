@extends('template')

@section('body')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Tambah Klub</h5>

            <form>
                <div class="row mb-3">
                    <label for="nama_klub" class="col-sm-2 col-form-label">Nama Klub</label>
                    <div class="col-sm-10">
                        <input type="text" id="nama_klub" class="form-control" placeholder="nama klub">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kota_klub" class="col-sm-2 col-form-label">Kota Klub</label>
                    <div class="col-sm-10">
                        <input type="text" id="kota_klub" class="form-control" placeholder="kota klub">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
