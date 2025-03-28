@extends('layout')
@section('title', 'GOREVLERIM')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gorevler </h3>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Gorev Ismi</th>
                            <th>Aciklama</th>
                            <th>Durumu</th>
                            <th>Islemler</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($tasks as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->status_label}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('tasks.complete', $item->id) }}" class="btn btn-sm btn-success">Tamamla</a>
                                        <a href="{{ route('tasks.edit', $item->id) }}" class="btn btn-sm btn-info">Düzenle</a>
                                        <form action="{{ route('tasks.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </section>

@endsection
