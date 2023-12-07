@extends('layouts.patient.app')

@section('title')
    Prescription list
@endsection


@section('breadcrumb')
    Prescriptions
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('Prescriptions') }}
                        </div>
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
                                        <th scope="col">PSCP-NO</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Doctor</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($prescriptions as $prescription)
                                        <tr>
                                            <td>
                                                {{ $prescriptions->firstItem() + $loop->index }}
                                            </td>

                                            <td>
                                                {{ $prescription->invoice }}
                                            </td>

                                            <td>
                                                {{ $prescription->date->format('d-m-Y') }}
                                            </td>


                                            <td>
                                                {{ $prescription->doctor->name ?? null }}
                                            </td>

                                            
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-sm btn-success me-3"
                                                    href="{{ route('patient.prescriptions.print', $prescription->id) }}">Download</a>

                                                    <a class="btn btn-sm btn-primary me-3"
                                                    href="{{ route('patient.prescriptions.show', $prescription->id) }}">View</a>
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

                        {!! $prescriptions->links() !!}

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
