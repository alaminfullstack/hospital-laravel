@extends('layouts.patient.app')

@section('title')
    Appoitment view
@endsection


@section('breadcrumb')
    Appoitment Details
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('Appoitment Details') }}
                        </div>
                        <a href="{{ route('patient.appoitments.create') }}" class="btn btn-primary">Create New</a>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">

                                <tbody>

                                    <tr>
                                        <th>Code</th>
                                        <td>
                                            {{ $appoitment->code }}
                                        </td>
                                        <th>
                                            Doctor
                                        </th>
                                        <td>
                                            {{ $appoitment->doctor->name ?? null }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Date
                                        </th>
                                        <td>
                                            {{ $appoitment->date->format('d-m-Y') }}
                                        </td>

                                        <th>Times</th>
                                        <td>
                                            {{ $appoitment->start_time }} -- {{ $appoitment->end_time }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            {{ $appoitment->status }}
                                        </td>

                                        <th>Description</th>
                                        <td>
                                            {{ $appoitment->description }}
                                        </td>

                                    </tr>


                                </tbody>

                            </table>

                            <h5 class="my-3">Attachements</h5>

                            <div class="row">
                                @foreach ($appoitment->images as $image)
                                    <div class="col-md-6">
                                        <div class="card-img">
                                            <img src="{{ asset($image->image) }}" class="card-img" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
