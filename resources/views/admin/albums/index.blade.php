@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Albums
                    {{-- //add new albums button that routes to create page --}}
                    <a href="{{ route('admin.albums.create') }}" class="btn btn-primary float-end">Add</a>
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
                                    <a href="{{ route('admin.albums.show', $album->id) }}" class="btn btn-default">View</a>
                                    {{-- //edit button that routes to the edit page --}}
                                    <a href="{{ route('admin.albums.edit', $album->id) }}" class="btn btn-warning">Edit</a>
                                    {{-- //delete button that deletes the album entry from the database --}}
                                    <form style="display:inline-block" method="POST" action="{{ route('admin.albums.destroy', $album->id) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger">Delete</button>
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
