@if (count($areas))
    <div class="table-responsive" style="min-height: 200px;">
        <table id="example1" class="table table-sm text-nowrap table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 30px">#</th>
                    <th>Локация</th>
                    <th>Пользователь</th>
                    <th>Показания</th>
                    <th>Фото</th>
                </tr>
            </thead>
            <tbody>
                @if ($areas)
                    @foreach ($areas as $area)
                        <tr>
                            <td class="align-middle text-center">{{ $area->id }}</td>
                            <td>
                                <div class="btn-group">
                                    <a type="button" class="btn btn-default"href="{{ route('areas.show', [$area->id]) }}">
                                        {{ $area->name }}</a>
                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                        data-toggle="dropdown" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">

                                        <a class="dropdown-item"
                                            href="{{ route('consumers.export', ['area' => $area->id, 'name' => $area->name]) }}"><i
                                                class="fas fa-file-export"></i> Экспортировать</a>
                                        <a class="dropdown-item"
                                            href="{{ route('areas.edit', ['area' => $area->id]) }}"><i
                                                class="fas fa-edit"></i> Редактировать</a>

                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('areas.destroy', ['area' => $area->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit" class=""
                                                onclick="return confirm('Подтвердите удаление')">
                                                <i class="fas fa-trash"></i> Удалить
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $area->users->pluck('name')->join(', ') }}</td>
                            <td>
                                <div class="progress-group">
                                    Прогресс
                                    <span
                                        class="float-right"><b>{{ $readingStat['part'][$area->id] }}</b>/{{ $readingStat['total'][$area->id] }}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary"
                                            style="width:{{ $readingStat['progress'][$area->id] }}%">
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <div class="progress-group">
                                    Прогресс
                                    <span
                                        class="float-right"><b>{{ $photoStat['part'][$area->id] }}</b>/{{ $photoStat['total'][$area->id] }}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning"
                                            style="width:{{ $photoStat['progress'][$area->id] }}%">
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@else
    <p>Локаций пока нет...</p>
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
                searching: false,
                select: false,
                colReorder: false,
                stateSave: true,

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
