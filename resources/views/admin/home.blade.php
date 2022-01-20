@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in as an Admin. <br>
                    {{-- //link routes to album admin index page --}}
                    <a href="{{ route('admin.albums.index') }}">View all Albums</a> <br>
                    {{-- //link routes to user index page --}}
                    <a href="{{ route('user.albums.index') }}">User Interface</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
