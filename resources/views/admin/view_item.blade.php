<base href="/public">
@extends('admin.app')
@section('title')
Dashboard
@endsection
@section('content')
<section class="content">

<!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h3 class="d-inline-block d-sm-none">{{ $detail->title }}</h3>
      <div class="col-12 col-sm-6">
        <h3 class="my-3">{{ $detail->title }}</h3>
        <p>{{ $detail->description }}</p>
        <hr>
      </div>
    </div>
    <div class="row mt-4">
      <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
          <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">FeedBacks</a>
        </div>
      </nav>
      <div class="tab-content p-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
    <div class="container mt-4">
    @forelse ($detail->feedback as $item)

        <div class="mb-4">
            <h5>{{ $item->title }}</h5>
            <div class="alert alert-success" role="alert">
            {{ $item->description }}
            </div>
            <ul class="list-group">
            <livewire:comments-list :feedbackId="$item->id" :userId="@auth()->user()->id" />
            </ul>
            <button class="btn btn-{{ $item->status == 1 ? 'danger' : 'success' }} btn-sm"><a style="color:inherit" href="{{ route('disable.feed',$item->id) }}">{{ $item->status == 1 ? 'Disable' : 'Enable' }}</a></button>
        </div>
        @empty
        
        @endforelse
    </div>
</div>

    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
@endsection