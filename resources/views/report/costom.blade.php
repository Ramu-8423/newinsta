@extends('admin.body.adminmaster')

@section('admin')

<style>
.responsive-image {
    width: 100%;
    height: 500px;
    object-fit: cover;
    display: block;
    margin: 0 auto;
}
</style>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card-body" style="display:flex;justify-content:end;">
            <a style="margin-left:10px;"><button class="btn btn-primary btn-sm"
                    onclick="history.back()">back</button></a>
        </div>
        @foreach($details as $file)
        <div style="display: flex; justify-content: center; align-items: center; height: 500px;">
            @if(pathinfo($file->custom_layout, PATHINFO_EXTENSION) == 'pdf')
            <iframe src="{{ $file->custom_layout }}" width="100%" height="100%" style="border: none;"></iframe>
            @else
            <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
                <a href="{{ $file->custom_layout }}" target="_blank">
                    <img src="{{ $file->custom_layout }}" alt="Image" class="responsive-image">
                </a>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection