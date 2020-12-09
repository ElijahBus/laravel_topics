@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">Users tracking</div>
                        <div class="card-body">
                            <h5>User Ip: {{ $userIp }}</h5>
                            <h5>User ID: {{ $visitorId }}</h5>
                        </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
