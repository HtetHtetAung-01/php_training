@extends('layouts.app')
@section('content')

<div class="container">
  <div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        Upload CSV File
      </div>
      <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group panel-body">
          <div class="col-md-6">
            <input type="file" name="file" class="form-control">
          </div>
          <div class="col-md-6 offset-md-4">
            <button class="btn btn-primary">Upload</button>
            <button type="reset" class="btn btn-secondary">
              Clear
            </button>
          </div>
      </form>
    </div>
  </div>
</div>

@endsection