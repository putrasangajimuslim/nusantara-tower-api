@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="navigate-page mb-4">
                <span><a href="{{ route('unit.index') }}" style="text-decoration: none; color: #848484;">Unit</a></span> <span class="mx-2"> > </span> <span>Create Unit Form</span>
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
                <div class="card-header">{{ __('Create Unit Form') }}</div>

                <div class="p-4">
                    <form action="{{ route('unit.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name_unit">Name Unit</label>
                            <input type="text" name="name" class="form-control @if ($errors->has('name')) is-invalid @endif" id="name_unit" placeholder="Please enter name unit">
                            @error('name')
                            <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="lantai">Lantai</label>
                            <input type="text" class="form-control @if ($errors->has('lantai')) is-invalid @endif" name="lantai" id="lantai" placeholder="Please enter lantai">
                            @error('email')
                            <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="area">Area</label>
                            <input type="text" class="form-control @if ($errors->has('area')) is-invalid @endif" name="area" id="area" placeholder="Please enter phone area">
                            @error('area')
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
