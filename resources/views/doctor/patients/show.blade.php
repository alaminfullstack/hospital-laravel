@extends('layouts.doctor.app')

@section('title')
    Attachment view
@endsection


@section('breadcrumb')
    Attachment Details
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('Attachment Details') }}
                        </div>

                        <a href="{{ route('doctor.patients.index') }}" class="btn btn-primary">View List</a>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <h5 class="my-3">Appoitment Attachements</h5>

                            <div class="row">
                                @foreach ($patient->appoitment_images as $image)
                           
                                    <div class="col-md-6">
                                        <div class="card-img">
                                            <img src="{{ asset($image->image) }}" class="card-img" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <hr/>

                            <h5 class="my-3">Centeral Attachements</h5>

                            <div class="row">
                                @foreach ($patient->images as $attach)
                                    <div class="col-md-6">
                                        <div class="card-img">
                                            <img src="{{ asset($attach->attachment) }}" class="card-img" />
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
