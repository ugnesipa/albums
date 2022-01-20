@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Add new Album
                </div>
                <div class="card-body">
                    {{-- //display any errors as an alert message --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        {{-- //form to fill in new albums details that will be transfered to store function --}}
                        <form method="POST" action="{{ route('admin.albums.store') }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
                            </div>
                            <div class="form-group">
                                <label for="artist">Artist</label>
                                <input type="text" class="form-control" id="artist" name="artist" value="{{ old('artist') }}" />
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" />
                            </div>
                            <div class="form-group">
                                <label for="no_of_tracks">Number Of Tracks</label>
                                <input type="number" class="form-control" id="no_of_tracks" name="no_of_tracks" value="{{ old('no_of_tracks') }}" />
                            </div>
                            {{-- //insert image --}}
                            <div class="form-group">
                                <label for="album_image">Album Image</label>
                                <input type="file" class="form-control" id="album_image" name="album_image" />
                            </div>
                            {{-- //cancel and go back to index --}}
                            <a href="{{ route('admin.albums.index') }}" class="btn btn-outline">Cancel</a>
                            {{-- //form submit button --}}
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
