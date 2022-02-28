@extends('layouts.dashboard-admin.app')
@section('content')
   <div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Report MBS Body Repair Periodic</h1>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="card-body">
        <form action="{{ route('print-periodik') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="startDate">Start Date</label>
            <input type="date" name="startDate" id="startDate" class="form-control">
          </div>
          <div class="form-group">
            <label for="endDate">End Date</label>
            <input type="date" name="endDate" id="endDate" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-print mr-2"></i>Print Report</button>
        </form>
      </div>
    </div>
  </div>


</div>
@endsection