@extends('users-dashboard.layouts.master')

@section('pageTitle') <i class="fas plus-circle"></i> Albums @endsection

@section('content')

<div class="box">

    <div class="box-header">

        <h3 class="box-title">Show Albums</h3>

        <div class="button-page-header" style="margin-top:5px">
            <a class="btn btn-primary" href="{{ route('albums.create') }}">
            <i class="fa fa-reply fa-fw fa-lg"></i> Create New</a>
        </div>
        
    </div>

    <div class="box-body">
            
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th><b>Name</b></th>
                        <th><b>Date</b></th>
                        <th><b>Manage</b></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($albums as $album)
                        <tr>
                            <td>{{ $album->name }}</td>
                            <td>{{ $album->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('albums.show', $album->id) }}" class='btn btn-warning text-white'>
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('albums.edit', $album->id) }}" class='btn btn-success'>
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method='post' action="{{ route('albums.destroy', $album->id) }}" class='d-inline delete_album' id="form{{ $album->id }}">
                                    @csrf
                                    @method('delete')
                                    <button class='delete-album-submit btn btn-danger' data-bs-toggle="modal" data-bs-target="#delete-confirm"><i class="fas fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
                
    </div>    

</div>

@include('users-dashboard.pages.albums.modals.confirm-delete')

@endsection 