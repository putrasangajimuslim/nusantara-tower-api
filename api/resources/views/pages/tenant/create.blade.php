@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="navigate-page mb-4">
                <span><a href="{{ route('tenant.index') }}" style="text-decoration: none; color: #848484;">Tenant</a></span> <span class="mx-2"> > </span> <span>Create Tenant Form</span>
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
                <div class="card-header">{{ __('Create Tenant Form') }}</div>

                <div class="p-4">
                    <form action="{{ route('tenant.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="company">Company</label>
                            <input type="text" name="company" class="form-control @if ($errors->has('company')) is-invalid @endif" id="company" placeholder="Please enter company">
                            @error('company')
                            <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" name="email" id="email" placeholder="Please enter email">
                            @error('email')
                            <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone_no">Phone No</label>
                            <input type="text" class="form-control @if ($errors->has('phone_no')) is-invalid @endif" name="phone_no" id="phone_no" placeholder="Please enter phone no">
                            @error('phone_no')
                            <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <textarea name="address" id="" cols="30" class="form-control @if ($errors->has('address')) is-invalid @endif" rows="5" placeholder="Please enter phone no"></textarea>
                            @error('address')
                            <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
