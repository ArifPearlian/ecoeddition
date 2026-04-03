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
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Ad List</h4>
                  </div>
                  <div class="card-body">
                   <div class="table-responsive">
                      <div class="table-responsive">
                        <table id="adsTable" class="table table-bordered table-striped">

                        <thead>
                        <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Business</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
                        </thead>

                        <tbody>
                        @foreach($requests as $req)
            <tr>
                <td>{{ $req->id }}</td>
                <td>{{ $req->name }}</td>
                <td>{{ $req->business }}</td>
                <td>{{ $req->email }}</td>
                <td>{{ $req->phone }}</td>
                <td>{{ $req->message }}</td>
                <td>{{ $req->created_at }}</td>
            </tr>
            @endforeach

                        </tbody>

                        </table>
                        </div>
                      </div> 
                  </div>
                </div>
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
    $('#adsTable').DataTable({
        "pageLength": 10,
        "lengthMenu": [10, 25, 50, 100]
    });
});
</script>
@endsection