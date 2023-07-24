@extends('template')

@section('body')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Klasemen Sementara</h5>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Klub</th>
                        <th scope="col">Main</th>
                        <th scope="col">Menang</th>
                        <th scope="col">Seri</th>
                        <th scope="col">Kalah</th>
                        <th scope="col">Goal Menang</th>
                        <th scope="col">Goal Kalah</th>
                        <th scope="col">Selisih Goal</th>
                        <th scope="col">Point</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($klub as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration + 1 }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->main }}</td>
                            <td>{{ $item->menang }}</td>
                            <td>{{ $item->kalah }}</td>
                            <td>{{ $item->seri }}</td>
                            <td>{{ $item->goal_menang }}</td>
                            <td>{{ $item->goal_kalah }}</td>
                            <td>{{ $item->goal_menang - $item->goal_kalah }}</td>
                            <td>{{ $item->point }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
