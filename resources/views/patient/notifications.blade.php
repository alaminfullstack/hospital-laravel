@extends('layouts.patient.app')

@section('title')
    Notification list
@endsection


@section('breadcrumb')
    Notifications
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('Notifications') }}
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
                                        <th scope="col">Date</th>
                                        <th scope="col">From</th>
                                        <th scope="col">Purpose</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse (unread_notification(auth()->id(), 'Patient') as $notification)
                                        <tr>
                                            <td>
                                                {{ $notification->created_at->format('d-m-Y') }}
                                            </td>

                                            <td>
                                                @php
                                                    $from = get_from_notifier($notification->from_id, $notification->from_type);
                                                @endphp
                                                <p><b>{{ $notification->from_type }}: </b></p>
                                                @if ($from != null)
                                                    <div>{{ $from->name ?? null }}</div>
                                                    <div>{{ $from->mobile ?? null }}</div>
                                                    <div>{{ $from->address ?? null }}</div>
                                                  
                                                @endif

                                            </td>

                                            <td>
                                                {{ $notification->purpose }}
                                            </td>

                                            <td>
                                                {{ $notification->description }}
                                            </td>

                                            <td>
                                                <div class="d-flex">

                                                    @if ($notification->status == 0)
                                                    <form method="GET" action="{{ route('patient.notifications.delete', $notification->id) }}">
                                                            
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this Service?')">Delete</button>
                                                        </form>
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



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
