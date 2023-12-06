@extends('layouts.doctor.app')

@section('title')
    Doctor Profile
@endsection

@section('breadcrumb')
    Doctor Profile
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

        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="h5 mb-0">
                        {{ __('Profile Update') }}
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('doctor.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="image" />
                                </div>
                            </div>

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

                            <div class="col-md-6">
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
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="h5 mb-0">
                        {{ __('Info Update') }}
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('doctor.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="Male" @if($data->gender == 'Male') selected @endif>Male</option>
                                        <option value="Female" @if($data->gender == 'Female') selected @endif>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Blood Group</label>
                                    <select name="blood_group" class="form-control">
                                        <option value="O+" @if($data->blood_group == 'O+') selected @endif>O+</option>
                                        <option value="A+" @if($data->blood_group == 'A+') selected @endif>A+</option>
                                        <option value="B+" @if($data->blood_group == 'B+') selected @endif>B+</option>
                                        <option value="AB+" @if($data->blood_group == 'AB+') selected @endif>AB+</option>
                                        <option value="O-" @if($data->blood_group == 'O-') selected @endif>O-</option>
                                        <option value="A-" @if($data->blood_group == 'A-') selected @endif>A-</option>
                                        <option value="B-" @if($data->blood_group == 'B-') selected @endif>B-</option>
                                        <option value="AB-" @if($data->blood_group == 'AB-') selected @endif>AB-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ $data->address }}" />
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
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="h5 mb-0">
                        {{ __('Password Update') }}
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('doctor.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">New Password *</label>
                                    <input type="password" name="password" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-12">
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
