@extends('layouts.doctor.app')

@section('title')
    Patient list
@endsection


@section('breadcrumb')
    Patients
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('Patients') }}
                        </div>
                        <a href="{{ route('doctor.patients.create') }}" class="btn btn-primary">Create New</a>
                    </div>

                    <div class="card-body">
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

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($patients as $patient)
                                        <tr>
                                            <td>
                                                {{-- <div class="card-img-top">
                                                    <img src="{{ asset($patient->image) }}" class="rounded-0 shadow-sm card-img" style="width: 60px; height: 60px;"/>
                                                </div> --}}
                                                {{ $patients->firstItem() + $loop->index }}
                                            </td>

                                            <td>
                                                {{ $patient->name }}
                                            </td>
                                            <td>
                                                {{ $patient->mobile }}
                                            </td>
                                            <td>
                                                {{ $patient->email }}
                                            </td>
                                            <td>
                                                {{ $patient->gender }}
                                            </td>
                                            <td>
                                                {{ $patient->address }}
                                            </td>

                                            <td>
                                             
                                                <div class="d-flex">
                                                    <a class="btn btn-sm btn-success me-3"
                                                    href="{{ route('doctor.patients.show', $patient->id) }}">View</a>

                                                    <a class="btn btn-sm btn-primary me-3"
                                                    href="{{ route('doctor.patients.edit', $patient->id) }}">Edit</a>
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Data Has Empty. Create a New <a href="{{ route('doctor.patients.create') }}">Click
                                                    Here</a></td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>

                        {!! $patients->links() !!}

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
