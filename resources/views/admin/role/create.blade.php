@extends('admin.layouts.layout')

@section('title')
    Новая роль
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новая роль</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Новая роль</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-6">
                <!-- Default box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Создать</h3>
                    </div>
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название роли</label>
                                <input name="name" class="form-control @error('name') is-invalid @enderror"
                                    type="text" class="form-control" id="exampleInputEmail1" placeholder="Контроллер">
                            </div>
                            <div class="mt-4 mb-2">
                                <b>Права доступа к ресурсу</b>
                            </div>
                            @foreach ($permissions as $permission)
                                <div class="custom-control custom-checkbox">
                                    <input name="permissions[]" value="{{ $permission->id }}" type="checkbox"
                                        class="custom-control-input" id="{{ $permission->id }}">
                                    <label for="{{ $permission->id }}"
                                        class="custom-control-label">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
