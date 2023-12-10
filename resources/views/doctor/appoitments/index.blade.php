@extends('layouts.doctor.app')

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
                        <a href="{{ route('doctor.appoitments.create') }}" class="btn btn-primary">Create New</a>
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
                                        <th scope="col">Patient</th>
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
                                                {{ $appoitment->patient->name ?? null }}
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
                                                    
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$loop->iteration}}">
                                                        Accepted
                                                    </button>
  
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal-{{$loop->iteration}}" tabindex="-1" 
                                                         aria-hidden="true">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                               <form action="{{ route('doctor.appoitments.edit', $appoitment->id) }}">
                                                                <div class="mb-3">
                                                                    <label class="form-label">
                                                                        <b>Description</b> (<small>Zoom Link, Google meet link, custom call.. just for description for patient</small>)
                                                                    </label>

                                                                    <textarea name="description" class="form-control" rows="5"></textarea>
                                                                </div>

                                                                <button type="submit" class="btn btn-success">Approved</button>
                                                               </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
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
