@if (count($consumers))
    <div class="table-responsive">
        <table id="example1" class="table table-sm table-bordered table-striped text-nowrap">
            <thead>
                <tr>
                    <th style="width: 30px">#</th>
                    <th>Действие</th>
                    <th data-toggle="tooltip" title="Фотофиксация показаний в альбомном виде">Фото</th>
                    <th>Примечание</th>
                    <th data-toggle="tooltip" title="Показания прибора учета на дату обхода">Показания</th>
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
                    <th>Дата обхода</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consumers as $consumer)
                    <tr @if ($consumer->id == session('id')) class="selected" @endif id="{{ $consumer->id }}">
                        <td>{{ $consumer->id }}</td>
                        <td>
                            <div class="btn-group">
                                <a onclick="event.stopImmediatePropagation()" style="border-radius: 5px"
                                    class="mx-1 btn btn-info"
                                    href="{{ route('consumers.edit', ['consumer' => $consumer->id]) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('consumers.destroy', ['consumer' => $consumer->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="mx-1 btn btn-danger" type="submit"
                                        onclick="return confirm('Подтвердите удаление')"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                        <td>
                            <a type="button" data-toggle="modal" data-target="#modal-{{ $consumer->id }}"
                                href="{{ $consumer->getImage() }}"><img width="40" src="{{ $consumer->getImage() }}"
                                    class="img-thumbnail"></a>

                            <div id="modal-{{ $consumer->id }}" class="modal fade bd-example-modal-xl" tabindex="-1"
                                role="dialog" aria-labelledby="#modal-{{ $consumer->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <img src="{{ $consumer->getImage() }}">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td data-toggle="tooltip" title="{{ $consumer->note }}">{!! Illuminate\Support\Str::limit(strip_tags($consumer->note), 10) !!}
                        </td>
                        <td>{{ $consumer->reading }}</td>
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
                        <td>{{ $consumer->crawl_date }}</td>
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
                autoWidth: false,
                paging: false,
                ordering: false,
                info: false,
                responsive: false,
                lengthChange: true,
                buttons: ["colvis"],
                searching: false,
                select: "single",
                colReorder: true,
                stateSave: true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('[data-toggle="tooltip"]').tooltip()

        });
    </script>
@endpush
