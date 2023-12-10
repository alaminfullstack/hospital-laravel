@extends('layouts.patient.app')

@section('title')
    Appoitment list
@endsection


@section('breadcrumb')
    Appoitments
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('Appoitments') }}
                        </div>
                        <a href="{{ route('patient.appoitments.create') }}" class="btn btn-primary">Create New</a>
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
                                        <th scope="col">Code</th>
                                        <th scope="col">Doctor</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Times</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($appoitments as $appoitment)
                                        <tr>
                                            <td>
                                                {{ $appoitment->code }}
                                            </td>

                                            <td>
                                                {{ $appoitment->doctor->name ?? null }}
                                            </td>

                                            <td>
                                                {{ $appoitment->date->format('d-m-Y') }}
                                            </td>

                                            <td>
                                                {{ $appoitment->start_time }} -- {{ $appoitment->end_time }}
                                            </td>

                                            <td>
                                                {{ $appoitment->status }}
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                   
                                                    @if($appoitment->status == 'pending')
                                                    <a class="btn btn-sm btn-primary me-3"
                                                    href="{{ route('patient.appoitments.edit', $appoitment->id) }}">Edit</a>

                                                    <form method="POST"
                                                        action="{{ route('patient.appoitments.destroy', $appoitment->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this Service?')">Delete</button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Data Has Empty</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>

                        {!! $appoitments->links() !!}

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
