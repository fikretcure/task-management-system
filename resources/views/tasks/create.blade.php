@extends('layout')
@section('title', 'YENI GOREV EKLE')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Yeni Gorev Ekle </h3>
                </div>


                <div class="card-body">

                    <!-- Form Başlangıcı -->
                    <form action="{{route('tasks.store')}}" method="post">
                        @csrf
                        <!-- İsim -->
                        <div class="mb-3">
                            <label for="isim" class="form-label">İsim</label>
                            <input type="text" class="form-control w-100" id="isim" name="name" placeholder="Adınızı girin">
                        </div>

                        <!-- Açıklama -->
                        <div class="mb-3">
                            <label for="aciklama" class="form-label">Açıklama</label>
                            <textarea class="form-control w-100" id="aciklama" name="description" rows="5" placeholder="Açıklama girin"></textarea>
                        </div>

                        <!-- Durum -->
                        <div class="mb-3">
                            <label for="durum" class="form-label">Durum</label>
                            <select class="form-select w-100" id="durum" name="status">
                                <option value="0">Baslamadi</option>
                                <option value="1">Devam Ediyor</option>
                                <option value="2">Tamamlandi</option>
                            </select>
                        </div>


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <button type="submit" class="btn btn-primary w-100">Kaydet</button>
                    </form>
                    <!-- Form Sonu -->
                </div>
            </div>
        </div>
    </section>

@endsection


