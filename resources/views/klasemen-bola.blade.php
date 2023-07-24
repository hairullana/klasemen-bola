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
                        <th scope="col">Poin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Arema</td>
                        <td>2</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td>4</td>
                        <td>0</td>
                        <td>6</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
