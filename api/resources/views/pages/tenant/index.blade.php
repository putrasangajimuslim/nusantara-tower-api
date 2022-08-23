@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('success_message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success_message') }}
                </div>
            @endif

            @if(Session::has('error_message'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error_message') }}
                </div>
            @endif
            
            <div class="card">
                <div class="card-header">{{ __('Tenant Management') }}</div>
                <tenan-list csrf="{{ csrf_token() }}"></tenan-list>
            </div>
        </div>
    </div>
</div>
@stop
