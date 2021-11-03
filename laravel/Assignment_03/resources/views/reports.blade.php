@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        New Report
      </div>

      <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Report Form -->
        <form action="{{ url('report/add')}}" method="POST" class="form-horizontal">
          {{ csrf_field() }}

          <!-- Task Name to report -->
          <div class="form-group">
            <label for="report-name" class="col-sm-3 control-label">Report</label>

            <div class="col-sm-6">
              <!-- <input type="text" name="name" id="report-name" class="form-control" value="{{ old('report') }}"> -->
              <select name="name" class="form-select ">
                @foreach ($tasks as $task)
                <option value="{{ $task->name }}">{{ $task->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="done" class="col-sm-3 control-label">Done</label>
            <div class="col-sm-6">
              <input type="text" name="done" id="report-done" class="form-control" value="{{ old('report') }}">
            </div>
          </div>
          <div class="form-group">
            <label for="progress" class="col-sm-3 control-label">Progress</label>
            <div class="col-sm-6">
              <input type="text" name="progress" id="progress" class="form-control" value="{{ old('report') }}">
            </div>
          </div>
          <div class="form-group">
            <label for="problem" class="col-sm-3 control-label">Problem</label>
            <div class="col-sm-6">
              <input type="text" name="problem" id="problem" class="form-control" value="{{ old('report') }}">
            </div>
          </div>

          <!-- Add Report Button -->
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-plus"></i>Add Report
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- Current Reports -->
    @if (count($reports) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        Current Reports
      </div>

      <div class="panel-body">
        <table class="table table-striped task-table">
          <thead>
            <th>Report</th>
            <th>Done</th>
            <th>Progress</th>
            <th>Problem</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </thead>
          <tbody>
            @foreach ($reports as $report)
            <tr>
              <td class="table-text">
                <div>{{ $report->name }}</div>
              </td>
              <td class="table-text">
                <div>{{ $report->done }}</div>
              </td>
              <td class="table-text">
                <div>{{ $report->progress }}</div>
              </td>
              <td class="table-text">
                <div>{{ $report->problem }}</div>
              </td>
              <!-- Report Delete Button -->
              <td>
                <form action="{{ url('report/'.$report->id) }}" method="POST" onSubmit="return confirm('Do you want to delete this report?')">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" class="btn btn-danger">
                    <i class="fa fa-btn fa-trash"></i>Delete
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection