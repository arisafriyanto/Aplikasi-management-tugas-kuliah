@if(session()->has('success'))
<div class="alert alert-success alert-dismissible show fade" role="alert">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        <strong>{{ session()->get('success') }}</strong>
    </div>
</div>

@endif
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        <strong>{{ session()->get('error') }}</strong>
    </div>
</div>
@endif