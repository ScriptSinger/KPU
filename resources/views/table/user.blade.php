@if (count($users))
    <div class="table-responsive" style="min-height: 200px;">
        <table id="example1" class="table table-sm text-nowrap table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Имя
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Роль
                    </th>
                    <th>
                        Локация
                    </th>
                    <th>
                        Добавленные показания
                    </th>
                    <th>
                        Добавленные фото
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="align-middle text-center">{{ $user->id }}</td>
                        <td>
                            <div class="btn-group">
                                <a type="button" class="btn btn-default" href="{{ route('users.show', [$user->id]) }}">
                                    {{ $user->name }}</a>
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="{{ route('users.edit', ['user' => $user->id]) }}"><i
                                            class="fas fa-edit"></i> Редактировать</a>

                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
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
                        <td>
                            {{ $user->email }}
                        </td>

                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role['name'] }}
                            @endforeach
                        </td>
                        <td>
                            {{ $user->areas->pluck('name')->join(', ') }}
                        </td>
                        <td>
                            {{-- <div class="progress-group">
                                Прогресс
                                <span
                                    class="float-right"><b>{{ $readingStat['part'][$user->id] }}</b>/{{ $readingStat['total'][$user->id] }}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary"
                                        style="width:{{ $readingStat['progress'][$user->id] }}%">
                                    </div>
                                </div>
                            </div> --}}
                        </td>
                        <td>
                            {{-- <div class="progress-group">
                                Прогресс
                                <span
                                    class="float-right"><b>{{ $photoStat['part'][$user->id] }}</b>/{{ $photoStat['total'][$user->id] }}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning"
                                        style="width:{{ $photoStat['progress'][$user->id] }}%">
                                    </div>
                                </div>
                            </div> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>Пользователей пока нет...</p>
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
