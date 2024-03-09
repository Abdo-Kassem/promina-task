@extends('users-dashboard.layouts.master')

@section('pageTitle') <i class="fas plus-circle"></i> show Album @endsection

@section('content')

<div class="box">

    <div class="box-header">

        <h3 class="box-title">show Album</h3>

        <div class="button-page-header" style="margin-top:5px">
            <a class="btn btn-warning" href="{{ route('albums.index') }}">
            <i class="fa fa-reply fa-fw fa-lg"></i> Back</a>
        </div>
        
    </div>

    <div class="box-body show">
            
        <div class="row">

            <div class="col-md-4">
                <h4>Name</h4>
                <p>{{ $album->name }}</p>
            </div>

            <div class="col-md-4">
                <h4>Creation Date</h4>
                <p>{{ $album->created_at->format('Y/m/d H:i') }}</p>
            </div>

            <div class="col-md-4">
                <h4>updation Date</h4>
                <p>{{ $album->updated_at->format('Y/m/d H:i') }}</p>
            </div>

        </div>

        <hr>

        <div class="row">

            @foreach($album->pictures as $picture)
                <div class="col-md-4 mb-4">

                    <div class="img">
                        <img src="{{ asset($picture->path) }}" alt='Picture Image'>
                    </div>

                    <div class="image-info">
                        <p>
                            {{ $picture->name }}
                        </p>
                    </div>

                </div>
            @endforeach

        </div>
                
    </div>    

</div>

@endsection 