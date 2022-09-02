@if (count($roles))
    <div class="table-responsive" style="min-height: 200px;">
        <table id="example1" class="table table-sm text-nowrap table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Роль
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="align-middle text-center">
                            {{ $role->id }}
                        </td>
                        <td>
                            <div class="btn-group">
                                <a type="button" class="btn btn-default">
                                    {{ $role->name }}</a>
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="{{ route('roles.edit', ['role' => $role->id]) }}"><i
                                            class="fas fa-edit"></i> Редактировать</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="POST">
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>Ролей пока нет...</p>
@endif
