@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header"> Upload </div>
                <div class="card-body">
                    <form method="POST" action="/post" enctype="multipart/form-data">
                        @csrf
                        <x-fileupload name="image" label="Image"/>
                        <x-textarea name="caption" label="Caption"/>
                        <x-submitbtn text="Post!" class="btn btn-primary btn-block col-md-auto" />
            </div>
        </div>
    </div>
</div>
@endsection
