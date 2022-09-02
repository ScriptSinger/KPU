{!! Form::open(['route' => 'restore-activity', 'method' => 'POST', 'class' => 'mb-0']) !!}
{!! Form::button(
    '<i class="fa fa-fw fa-history" aria-hidden="true"></i>' .
        trans('LaravelLogger::laravel-logger.dashboardCleared.menu.restoreAll'),
    [
        'type' => 'submit',
        'class' => 'text-success dropdown-item',
        'data-toggle' => 'modal',
        'data-target' => '#confirmRestore',
        'data-title' => trans('LaravelLogger::laravel-logger.modals.restoreLog.title'),
        'data-message' => trans('LaravelLogger::laravel-logger.modals.restoreLog.message'),
    ],
) !!}
{!! Form::close() !!}
