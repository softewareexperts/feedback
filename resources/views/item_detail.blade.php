@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center mb-3">
      <div class="col-md-12 col-xl-10">
      @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
         </ul>
        </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp"
                    class="w-100" />
                  <a href="#!">
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-6">
                <h5>{{ $detail->title }}</h5>
                <p class="text-truncate mb-4 mb-md-0">
                 {{ $detail->description }}
                </p>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1">{{ $detail->category }}</h4>
                </div>
                <div class="d-flex flex-column mt-4">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                    Add Your Feedback
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('submit.feedback',$detail->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Title</label>
                                <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Description</label>
                                <input type="text" name="description" class="form-control" id="formGroupExampleInput2" placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Category</label>
                                <select name="category" class="form-control select2" style="width: 100%;">
                                  <option value="Bug fix">Bug fix</option>
                                  <option value="Improvements">Improvements</option>
                                  <option value="Mantainace">Mantainace</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>

                        </div>
                    </div>
                    </div> 
                  <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                    Total Feedback {{ count($detail->feedback->where('status', 1)) }}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section style="background-color: #eee;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
      @forelse ($detail->feedback as $item)
        @php
            $commentId = "comment_" . $item->id;
        @endphp
        @if ($item->status == 1)
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-start align-items-center">
              <div>
                <h6 class="fw-bold text-primary mb-1">{{ $item->user->name }}</h6>
                <p class="text-muted small">
                  Shared publicly - {{ $item->created_at }}
                </p>
              </div>
            </div>
            <p class="text-muted small">
                  Title - {{ $item->title }}
                </p>
                <p class="text-muted small">
                  category - {{ $item->category }}
                </p>
            <p class="mt-3 mb-4 pb-2">
              {{ $item->description }}
            </p>
            <div class="small d-flex justify-content-start">
            <livewire:vote-feedback :feedbackId="$item->id" :userId="@auth()->user()->id" :productId="$detail->id" />
           <a data-toggle="collapse" href="#{{ $commentId }}" role="button" aria-expanded="false" aria-controls="{{ $commentId }}" class="d-flex align-items-center me-3">
                <i class="far fa-comment-dots me-2"></i>
                <p class="mb-0">Comment</p>
              </a>
          </div>
          <div class="collapse"  id="{{ $commentId }}">
           <div class="row d-flex justify-content-center">
               <livewire:comments-list :feedbackId="$item->id" :userId="@auth()->user()->id" />
               </div>
                <livewire:comment :feedbackId="$item->id" :userId="@auth()->user()->id" />
           </div>
       @endif
           @empty
        
        @endforelse
      </div>
      </div>
    </div>
  </div>

</section>
          

@endsection