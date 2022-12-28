<div class="d-flex action-button">
    
        <a href="{{ route('albums.edit', $album->id) }}"
           class="btn btn-info btn-sm light  m-1">
            <i class="fa fa-edit"></i>
        </a> 

        <a href="{{route('pictures', $album->id)}}" id="{{$album->id}}" type="submit"
            class="me-2 btn btn-sm  light btn-success m-1">
            <i class="fa fa-list"></i> Pictures
        </a> 
        @if(count($album->pictures) > 0)
            <a data-toggle="modal" data-target="#delete{{$album->id}}" id="{{$album->id}}" 
                class="me-2 btn btn-sm  light btn-danger m-1 remove_record">
                <i class="fa fa-trash"></i>
            </a>
        @else
          <a href="{{route('albums.destroy', $album->id)}}" id="{{$album->id}}" type="submit"
            class="me-2 btn btn-sm  light btn-danger m-1 remove_record">
            <i class="fa fa-trash"></i></a>
        @endif

        
  <!-- Modal -->
  <div class="modal fade" id="delete{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete {{ $album->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <ul>
            <li><button class="me-2 btn btn-sm  light btn-primary m-1 move-pictures"> Move Pictures to Another Album</button>
                <ul class="hidden choose-albums">
                   <h4> Choose Album</h4>
                   @php
                      
                    foreach($albums as $thisalbum) 
                    {  
                        if($thisalbum->id != $album->id){
                          echo "<li><a href='". route('albums.move',[$album->id, $thisalbum->id]) . "'>".$thisalbum->name."</a></li>";
                        }
                    }
                    @endphp
                </ul>
            </li>
            
            <li><a href="{{route('albums.destroy', $album->id)}}" id="{{$album->id}}" type="submit"
                class="me-2 btn btn-sm  light btn-danger m-1 remove_record">Delete All Pictures</a></li>
           </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

