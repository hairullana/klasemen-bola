@extends('template')

@section('body')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Single Match</h5>
        
                    <form>
                        <div class="row mb-3">
                            <div class="row mb-2">
                                <div class="col-sm-3">
                                    <select class="form-select form-select-sm" aria-label="Default select example">
                                        <option selected="">--select--</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" id="skor" class="form-control form-control-sm" value="0" min="0">
                                </div>
                                <div class="col-sm-2 d-flex justify-content-center fw-bold">
                                    vs
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" id="skor" class="form-control form-control-sm" value="0" min="0">
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-select form-select-sm" aria-label="Default select example">
                                        <option selected="">--select--</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Multiple Match</h5>
        
                    <form>
                        <div class="row mb-3" id="pertandingan-multiple">
                            <div class="row pertandingan-multiple mb-2">
                                <div class="col-sm-3">
                                    <select class="form-select form-select-sm" aria-label="Default select example">
                                        <option selected="">--select--</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" id="skor" class="form-control form-control-sm" value="0" min="0">
                                </div>
                                <div class="col-sm-2 d-flex justify-content-center fw-bold">
                                    vs
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" id="skor" class="form-control form-control-sm" value="0" min="0">
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-select form-select-sm" aria-label="Default select example">
                                        <option selected="">--select--</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <button type="button" id="tambah-pertandingan" class="btn btn-primary">Tambah Pertandingan</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#tambah-pertandingan').click(function() {
                $('.pertandingan-multiple').eq(0).clone().appendTo('#pertandingan-multiple');
            });
        });
    </script>
@endpush