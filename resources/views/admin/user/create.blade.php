@extends('admin.layouts.layout')

@section('title')
    Новый пользователь
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Пользователь</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Новый пользователь</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Создать</h3>
                    </div>


                    <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Пользователь</label>
                                <div class="col-sm-10">
                                    <input value="{{ old('name') }}" name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Пользователь"
                                        id="inputName">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input value="{{ old('email') }}" name="email" type="email"
                                        class="form-control  @error('email') is-invalid @enderror" id="inputEmail"
                                        placeholder="Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Пароль</label>
                                <div class="col-sm-10">
                                    <input name="password" type="password"
                                        class="form-control  @error('password') is-invalid @enderror" id="inputPassword"
                                        placeholder="Пароль">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
