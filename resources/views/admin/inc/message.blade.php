@if(count($errors)>0)
@foreach($errors->all() as $error)
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Error</span>
        {{$error}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endforeach
@endif

@if(session()->has('success'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        {{session()->get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('error'))
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Error</span>
        {{session()->get('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif