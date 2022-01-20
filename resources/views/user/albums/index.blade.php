@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Albums
                </div>
                <div class="card-body">
                    {{-- //if there is no entries in albums table this message will show --}}
                    @if (count($albums)=== 0)
                    <p>There are no albums</p>
                    @else
                    {{-- //if there is entries they will be displaied in this table format --}}
                    <table id="table-albums" class="table table-hover">
                        <thead>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Price</th>
                            <th>Number Of Tracks</th>
                        </thead>
                        <tbody>
                            {{-- //each entrie will follow the same format --}}
                            @foreach ($albums as $album)
                            <tr data-id="{{ $album->id }}">
                                <td>{{ $album->title }}</td>
                                <td>{{ $album->artist }}</td>
                                <td>{{ $album->price }}</td>
                                <td>{{ $album->no_of_tracks }}</td>
                                <td>
                                    {{-- //view button that routes to the show page --}}
                                    <a href="{{ route('user.albums.show', $album->id) }}" class="btn btn-primary">View</a>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- //back button that takes you back to admin homepage --}}
                    <a href="{{ route('home') }}" class="btn btn-default">Back</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
