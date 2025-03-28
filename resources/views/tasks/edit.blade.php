@extends('layout')
@section('title', 'GOREV DUZENLE')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Gorev Duzenle</h3>
                </div>


                <div class="card-body">

                    <!-- Form Başlangıcı -->
                    <form action="{{route('tasks.update',$task->id)}}" method="post">
                        @csrf
                        @method('put')

                        <!-- İsim -->
                        <div class="mb-3">
                            <label for="isim" class="form-label">İsim</label>
                            <input value="{{ old('name', $task->name) }}" type="text" class="form-control w-100" id="isim" name="name" placeholder="Adınızı girin">
                        </div>

                        <!-- Açıklama -->
                        <div class="mb-3">
                            <label for="aciklama" class="form-label">Açıklama</label>
                            <textarea   class="form-control w-100" id="aciklama" name="description" rows="5" placeholder="Açıklama girin">{{ old('description', $task->description) }}</textarea>
                        </div>

                        <!-- Durum -->
                        <div class="mb-3">
                            <label for="durum" class="form-label">Durum</label>
                            <select class="form-select w-100" id="durum" name="status">
                                <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>Başlamadı</option>
                                <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Devam Ediyor</option>
                                <option value="2" {{ $task->status == 2 ? 'selected' : '' }}>Tamamlandı</option>
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


                        <button type="submit" class="btn btn-primary w-100">Duzenle</button>
                    </form>
                    <!-- Form Sonu -->
                </div>
            </div>
        </div>
    </section>

@endsection


