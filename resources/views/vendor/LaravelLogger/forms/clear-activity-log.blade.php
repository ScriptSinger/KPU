{!! Form::open(['route' => 'clear-activity']) !!}
{!! Form::hidden('_method', 'DELETE') !!}
{!! Form::button(
    '<i class="fa fa-fw fa-trash" aria-hidden="true"></i>' .
        trans('LaravelLogger::laravel-logger.dashboard.menu.clear'),
    [
        'type' => 'submit',
        'data-toggle' => 'modal',
        'data-target' => '#confirmDelete',
        'data-title' => trans('LaravelLogger::laravel-logger.modals.clearLog.title'),
        'data-message' => trans('LaravelLogger::laravel-logger.modals.clearLog.message'),
        'class' => 'dropdown-item',
    ],
) !!}
{!! Form::close() !!}
