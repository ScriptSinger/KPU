@if (count($consumers))
    <div class="table-responsive">
        <table id="example1" class="table table-sm text-nowrap table-bordered table-striped">
            <thead>
                <tr>
                    {{-- <th style="width: 30px">#</th> --}}
                    <th>Действие</th>
                    <th data-toggle="tooltip" title="Фотофиксация показаний в альбомном виде">Фото</th>
                    <th>Примечание</th>
                    <th data-toggle="tooltip" title="Показания прибора учета на дату обхода">Показания</th>
                    <th>Дата обхода</th>
                    <th data-toggle="tooltip" title="Номер лицевого счета">№ счета</th>
                    <th>ФИО</th>
                    <th data-toggle="tooltip" title="Населенный пункт">НП</th>
                    <th>Улица</th>
                    <th>Дом</th>
                    <th data-toggle="tooltip" title="Корпус">К</th>
                    <th data-toggle="tooltip" title="Квартира">Кв</th>
                    <th data-toggle="tooltip" title="Тип прибора учета">Тип ПУ</th>
                    <th data-toggle="tooltip" title="Заводской номер ПУ">№ ПУ</th>
                    <th data-toggle="tooltip" title="Дата гос проверки">Дата проверки</th>
                    <th>№ пломбы</th>
                    <th data-toggle="tooltip" title="Год выпуска прибора учета">Год выпуска</th>
                    <th>Зона суток</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consumers as $consumer)
                    <tr id="{{ $consumer->id }}">
                        {{-- <td>{{ $consumer->id }}</td> --}}
                        <td>
                            @if (auth()->user()->can('edit'))
                                <div class="btn-group btn-group-sm">
                                    <a onclick="event.stopImmediatePropagation()" class="btn btn-info"
                                        href="{{ route('employees-consumer.edit', ['employees_consumer' => $consumer->id]) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </div>
                            @endif
                            @if (auth()->user()->can('show'))
                                <div class="btn-group btn-group-sm">
                                    <a onclick="event.stopImmediatePropagation()" class="btn btn-secondary"
                                        href="{{ route('employees-consumer.show', ['employees_consumer' => $consumer->id]) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            @endif
                        </td>

                        <td>
                            <a type="button" data-toggle="modal" data-target="#modal-{{ $consumer->id }}"
                                href="{{ $consumer->getImage() }}"><img class="img-thumbnail img-fluid"
                                    src="{{ $consumer->getImage() }}" class="btn"></a>

                            <div id="modal-{{ $consumer->id }}" class="modal fade bd-example-modal-xl" tabindex="-1"
                                role="dialog" aria-labelledby="#modal-{{ $consumer->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <img src="{{ $consumer->getImage() }}">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td data-toggle="tooltip" title="{{ $consumer->note }}">{!! Str::limit(strip_tags($consumer->note), 10) !!}
                        </td>
                        <td>{{ $consumer->reading }}</td>
                        <td>{{ $consumer->crawl_date }}</td>
                        <td>{{ $consumer->personal_account }}</td>
                        <td>{{ $consumer->full_name }}</td>
                        <td>{{ $consumer->district }}</td>
                        <td>{{ $consumer->street }}</td>
                        <td>{{ $consumer->house }}</td>
                        <td>{{ $consumer->building }}</td>
                        <td>{{ $consumer->apartment }}</td>
                        <td>{{ $consumer->model }}</td>
                        <td>{{ $consumer->number }}</td>
                        <td>{{ $consumer->verif_date }}</td>
                        <td>{{ $consumer->seal }}</td>
                        <td>{{ $consumer->year_release }}</td>
                        <td>{{ $consumer->day_zone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>Данных пока нет...</p>
@endif
@push('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                paging: false,
                ordering: false,
                info: false,
                responsive: false,
                lengthChange: true,
                buttons: ["colvis"],
                searching: false,
                select: true,
                colReorder: true,
                stateSave: true,

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
