@extends('admin.layouts.app')

@section('content')

<div class="container">

    <div class="app-page-head d-flex justify-content-between align-items-center mb-3">
        <h3 class="app-page-title">Ad Details</h3>

        <a href="{{ url('admin/adlist') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Top Section --}}
            <div class="row mb-4">

                {{-- Main Ad Image --}}
                <div class="col-md-4 text-center">
                    @if(!empty($ad->article_image))
                        <img src="{{ asset('classified_ads/'.$ad->article_image) }}"
                             class="img-fluid rounded shadow border"
                             style="max-height:250px; object-fit:cover;">
                    @else
                        <div class="border rounded p-5 bg-light text-muted">
                            No Ad Image
                        </div>
                    @endif
                </div>

                {{-- Basic Details --}}
                <div class="col-md-8">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="220">Ad ID</th>
                            <td>{{ $ad->id }}</td>
                        </tr>

                        

                        <tr>
                            <th>Category</th>
                            <td>{{ ucfirst(str_replace('-', ' ', $ad->category ?? 'N/A')) }}</td>
                        </tr>

                        <tr>
                            <th>Ad Type</th>
                            <td>{{ strtoupper($ad->ad_type ?? 'N/A') }}</td>
                        </tr>

                        <tr>
                            <th>Ad Size / Display Type</th>
                            <td>
                                @if(($ad->ad_type ?? '') === 'display')
                                    {{ ucfirst($ad->display_type ?? 'normal') }}
                                @else
                                    {{ $ad->ad_size_label ?? $ad->ad_size ?? 'N/A' }}
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Title</th>
                            <td>{{ $ad->title ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>Word Count</th>
                            <td>{{ $ad->word_count ?? 0 }}</td>
                        </tr>

                        <tr>
                            <th>Total Price</th>
                            <td>
                                <span class="badge bg-success fs-6">₹{{ number_format($ad->total_price ?? 0) }}</span>
                            </td>
                        </tr>

                        <tr>
                            <th>Payment Status</th>
                            <td>
                                <span class="badge {{ ($ad->payment_status ?? 'pending') == 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ ucfirst($ad->payment_status ?? 'pending') }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                @if(($ad->status ?? '') == 'active')
                                    <span class="badge bg-success">Active</span>
                                @elseif(($ad->status ?? '') == 'approved')
                                    <span class="badge bg-primary">Approved</span>
                                @elseif(($ad->status ?? '') == 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-warning text-dark">{{ ucfirst($ad->status ?? 'Pending') }}</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{ $ad->created_at ? $ad->created_at->format('d M Y, h:i A') : 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td>{{ $ad->updated_at ? $ad->updated_at->format('d M Y, h:i A') : 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- Content / Description Section --}}
            {{-- Ad Content Section --}}
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card border">
            <div class="card-header bg-light">
                <h5 class="mb-0">Ad Content</h5>
            </div>
           <div class="card-body">
                @if(!empty($ad->ad_content))
                    {!! nl2br(e($ad->ad_content)) !!}
                @else
                    <span class="text-muted">No ad content available</span>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Contact Details Section --}}
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card border">
            <div class="card-header bg-light">
                <h5 class="mb-0">Contact Details</h5>
            </div>
            <div class="card-body">
                @if(!empty($ad->contact_details))
                    {!! nl2br(e($ad->contact_details)) !!}
                @else
                    <span class="text-muted">No contact details available</span>
                @endif
            </div>
        </div>
    </div>
</div>

            {{-- Documents Section --}}
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card border">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">KYC / Uploaded Documents</h5>
                        </div>
                        <div class="card-body">

                            <div class="row g-4">

                                {{-- Aadhaar Front --}}
                                <div class="col-md-4 text-center">
                                    <h6>Aadhaar Front</h6>
                                    @if(!empty($ad->aadhaar_front))
                                        <a href="{{ asset('classified_ads/'.$ad->aadhaar_front) }}" target="_blank">
                                            <img src="{{ asset('classified_ads/'.$ad->aadhaar_front) }}"
                                                 class="img-fluid rounded border shadow-sm"
                                                 style="max-height:180px; object-fit:cover;">
                                        </a>
                                        <div class="mt-2">
                                            <a href="{{ asset('classified_ads/'.$ad->aadhaar_front) }}" target="_blank" class="btn btn-sm btn-primary">
                                                View
                                            </a>
                                        </div>
                                    @else
                                        <div class="border rounded p-4 bg-light text-muted">Not Uploaded</div>
                                    @endif
                                </div>

                                {{-- Aadhaar Back --}}
                                <div class="col-md-4 text-center">
                                    <h6>Aadhaar Back</h6>
                                    @if(!empty($ad->aadhaar_back))
                                        <a href="{{ asset('classified_ads/'.$ad->aadhaar_back) }}" target="_blank">
                                            <img src="{{ asset('classified_ads/'.$ad->aadhaar_back) }}"
                                                 class="img-fluid rounded border shadow-sm"
                                                 style="max-height:180px; object-fit:cover;">
                                        </a>
                                        <div class="mt-2">
                                            <a href="{{ asset('classified_ads/'.$ad->aadhaar_back) }}" target="_blank" class="btn btn-sm btn-primary">
                                                View
                                            </a>
                                        </div>
                                    @else
                                        <div class="border rounded p-4 bg-light text-muted">Not Uploaded</div>
                                    @endif
                                </div>

                                {{-- PAN File --}}
                                <div class="col-md-4 text-center">
                                    <h6>PAN File</h6>
                                    @if(!empty($ad->pan_file))
                                        @php
                                            $panExt = pathinfo($ad->pan_file, PATHINFO_EXTENSION);
                                        @endphp

                                        @if(in_array(strtolower($panExt), ['jpg', 'jpeg', 'png', 'webp']))
                                            <a href="{{ asset('classified_ads/'.$ad->pan_file) }}" target="_blank">
                                                <img src="{{ asset('classified_ads/'.$ad->pan_file) }}"
                                                     class="img-fluid rounded border shadow-sm"
                                                     style="max-height:180px; object-fit:cover;">
                                            </a>
                                        @else
                                            <div class="border rounded p-4 bg-light">
                                                <i class="fa fa-file-pdf fa-3x text-danger"></i>
                                                <p class="mt-2 mb-0">PAN Document</p>
                                            </div>
                                        @endif

                                        <div class="mt-2">
                                            <a href="{{ asset('classified_ads/'.$ad->pan_file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                View
                                            </a>
                                        </div>
                                    @else
                                        <div class="border rounded p-4 bg-light text-muted">Not Uploaded</div>
                                    @endif
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Extra Data Section (optional for hidden fields) --}}
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card border">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Additional Information</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th width="220">Display Type</th>
                                    <td>{{ $ad->display_type ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Ad Size Label</th>
                                    <td>{{ $ad->ad_size_label ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>KYC Number</th>
                                    <td>{{ $ad->kyc_number ?? 'N/A' }}</td>
                                </tr>
                               
                              
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ url('admin/adlist') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>

                {{-- Optional Approve --}}
                {{-- 
                <form action="{{ route('admin.ads.approve', $ad->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>
                --}}

                {{-- Optional Reject --}}
                {{--
                <form action="{{ route('admin.ads.reject', $ad->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning">Reject</button>
                </form>
                --}}

                
            </div>

        </div>
    </div>

</div>

@endsection