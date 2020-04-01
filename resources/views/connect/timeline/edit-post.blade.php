<?php 
    if(Auth::user()->picture){
    $photo = Auth::user()->picture;
    }else{
    $photo = 'https://via.placeholder.com/150?text='.Auth::user()->first_name;
    }
?>
<form  id="updatePost">
<div class="modal-header">
            <h6 class="modal-title">Edit post</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
            
            <div class="row">
                <div class="col-lg-12">
            <div class="bg-white">
                <div class="post-new-contain row card-block">
                    <div class="col-md-1 col-xs-1 p-0 m-l-20">
                        <img src="{{ $photo }}" class="img-fluid img-radius"
                            alt="">
                    </div >
                    <input type="hidden" name="id" id="timelineid" value="{{$timeline->id}}">
                        @csrf
                        <div class="col-md-10 col-xs-10">
                            <textarea id="post-message-popup" class="form-control post-input m-b-10" name="post_content" style="border: 1px solid #ccc;"
                                rows="3" cols="10" required=""
                                placeholder="Write something...">{{$timeline->post_content}}</textarea>
                        </div>
@if($timeline->tag_friends)
<div class="col-md-10 col-xs-10 " style="margin-left: 87px;">
with {{$timeline->tag_friends}}
</div>
@endif
@if($timeline->location)
<div class="col-md-10 col-xs-10 " style="margin-left: 87px;">
at {{$timeline->location}}
</div>
@endif
                   
                </div>
          <div class="post-new-footer b-t-muted p-15">
                    <div class="col-sm-11 col-lg-11 m-l-30 hide" id="with">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text">With</label>
                            </span>
                            <input class="form-control" id="mySelect2" name="tag_friends" placeholder="Who are you with?" value="{{$timeline->tag_friends}}">
                               
                        </div>
                    </div>
                    <div class="col-sm-11 col-lg-11 m-l-30 hide" id="location">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text">Location</label>
                            </span>
                            <input type="text" class="form-control" name="location" placeholder="Share location" value="{{$timeline->location}}">
                        </div>
                    </div>

                            <span class="image-upload m-r-15"
                                title="Upload image">
                                <input type="file" name="files[]" id="filer_input1" multiple="multiple">
                            </span>

@if($timeline_images)

<div class="jFiler-items jFiler-row">
    <ul class="jFiler-items-list jFiler-items-grid">
    @foreach($timeline_images as $tim)
        <li class="jFiler-item" data-jfiler-index="0" style="">
            <div class="jFiler-item-container">
                <div class="jFiler-item-inner">
                    <div class="jFiler-item-thumb">
                        <div class="jFiler-item-thumb-image"><img src="{{$tim->image_path}}" draggable="false">
                        </div>
                    </div>
                    <div class="jFiler-item-assets jFiler-row">
                        <ul class="list-inline pull-right">
                            <li>
                                <a data-id="{{$tim->id}}" href="javascript:;" class="icon-jfi-trash jFiler-item-trash-action deleteImage"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
    </ul>
</div>
@endif
                </div>

            </div>
            </div>
      </div>
        </div>
        <div class="modal-footer">
            <select class="options m-l-20" name="post_privacy">
                <option value="public" @if($timeline->privacy == 'public') selected @endif >Public</option>   
                <option value="friends" @if($timeline->privacy == 'friends') selected @endif >Friends</option>
                <option value="followers" @if($timeline->privacy == 'followers') selected @endif >Followers</option>
                <option value="only-me" @if($timeline->privacy == 'only-me') selected @endif >Only Me</option>
            </select>
            
            <button type="button" class="btn theme-outline-btn float-right" onclick="closePopup({{$timeline->id}})" data-dismiss="modal">Cancel</button>
            <span><a href="javascript:;" id="post-update"
                class="btn theme-btn waves-effect waves-light float-right"
                >Update</a></span>
          </div>
</form>

<!-- jquery file upload js -->
<script src="{{ asset('resources/assets/files/assets/pages/jquery.filer/js/jquery.filer.min.js') }}"></script>

<script src="{{ asset('resources/assets/files/assets/pages/filer-modified/jquery.fileuploads.init.js') }}" type="text/javascript"></script>