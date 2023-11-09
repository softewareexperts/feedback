<div>
   @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
<div class="card card-body">
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                <div class="d-flex flex-start w-100">
                <div class="form-outline w-100">
                <textarea wire:model="commentText" class="form-control" id="textAreaExample" rows="4" style="background: #fff;" wire:ignore>
                 </textarea>

                    
                    <label class="form-label" for="textAreaExample">Message</label>
                </div>
                </div>
                <div class="float-end mt-2 pt-1">
                <button wire:click="addComment" class="btn btn-primary btn-sm">Post comment</button>
                <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                </div>
              </div>    
             </div>
        </div>

</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#textAreaExample").emojioneArea();
  });
</script>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('initEmojiArea', function () {
            $("#textAreaExample").emojioneArea();
        });
    });
</script>
