@extends('admin.layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

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

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table id="adsTable" class="table table-bordered table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Ad Type</th>
                                        <th>Size / Display Type</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Words</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Payment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($ads as $key => $ad)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            

                                            <td>{{ ucfirst(str_replace('-', ' ', $ad->category)) }}</td>

                                            <td>{{ strtoupper($ad->ad_type) }}</td>

                                            <td>
                                                @if($ad->ad_type === 'display')
                                                    {{ ucfirst($ad->display_type ?? 'normal') }}
                                                @else
                                                    {{ $ad->ad_size_label ?? $ad->ad_size ?? 'N/A' }}
                                                @endif
                                            </td>

                                            <td>{{ $ad->title }}</td>

                                            <td>
                                                @if(!empty($ad->article_image))
                                                    <img src="{{ asset('classified_ads/'.$ad->article_image) }}" width="60" height="60" style="object-fit:cover; border-radius:6px;">
                                                @else
                                                    <span class="badge bg-secondary">No Image</span>
                                                @endif
                                            </td>

                                            <td>{{ $ad->word_count ?? 0 }}</td>

                                            <td>₹{{ number_format($ad->total_price ?? 0) }}</td>

                                            <td>
                                                <span class="badge bg-info">
                                                    {{ ucfirst($ad->status ?? 'draft') }}
                                                </span>
                                            </td>

                                            <td>
                                                <span class="badge {{ ($ad->payment_status ?? 'pending') == 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                                                    {{ ucfirst($ad->payment_status ?? 'pending') }}
                                                </span>
                                            </td>

                                            <td>{{ $ad->created_at ? $ad->created_at->format('d M Y, h:i A') : 'N/A' }}</td>

                                            <td>
                                                <a href="{{ route('admin.ads.view', $ad->id) }}" class="btn btn-info btn-sm mb-1">
                                                    View
                                                </a>

                                                <form action="{{ route('admin.ads.delete', $ad->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this ad?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#adsTable').DataTable({
        pageLength: 10,
        lengthMenu: [10, 25, 50, 100],
        order: [[0, 'desc']]
    });
});
</script>

@endsection