@if(Session::has('flash_message'))
    <div class="alert alert-{{ session('flash_message_status') }} alert-dismissible fade show fixed-top" role="alert" style="margin: 5px; width: 20%; left: auto;">
        {{ session('flash_message') }}
    </div>
@endif
