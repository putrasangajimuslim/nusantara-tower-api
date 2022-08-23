@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="navigate-page mb-4">
                <span><a href="{{ route('tenant.index') }}" style="text-decoration: none; color: #848484;">Tenant</a></span> <span class="mx-2"> > </span> <span>View Tenant Form</span>
            </div>

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
                <div class="card-header">{{ __('View Tenant Form') }}</div>

                <div class="p-4">
                    <form action="{{ route('tenant.update', $tenant->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group mb-3">
                            <label for="company">Company</label>
                            <input type="company" name="company" class="form-control @if ($errors->has('name')) is-invalid @endif" id="company" placeholder="Please enter company" value="{{ $tenant->company }}">
                            @error('company')
                            <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" name="email" id="email" placeholder="Please enter email" value="{{ $tenant->email }}">
                            @error('email')
                            <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone_no">Phone No</label>
                            <input type="text" class="form-control @if ($errors->has('phone_no')) is-invalid @endif" name="phone_no" id="phone_no" placeholder="Please enter phone no" value="{{ $tenant->phone }}">
                            @error('phone_no')
                            <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone_no">Address</label>
                            <textarea name="address" id="address" cols="30" class="form-control @if ($errors->has('phone_no')) is-invalid @endif" rows="5" placeholder="Please enter phone no">{{ $tenant->address }}</textarea>
                            @error('address')
                            <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
