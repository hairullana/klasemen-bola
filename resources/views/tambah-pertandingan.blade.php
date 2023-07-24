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
                                <div class="col-sm-12">
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
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
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
                                <div class="col-sm-1 d-flex justify-content-center fw-bold">
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
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-danger btn-sm delete-match"><i class="ri-close-circle-line text-white"></i></button>
                                </div>
                                <div class="col-sm-12">
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
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <button type="button" id="tambah-pertandingan" class="btn btn-primary"><i class="bi bi-plus-circle text-white"></i> Tambah Pertandingan</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
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
        $(document)
        .on('click', '#tambah-pertandingan', function() {
            $('.pertandingan-multiple').eq(0).clone().appendTo('#pertandingan-multiple');
        })
        .on('click', '.delete-match', function() {
            console.log('asu');
            let me = $(this);
            let match = $('.pertandingan-multiple');
            if (match.length == 1) return toastr.error('Tidak bisa menghapus pertandingan karena sisa 1');
            return me.closest('.pertandingan-multiple').remove();
        });
    </script>
@endpush