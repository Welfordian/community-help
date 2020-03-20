@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Viewing User</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>{{ $user->name }}, {{ $user->address }}, {{ $user->postcode }}</h3>

                        <div>
                            {!! $user->help_info !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
