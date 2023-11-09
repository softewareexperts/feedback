@extends('layouts.app')

@section('content')
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center mb-3">
    @forelse($item as $item)
      <div class="col-md-12 col-xl-10">
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
                <h5>{{ $item->title }}</h5>
                <p class="text-truncate mb-4 mb-md-0">
                 {{ $item->description }}
                </p>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1">{{ $item->category }}</h4>
                </div>
                <div class="d-flex flex-column mt-4">
                  <a href="{{ route('item.detail',$item->id) }}" class="btn btn-primary btn-sm" type="button">Details</a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @empty
      The collection is empty.
@endforelse
    </div>
  </div>
</section>

@endsection
