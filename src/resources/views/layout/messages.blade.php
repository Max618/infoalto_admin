{{--@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-times-circle"></i> {{ $error }}
        </div>
    @endforeach
@endif --}}
<div class="alert alert-{{$type}} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    @if($type == "success")
        <i class="fa fa-check"></i>
    @elseif($type == "error")
        <i class="fa fa-times"></i>
    @else
        <i class="fa fa-{{$type}}"></i>
    @endif
    {{ $slot }}
</div>