@extends('users-dashboard.layouts.master')

@section('pageTitle') <i class="fas plus-circle"></i> Edit Album @endsection

@section('content')

<div class="box">

    <div class="box-header">

        <h3 class="box-title">Edit Information</h3>

        <div class="button-page-header" style="margin-top:5px">
            <a class="btn btn-warning" href="{{ route('albums.index') }}">
            <i class="fa fa-reply fa-fw fa-lg"></i> Back</a>
        </div>
        
    </div>

    <div class="box-body">
            
        <form id="myForm" action="{{ route('albums.update', $album->id) }}" method="POST" class="userForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type='hidden' name='album_id' value="{{ $album->id }}">

            <div class="row">

                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="name" class='form-text'><b>Name</b></label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $album->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12 mb-5">
                    <div class="form-group">
                        <label for="#pictures" class='form-text'><b>Pictures</b></label>
                        <input type="file" name='pictures[]' id='pictures' class='form-control' multiple>
                        @error('pictures')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="image-preview d-flex flex-wrap">
                       @foreach($album->pictures as $picture)
                            <div class='col-md-4 position-relative'>
                                <img src="{{ asset($picture->path) }}" style='width:100%'>
                                <a href="{{ route('albums.remove.picture', $picture->id) }}" class='remove-image position-absolute text-danger'>
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                       @endforeach
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-block w-100" style="font-size:16px"><i class="fa fa-check fa-fw fa-lg"></i> Update</button>
                    </div>
                </div>

            </div>
 
        </form>
                
    </div>    

</div>

@endsection 