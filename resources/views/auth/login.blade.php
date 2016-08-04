@extends('layouts.base')

@section('content')

<div class="main-content login">
    <div class="ui container">

        <div class="ui very padded raised segment">
            <h1 class="ui huge centered header">Login</h1>
            @include('front_controller.partials.login-content')
        </div>

    </div>
</div>

@endsection
