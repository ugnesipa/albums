@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">

                {{-- //each individual album entry will be shown in this template --}}
                <div class="card-header">
                    Album: {{ $album->title }}
                </div>
                <div class="card-body">
                    <table id="table-albums" class="table table-hover">
                        <tbody>
                            <tr>
                                <td rowspan="8"><img src="{{ asset('storage/images/' . $album->image_location) }}" width="150"></td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td>{{ $album->title }}</td>
                            </tr>
                            <tr>
                                <td>Artist</td>
                                <td>{{ $album->artist }}</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>{{ $album->price }}</td>
                            </tr>
                            <tr>
                                <td>Number Of Tracks</td>
                                <td>{{ $album->no_of_tracks }}</td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- //back button that takes you back to index page --}}
                    <a href="{{ route('user.albums.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
