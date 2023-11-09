<base href="/public">
@extends('admin.app')
@section('title')
Dashboard
@endsection
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Items</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Total feedback</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse($items as $item)
                  <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->category }}</td>
                    <td> {{ count($item->feedback) }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm"><a style="color:inherit" href="{{ route('handle.item',$item->id) }}">view item</a></button>
                        <button class="btn btn-{{ $item->status == 1 ? 'danger' : 'success' }} btn-sm"><a style="color:inherit" href="{{ route('disable.item',$item->id) }}">{{ $item->status == 1 ? 'Disable' : 'Enable' }}</a></button>
                        <button class="btn btn-primary btn-sm"> Edit </button>

                    </td>
                  </tr>
                  @empty

                  @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection