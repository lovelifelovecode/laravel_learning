@if(count($errors))
<div class="alert alert-warning alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

    <strong>警告!</strong> {{$errors ->first()}}<br />
</div>

<div class="alert alert-warning alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    @foreach($errors->all() as $error)
        <strong>警告!</strong> {{$error}}<br />
    @endforeach
</div>
    @endif