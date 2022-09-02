@extends('admin.layouts.layout')

@section('title')
    Импортировать в БД
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Импортировать в БД</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Импортировать в БД</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Потребители</h3>
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="{{ route('consumers.import') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="area_id">Локация</label>
                                <select name="area_id" id="area_id" class="form-control ">
                                    @foreach ($areas as $k => $v)
                                        <option value="{{ $k }}">{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file">Формат: XLSX</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="file" id="file" type="file"
                                            class="custom-file-input @error('file') is-invalid @enderror">
                                        <label class="custom-file-label" for="file">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
