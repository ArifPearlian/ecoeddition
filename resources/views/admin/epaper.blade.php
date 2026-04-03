@extends('admin.layouts.app')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@section('content')
  

      <div class="container">
        <div class="app-page-head d-flex flex-wrap gap-3 align-items-center justify-content-between">
          <div class="clearfix">
            <h1 class="app-page-title">Ad List</h1>
            </div>
      
        </div>
       <div class="col-lg-12 col-sm-12">
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-4">
                <div class="card-header">
                  <h4>Upload E-Paper PDF</h4>
                </div>
                <div class="card-body">
                  
                  <form action="{{ route('admin.epaper.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                      <label>Title</label>
                      <input type="text" name="title" class="form-control" placeholder="Eco Edition - March 2026" required>
                    </div>

                    <div class="mb-3">
                      <label>Upload PDF</label>
                      <input type="file" name="file" class="form-control" accept="application/pdf" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Upload</button>
                  </form>

                </div>
              </div>
              </div>

              <div class="col-md-8">
                 <table id="epaperTable" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>PDF</th>
                          <th>Date</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($epapers as $paper)
                        <tr>
                          <td>{{ $paper->id }}</td>
                          <td>{{ $paper->title }}</td>
                          <td>
                            <a href="{{ asset('uploads/epapers/'.$paper->file) }}" target="_blank" class="btn btn-success btn-sm">
                              View PDF
                            </a>
                          </td>
                          <td>{{ $paper->created_at }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>

              
            </div>
          </div>




      </div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#epaperTable').DataTable({
        "pageLength": 10,
        "lengthMenu": [10, 25, 50, 100]
    });
});
</script>
@endsection