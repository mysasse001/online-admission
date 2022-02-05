@if($errors->any())
@foreach($errors->all() as $error)
@if(session()->has('success_message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{$error}}
</div>
@endif
@endforeach
@endif