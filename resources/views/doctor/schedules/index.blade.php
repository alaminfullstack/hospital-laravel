@extends('layouts.doctor.app')

@section('title')
    My Schedule
@endsection

@section('breadcrumb')
    My Schedule
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('My Schedule') }}
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

                        <div class="d-flex align-items-start">
                            <ul class="nav flex-column nav-pills me-3 w-50" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">

                                <li class="nav-link active" id="v-pills-saturday-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-saturday"  role="tab"
                                    aria-controls="v-pills-saturday" aria-selected="true">
                                    

                                    <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
                                        <svg class="bi" width="24" height="24"><use xlink:href="#table"></use></svg>
                                        <div>
                                          <strong class="d-block">Saturday</strong>
                                          <small>Make your available slot now</small>
                                        </div>
                                      </a>

                                </li>

                                <li class="nav-link" id="v-pills-sunday-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-sunday" type="button" role="tab"
                                    aria-controls="v-pills-sunday" aria-selected="false">
                                    <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
                                        <svg class="bi" width="24" height="24"><use xlink:href="#table"></use></svg>
                                        <div>
                                          <strong class="d-block">Sunday</strong>
                                          <small>Make your available slot now</small>
                                        </div>
                                      </a>
                                </li>

                                <li class="nav-link" id="v-pills-monday-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-monday" type="button" role="tab"
                                    aria-controls="v-pills-monday" aria-selected="false">
                                    <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
                                        <svg class="bi" width="24" height="24"><use xlink:href="#table"></use></svg>
                                        <div>
                                          <strong class="d-block">Monday</strong>
                                          <small>Make your available slot now</small>
                                        </div>
                                      </a>
                                </li>

                                <li class="nav-link" id="v-pills-tuesday-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-tuesday" type="button" role="tab"
                                    aria-controls="v-pills-tuesday" aria-selected="false">
                                    <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
                                        <svg class="bi" width="24" height="24"><use xlink:href="#table"></use></svg>
                                        <div>
                                          <strong class="d-block">Tuesday</strong>
                                          <small>Make your available slot now</small>
                                        </div>
                                      </a>
                                </li>

                                <li class="nav-link" id="v-pills-wednesday-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-wednesday" type="button" role="tab"
                                    aria-controls="v-pills-wednesday" aria-selected="false">
                                    <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
                                        <svg class="bi" width="24" height="24"><use xlink:href="#table"></use></svg>
                                        <div>
                                          <strong class="d-block">Wednesday</strong>
                                          <small>Make your available slot now</small>
                                        </div>
                                      </a>
                                </li>

                                <li class="nav-link" id="v-pills-thursday-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-thursday" type="button" role="tab"
                                    aria-controls="v-pills-thursday" aria-selected="false">
                                    <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
                                        <svg class="bi" width="24" height="24"><use xlink:href="#table"></use></svg>
                                        <div>
                                          <strong class="d-block">Thursday</strong>
                                          <small>Make your available slot now</small>
                                        </div>
                                      </a>
                                </li>

                                <li class="nav-link" id="v-pills-friday-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-friday" type="button" role="tab"
                                    aria-controls="v-pills-friday" aria-selected="false">
                                    <a href="#" class="btn btn-hover-light rounded-2 d-flex align-items-start gap-2 py-2 px-3 lh-sm text-start">
                                        <svg class="bi" width="24" height="24"><use xlink:href="#table"></use></svg>
                                        <div>
                                          <strong class="d-block">Friday</strong>
                                          <small>Make your available slot now</small>
                                        </div>
                                      </a>
                                </li>
                            </ul>
                            
                            <div class="tab-content w-100" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-saturday" role="tabpanel"
                                    aria-labelledby="v-pills-saturday-tab" tabindex="0">
                                    <h5>Create New Slot</h5>
                                    <form action="{{ route('doctor.schedules.store') }}" method="POST">
                                        @csrf

                                        <table class="table time_row">
                                            <tr>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="time" name="job_time[start][]" class="form-control" required />
                                                </td>
                                                <td>
                                                    <input type="time" name="job_time[end][]" class="form-control" required />
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info add_row">More</button>
                                                </td>
                                            </tr>
                                        </table>

                                       
                                           

                                        <input type="hidden" name="dayname" value="Saturday" />

                                           
                                        <button type="submit" class="btn btn-success">Save</button>
                                         
                                     
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="v-pills-sunday" role="tabpanel"
                                    aria-labelledby="v-pills-sunday-tab" tabindex="0">...</div>
                                <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel"
                                    aria-labelledby="v-pills-disabled-tab" tabindex="0">...</div>
                                <div class="tab-pane fade" id="v-pills-monday" role="tabpanel"
                                    aria-labelledby="v-pills-monday-tab" tabindex="0">...</div>
                                <div class="tab-pane fade" id="v-pills-tuesday" role="tabpanel"
                                    aria-labelledby="v-pills-tuesday-tab" tabindex="0">...</div>
                                <div class="tab-pane fade" id="v-pills-wednesday" role="tabpanel"
                                    aria-labelledby="v-pills-wednesday-tab" tabindex="0">...</div>
                                <div class="tab-pane fade" id="v-pills-thursday" role="tabpanel"
                                    aria-labelledby="v-pills-thursday-tab" tabindex="0">...</div>
                                <div class="tab-pane fade" id="v-pills-friday" role="tabpanel"
                                    aria-labelledby="v-pills-friday-tab" tabindex="0">...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
         $(document).on('click', '.add_row', function(e){
            e.preventDefault();
            let html = '<tr>'+
                            '<td><input type="time" name="job_time[start][]" class="form-control" /></td>'+
                            '<td><input type="time" name="job_time[end][]" class="form-control" /></td>'+
                            '<td><button type="button" class="btn btn-sm btn-danger remove_row">Remove</button></td>'+
                        '</tr>';

            
                $(this).parents('table').find('tr').last().after(html);
           
        });

        $(document).on('click', '.remove_row', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endpush
