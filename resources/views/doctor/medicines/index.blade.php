@extends('layouts.doctor.app')

@section('title')
    Medicine list
@endsection


@section('breadcrumb')
    Medicines
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('Medicines') }}
                        </div>
                        <a href="{{ route('doctor.medicines.create') }}" class="btn btn-primary">Create New</a>
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
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($medicines as $room)
                                        <tr>
                                            <td>
                                                {{ $medicines->firstItem() + $loop->index }}
                                            </td>

                                            <td>
                                                {{ $room->title }}
                                            </td>
                                           
                                     
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-sm btn-primary me-3"
                                                    href="{{ route('doctor.medicines.edit', $room->id) }}">Edit</a>

                                                    <form method="POST"
                                                        action="{{ route('doctor.medicines.destroy', $room->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this Medicine?')">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Data Has Empty. Create a New <a href="{{ route('doctor.medicines.create') }}">Click
                                                    Here</a></td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>

                        {!! $medicines->links() !!}

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
