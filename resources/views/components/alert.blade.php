@if (session()->has($type))
    <div class="alert alert-{{ $type }} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        {{ session()->get($type) }}
    </div>
@endif
