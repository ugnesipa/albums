@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                    Edit Album
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
                        {{-- //form to fill in new albums details that will be transfered to update function --}}
                        <form method="POST" action="{{ route('admin.albums.update', $album->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $album->title) }}" />
                            </div>
                            <div class="form-group">
                                <label for="artist">Artist</label>
                                <input type="text" class="form-control" id="artist" name="artist" value="{{ old('artist', $album->artist) }}" />
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $album->price) }}" />
                            </div>
                            <div class="form-group">
                                <label for="title">Number Of Tracks</label>
                                <input type="number" class="form-control" id="no_of_tracks" name="no_of_tracks" value="{{ old('no_of_tracks', $album->no_of_tracks) }}" />
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
