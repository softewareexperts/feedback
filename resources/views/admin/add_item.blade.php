<base href="/public">
@extends('admin.app')
@section('title')
Dashboard
@endsection
@section('content')
<section class="content">
      <div class="container-fluid">
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
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
        <div class="row">
          <!-- /.col (left) -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <form method="post" action="{{ route('post.product') }}">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Title</label>
                    <div class="input-group date">
                        <input type="text" name="title" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                  <label>Description</label>
                    <div class="input-group date">
                        <textarea type="text" name="description" class="form-control datetimepicker-input"></textarea>
                    </div>
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <select name="category" class="form-control select2" style="width: 100%;">
                    <option value="Tech">Tech</option>
                    <option value="Data Analysis">Data Analysis</option>
                    <option value="Business">Business</option>
                    <option value="Art">Art</option>

                  </select>
                </div>
                <!-- /.form group -->
                <!-- /.form group -->
                <div class="form-group">
                    <div class="input-group date">
                        <input type="submit" class="form-control datetimepicker-input"/>
                    </div>
                </div>
              </div>
          </form>
                <div class="card-footer">
               
                </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
          <!-- /.col (right) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection