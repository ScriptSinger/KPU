@extends('employee.layouts.layout')
@if (auth()->user()->can('show'))
    @section('title')
        Список потребителей
    @endsection

    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Список потребителей</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal') }}">Главная</a></li>
                            <li class="breadcrumb-item active">{{ $area->name }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">


            <!-- Default box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Реестр контрольного снятия показаний персоналом
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @include('table.employee')
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <div class="pagination pagination-sm m-0 float-right"> {{ $consumers->onEachSide(1)->links() }}</div>
                </div>
                <!-- /.card-footer-->
                {{-- <div class="overlay">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div> --}}
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    @endsection
@endif
