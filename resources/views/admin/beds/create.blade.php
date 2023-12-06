@extends('layouts.admin.app')

@section('title')
    Create Bed 
@endsection

@section('breadcrumb')
    Create Bed 
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="h5 mb-0">
                            {{ __('Create New Bed') }}
                        </div>
                        <a href="{{ route('admin.beds.index') }}" class="btn btn-primary">View List</a>
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

                        <form action="{{ route('admin.beds.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                        
                            
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Room</label>
                                        <select name="room_id" class="form-control" required>
                                            @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}">{{ $room->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                           
                               
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" required />
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
        document.getElementById('image').addEventListener('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').setAttribute('src', e.target.result);
                document.getElementById('image-preview').style.display = 'block';
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
@endpush
