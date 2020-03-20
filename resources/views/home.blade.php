@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(auth()->user()->help_type)
                        <h3>There {{ $users->count() === 1 ? "is" : "are" }} {{ $users->count() }} {{ $users->count() === 1 ? "person" : "people" }} in your area that may need help.</h3>

                        <div class="mt-5">
                            @foreach($users as $user)
                                <p>
                                    <a href="/users/{{ $user->id }}">{{ $user->name }}, {{ $user->address }}, {{ $user->postcode }}</a>
                                </p>
                            @endforeach
                        </div>
                    @else
                        <h3 class="mb-3">I need help with...</h3>

                        <form method="POST">
                            @csrf

                            <textarea class="form-control" name="help_info">{{ auth()->user()->help_info }}</textarea>

                            <button type="submit" class="btn btn-success mt-3">Save Information</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.tiny.cloud/1/loz8k2soidyblhy4jvcj55ibojjiqto6fhwconn76wyc0d7f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '[name="help_info"]'
        });
    </script>
@endsection
