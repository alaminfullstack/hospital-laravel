@extends('layouts.admin.app')

@section('title')
    Admin Profile
@endsection

@section('breadcrumb')
    Admin Profile
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="h5 mb-0">
                        {{ __('Profile Update') }}
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Name *</label>
                                    <input type="text" name="name" class="form-control" value="{{ $data->name }}"
                                        required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Mobile</label>
                                    <input type="number" name="mobile" class="form-control" value="{{ $data->mobile }}" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $data->email }}"
                                        required />
                                </div>
                            </div>


                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="h5 mb-0">
                        {{ __('Password Update') }}
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">New Password *</label>
                                    <input type="password" name="password" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" required />
                                </div>
                            </div>


                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
