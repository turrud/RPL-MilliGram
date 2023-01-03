@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Update Profile </div>
                <div class="card-body">
                    <form method="POST" action="/user/edit" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-input label="Username" name="username" :object="$user" />
                        <x-input label="Fullname" name="fullname" :object="$user" />
                        <x-textareamid label="Biodata" name="bio" :object="$user"  />
                        <x-fileuploadmid label="Avatar" name="avatar" />

                        @if (Auth::user()->type != "regular")
                            <x-input label="Business Website" name="business_website" :object="$user" type="url" pattern="https://.*"  placeholder="https://example.com" />
                            <x-textareamid label="Business Address" name="business_address" :object="$user" />
                            <x-input label="Business Contact" name="business_contact" :object="$user"/>
                        @endif
                        <x-submitbtn text="Update Profile" />
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <a></a>
                    <form method="POST" action="/user/edit/business">
                        @csrf
                        @method('PUT')

                        @if (Auth::user()->type == "regular")
                            <input type="hidden" name="type" value="business" />
                            <x-submitbtn text="Change to Business Account" />
                        @else
                            <input type="hidden" name="type" value="regular" />
                            <x-submitbtn text="Change to Regular Account" />
                        @endif


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




