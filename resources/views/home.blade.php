@extends('layouts.elements')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <div>
                    @if ($admin ?? '')
                        <div class="alert alert-success" role="alert">
                            {{ $admin ?? '' }}
                            <a class="float-right" href="/admin/panel">Admin Panel</a>
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection