@if (session()->has('flash_notification.message'))
    <div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon {{ session()->get('flash_notification.icon') }}"></i> Alert!</h4>
        {!! session()->get('flash_notification.message') !!}
    </div>
@endif
