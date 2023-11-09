<div>
    @foreach ($comments as $comment)
        <div class="col-md-8 col-lg-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                {{ strtoupper(substr($comment->user->name, 0, 2)) }}
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="card-text">{{ $comment->content }}</p>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Comment by: {{ $comment->user->name }}</small>
                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

