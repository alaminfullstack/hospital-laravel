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

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Start</label>
                                                    <input type="time" name="start" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">End</label>
                                                    <input type="time" name="end" class="form-control" required />
                                                </div>
                                            </div>

                                            <input type="hidden" name="dayname" value="Saturday" />

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
            
                                        </div>
                                    </form>

                                    <h5 class="my-3">Slots</h5>

                                    @php
                                        $startday = get_schedule('Saturday');
                                    @endphp
                                    
                                    @if($startday != null)
                                        @php
                                            $s_time = explode( ',', $startday->start_time);
                                            $e_time = explode( ',', $startday->end_time);
                                        @endphp

                                       
                                        @for ($i=0; $i < count($s_time); $i++)
                                            <button class="badge bg-primary">{{ $s_time[$i] }} -- {{ $e_time[$i] }}</button>
                                        @endfor
                                    @endif
                                </div>

                                <div class="tab-pane fade" id="v-pills-sunday" role="tabpanel"
                                    aria-labelledby="v-pills-sunday-tab" tabindex="0">
                                    <h5>Create New Slot</h5>
                                    <form action="{{ route('doctor.schedules.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Start</label>
                                                    <input type="time" name="start" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">End</label>
                                                    <input type="time" name="end" class="form-control" required />
                                                </div>
                                            </div>

                                            <input type="hidden" name="dayname" value="Sunday" />

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
            
                                        </div>
                                    </form>

                                    <h5 class="my-3">Slots</h5>

                                    @php
                                        $startday = get_schedule('Sunday');
                                    @endphp
                                    
                                    @if($startday != null)
                                        @php
                                            $s_time = explode( ',', $startday->start_time);
                                            $e_time = explode( ',', $startday->end_time);
                                        @endphp

                                       
                                        @for ($i=0; $i < count($s_time); $i++)
                                            <button class="badge bg-primary">{{ $s_time[$i] }} -- {{ $e_time[$i] }}</button>
                                        @endfor
                                    @endif
                                </div>
                               
                                <div class="tab-pane fade" id="v-pills-monday" role="tabpanel"
                                    aria-labelledby="v-pills-monday-tab" tabindex="0">
                                    <h5>Create New Slot</h5>
                                    <form action="{{ route('doctor.schedules.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Start</label>
                                                    <input type="time" name="start" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">End</label>
                                                    <input type="time" name="end" class="form-control" required />
                                                </div>
                                            </div>

                                            <input type="hidden" name="dayname" value="Monday" />

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
            
                                        </div>
                                    </form>

                                    <h5 class="my-3">Slots</h5>

                                    @php
                                        $startday = get_schedule('Monday');
                                    @endphp
                                    
                                    @if($startday != null)
                                        @php
                                            $s_time = explode( ',', $startday->start_time);
                                            $e_time = explode( ',', $startday->end_time);
                                        @endphp

                                       
                                        @for ($i=0; $i < count($s_time); $i++)
                                            <button class="badge bg-primary">{{ $s_time[$i] }} -- {{ $e_time[$i] }}</button>
                                        @endfor
                                    @endif

                                </div>
                                <div class="tab-pane fade" id="v-pills-tuesday" role="tabpanel"
                                    aria-labelledby="v-pills-tuesday-tab" tabindex="0">
                                    <h5>Create New Slot</h5>
                                    <form action="{{ route('doctor.schedules.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Start</label>
                                                    <input type="time" name="start" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">End</label>
                                                    <input type="time" name="end" class="form-control" required />
                                                </div>
                                            </div>

                                            <input type="hidden" name="dayname" value="Tuesday" />

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
            
                                        </div>
                                    </form>

                                    <h5 class="my-3">Slots</h5>

                                    @php
                                        $startday = get_schedule('Tuesday');
                                    @endphp
                                    
                                    @if($startday != null)
                                        @php
                                            $s_time = explode( ',', $startday->start_time);
                                            $e_time = explode( ',', $startday->end_time);
                                        @endphp

                                       
                                        @for ($i=0; $i < count($s_time); $i++)
                                            <button class="badge bg-primary">{{ $s_time[$i] }} -- {{ $e_time[$i] }}</button>
                                        @endfor
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="v-pills-wednesday" role="tabpanel"
                                    aria-labelledby="v-pills-wednesday-tab" tabindex="0">
                                    <h5>Create New Slot</h5>
                                    <form action="{{ route('doctor.schedules.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Start</label>
                                                    <input type="time" name="start" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">End</label>
                                                    <input type="time" name="end" class="form-control" required />
                                                </div>
                                            </div>

                                            <input type="hidden" name="dayname" value="Wednesday" />

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
            
                                        </div>
                                    </form>

                                    <h5 class="my-3">Slots</h5>

                                    @php
                                        $startday = get_schedule('Wednesday');
                                    @endphp
                                    
                                    @if($startday != null)
                                        @php
                                            $s_time = explode( ',', $startday->start_time);
                                            $e_time = explode( ',', $startday->end_time);
                                        @endphp

                                       
                                        @for ($i=0; $i < count($s_time); $i++)
                                            <button class="badge bg-primary">{{ $s_time[$i] }} -- {{ $e_time[$i] }}</button>
                                        @endfor
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="v-pills-thursday" role="tabpanel"
                                    aria-labelledby="v-pills-thursday-tab" tabindex="0">
                                    <h5>Create New Slot</h5>
                                    <form action="{{ route('doctor.schedules.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Start</label>
                                                    <input type="time" name="start" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">End</label>
                                                    <input type="time" name="end" class="form-control" required />
                                                </div>
                                            </div>

                                            <input type="hidden" name="dayname" value="Thursday" />

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
            
                                        </div>
                                    </form>

                                    <h5 class="my-3">Slots</h5>

                                    @php
                                        $startday = get_schedule('Thursday');
                                    @endphp
                                    
                                    @if($startday != null)
                                        @php
                                            $s_time = explode( ',', $startday->start_time);
                                            $e_time = explode( ',', $startday->end_time);
                                        @endphp

                                       
                                        @for ($i=0; $i < count($s_time); $i++)
                                            <button class="badge bg-primary">{{ $s_time[$i] }} -- {{ $e_time[$i] }}</button>
                                        @endfor
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="v-pills-friday" role="tabpanel"
                                    aria-labelledby="v-pills-friday-tab" tabindex="0">
                                    <h5>Create New Slot</h5>
                                    <form action="{{ route('doctor.schedules.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Start</label>
                                                    <input type="time" name="start" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">End</label>
                                                    <input type="time" name="end" class="form-control" required />
                                                </div>
                                            </div>

                                            <input type="hidden" name="dayname" value="Friday" />

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
            
                                        </div>
                                    </form>

                                    <h5 class="my-3">Slots</h5>

                                    @php
                                        $startday = get_schedule('Friday');
                                    @endphp
                                    
                                    @if($startday != null)
                                        @php
                                            $s_time = explode( ',', $startday->start_time);
                                            $e_time = explode( ',', $startday->end_time);
                                        @endphp

                                       
                                        @for ($i=0; $i < count($s_time); $i++)
                                            <button class="badge bg-primary">{{ $s_time[$i] }} -- {{ $e_time[$i] }}</button>
                                        @endfor
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script></script>
@endpush
