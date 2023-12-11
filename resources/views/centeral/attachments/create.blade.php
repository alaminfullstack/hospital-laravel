@extends('layouts.centeral.app')

@section('title')
    Create Attachement 
@endsection

@section('breadcrumb')
    Create Attachement 
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('Create New Attachement') }}
                        </div>
                        <a href="{{ route('centeral.attachments.index') }}" class="btn btn-primary">View List</a>
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

                        <form action="{{ route('centeral.attachments.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                        
                                
                            
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Patient</label>
                                        <select name="patient_id" id="patient_id" class="form-select" required>
                                            @foreach (get_patients() as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Attachments <small>(Only Images. Multiple).</small></label>
                                        <input type="file" name="images[]" multiple class="form-control" />
                                    </div>
                                </div>
                           

                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        

      
    </script>
@endpush
