<div class="modal fade" tabindex="-1" id='delete-confirm'>

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Delete Album</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <p id='message'>When Click On Delete Will Delete Album And It's Pictures </p>

                <form method='post' action="{{ route('albums.destroy.move', $album->id) }}" class='d-inline' id="move_picture">
                    @csrf
                    @method('post')
                    
                    <div class="form-group d-none" id='albums-select'>
                        <label for="#albums" class='form-text'>Select Album</label>
                        <select class='form-control' name='album'>
                            @foreach($albums as $albume)
                                @if($album->id != $albume->id)
                                    <option value='{{ $albume->id }}'>{{ $albume->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" id='delete-album-modal' class="btn btn-secondary" data-bs-dismiss="modal">Delete</button>
                <button type="submit" id='choose-another-album-modal' class="btn btn-primary" form="move_picture">Move To Another Album</button>
            </div>

        </div>

    </div>

</div>