@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Area</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <b>{{ $user->name }}</b> You are logged in!
                    <div>
                        You joined {{$user->created_at->diffForHumans()}}
                    </div>
                    You are {{$user->date_of_birth->age}} years old
                </div>
            </div>
        </div>
    </div>


    </div>
</div>
@endsection