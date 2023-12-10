@extends('layouts.patient.app')

@section('title')
    Create Appoitment 
@endsection

@section('breadcrumb')
    Create Appoitment 
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('Create New Appoitment') }}
                        </div>
                        <a href="{{ route('patient.appoitments.index') }}" class="btn btn-primary">View List</a>
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

                        <form action="{{ route('patient.appoitments.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                        
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Code</label>
                                        <input type="text" name="code" class="form-control" value="{{ generateInvoice() }}" />
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Doctor</label>
                                        <select name="doctor_id" id="doctor_id" class="form-select" required>
                                            @foreach (get_doctors() as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="datetime-local" name="date" id="date" class="form-control" value="{{ now() }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Service</label>
                                        <select name="service_id" class="form-select" required>
                                            @foreach (get_services() as $service)
                                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div id="schedule" class="p-3"></div>
                                </div>

                                
                            

                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea rows="3" name="description" class="form-control" placeholder="how you felling right now...."></textarea>
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
        

       $(document).on('change', '#date', function(e){
            e.preventDefault();
            let date    = $(this).val();
            let doctor_id = $('#doctor_id').val();

            $.ajax({
                url: @json(route('patient.appoitments.get_schedule')),
                data : {date:date, doctor_id:doctor_id},
                method: 'Get',
                success: function(response){
                    console.log(response);
                    $('#schedule').html(response);
                },
                error: function(response){
                    console.log(response);
                } 
            })
        });
    </script>
@endpush
