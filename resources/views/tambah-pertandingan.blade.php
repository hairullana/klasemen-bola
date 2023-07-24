@extends('template')

@section('body')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Single Match</h5>
        
                    <form method="POST" action="{{ route('tambah-pertandingan-action') }}">
                        @csrf
                        <input type="hidden" name="jenis" value="Single">
                        <div class="row mb-3">
                            <div class="row mb-2">
                                <div class="col-sm-3">
                                    <select class="form-select form-select-sm" name="klub_kandang">
                                        @foreach ($klub as $item)
                                            <option name="klub_kandang" value="{{ $item->nama }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number"  id="goal" class="form-control form-control-sm" value="0" min="0" name="goal_kandang">
                                </div>
                                <div class="col-sm-2 d-flex justify-content-center fw-bold">
                                    vs
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" id="goal" class="form-control form-control-sm" value="0" min="0" name="goal_tandang">
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-select form-select-sm" name="klub_tandang">
                                        @foreach ($klub as $item)
                                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if (old('jenis') == 'Single')
                                    @error('klub_tandang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('klub_kandang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('goal_tandang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('goal_kandang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                @endif
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
        
                    <form method="POST" action="{{ route('tambah-pertandingan-action') }}">
                        @csrf
                        <input type="hidden" name="jenis" value="Multiple">
                        <div class="row mb-3" id="pertandingan-multiple">
                            <div class="row pertandingan-multiple mb-2">
                                <div class="col-sm-3">
                                    <select class="form-select form-select-sm" name="klub_kandang[]">
                                        @foreach ($klub as $item)
                                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" id="goal" class="form-control form-control-sm" value="0" min="0" name="goal_kandang[]">
                                </div>
                                <div class="col-sm-2 d-flex justify-content-center fw-bold">
                                    vs
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" id="goal" class="form-control form-control-sm" value="0" min="0" name="goal_tandang[]">
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-select form-select-sm" name="klub_tandang[]">
                                        @foreach ($klub as $item)
                                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if (old('jenis') == 'Multiple') 
                                    @error('klub_tandang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('klub_kandang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('goal_tandang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('goal_kandang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                @endif
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