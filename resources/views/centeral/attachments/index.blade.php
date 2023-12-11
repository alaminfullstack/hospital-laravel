@extends('layouts.centeral.app')

@section('title')
    Attachment list
@endsection


@section('breadcrumb')
    Attachments
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('Attachments') }}
                        </div>
                        <a href="{{ route('centeral.attachments.create') }}" class="btn btn-primary">Create New</a>
                    </div>

                    <div class="card-body">
                        

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Patient</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($attachments as $attachment)
                                        <tr>
                                            <td>
                                                {{ $attachment->patient->name ?? null }}
                                            </td>



                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-sm btn-success me-3"
                                                    href="{{ route('centeral.attachments.show', $attachment->patient_id) }}">View</a>

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

                
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
