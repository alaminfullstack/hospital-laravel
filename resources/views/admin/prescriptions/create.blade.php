@extends('layouts.admin.app')

@section('title')
    Create Prescription 
@endsection

@section('breadcrumb')
    Create Prescription 
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('Create New Prescription') }}
                        </div>
                        <a href="{{ route('admin.prescriptions.index') }}" class="btn btn-primary">View List</a>
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

                        <form action="{{ route('admin.prescriptions.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                        
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="datetime-local" name="date" class="form-control" value="{{ now() }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">PRSP NO</label>
                                        <input type="text" name="invoice" class="form-control" value="{{ generateInvoice() }}" />
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Doctor</label>
                                        <select name="doctor_id" class="form-select" required>
                                            @foreach (get_doctors() as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Patient</label>
                                        <select name="patient_id" class="form-select" required>
                                            @foreach (get_patients() as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Reference <small>(If you want to attach appoitment no. Then paste here.)</small></label>
                                        <input type="text" name="reference" class="form-control" value="" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Note</label>
                                        <input type="text" name="note" class="form-control" value="" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label"><b>Select Medicine</b></label>
                                        <select class="form-select select_medicine" >
                                            <option value="" disabled selected>Select Here</option>
                                            @foreach (get_medicines() as $medicine)
                                                <option value="{{ $medicine->id }}" data-title="{{ $medicine->title }}">{{ $medicine->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <table class="table table-bordered" id="medicine_row">
                                        <tr>
                                            <th>#</th>
                                            <th>Medicine</th>
                                            <th>Desc.</th>
                                            <th>Action</th>
                                        </tr>
                                        
                                    </table>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Symptoms</label>
                                        <textarea rows="3" name="symptoms" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Diagnosis</label>
                                        <textarea rows="3" name="diagnosis" class="form-control"></textarea>
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
        let medicine_data_store = [];

       $(document).on('change', '.select_medicine', function(e){
            e.preventDefault();
            let id    = $(this).val();
            let title = $(this).find(':selected').data('title');
            let html = '<tr>'+
                            '<td>'+Number(medicine_data_store.length + 1)+'</td>'+
                            '<td>'+title+'<input type="hidden"  name="medicine_id[]" value="'+id+'" /></td>'+
                            '<td><textarea name="desc[]" type="text" class="form-control"></textarea></td>'+
                            '<td><button type="button" data-id="'+id+'" class="btn btn-sm btn-danger remove_medicine">Remove</button></td>'+
                        '</tr>';

            if($.inArray(id, medicine_data_store) == -1){
                medicine_data_store.push(id);
                //console.log(html)
                $('#medicine_row').find('tr').last().after(html);
            }else{
                console.log('exists');
                alert('Medicine '+ title + ' Already Exists Your List');
            }
        });

        $(document).on('click', '.remove_medicine', function() {
            let id = $(this).data('id');
            medicine_data_store.splice($.inArray(id,medicine_data_store) ,1);
            $(this).parents('tr').remove();
        });
    </script>
@endpush
