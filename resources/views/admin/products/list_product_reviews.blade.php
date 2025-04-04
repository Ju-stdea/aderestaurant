@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5> <strong>{{ $product->product_name }}</strong></h5>
                <div class="btn-box d-flex flex-wrap gap-2">
                    <div id="tableSearch"></div>
                </div>
            </div>
            <div class="panel-body">
                <div class="product-table-quantity">
                    <ul>
                        <li class="text-white">All ({{ $all }})</li>
                    </ul>
                </div>
                <form>
                    <div class="table-filter-option">
                        <div class="row g-3">
                            <div class="col-xl-10 col-9 col-xs-12">
                                <div class="row g-3">
                                    <div class="col">
                                        <select wire:model="rating" class="form-control form-control-sm">
                                            <option value="All">All Ratings</option>
                                            <option value="1">1 Star</option>
                                            <option value="2">2 Star</option>
                                            <option value="3">3 Star</option>
                                            <option value="4">4 Star</option>
                                            <option value="5">5 Star</option>
                                        </select>
                                    </div>
                                    {{-- <div class="col">
                                        <input type="text" wire:model="date" class="form-control form-control-sm" id="customTableFilter" onchange="this.dispatchEvent(new InputEvent('input'))" readonly>
                                    </div> --}}
                                    <div class="col">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa-light fa-filter"></i> Filter</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12 col-xs-12 d-flex justify-content-end">
                                <div id="productTableLength"></div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row g-4">
                    <div class="col-xxl-6 col-lg-6">
                        <div class="panel-header">
                            <h5><strong>Product Overall Performance</strong></h5>
                        </div>
                        <div>
                            @if ($starRating == 5)
                                @include('stars.five')
                            @elseif ($starRating == 4)
                                @include('stars.four')
                            @elseif ($starRating == 3)
                                @include('stars.three')
                            @elseif ($starRating == 2)
                                @include('stars.two')
                            @elseif ($starRating == 1)
                                @include('stars.one')
                            @else
                                @include('stars.zero')
                            @endif
                            <h6 class="mt-4"><strong>Average Score - {{ $averageRating }}</strong></h6>
                            <h6 class="mt-4"><strong>Total Reviews - {{ $totalReviews }}</strong></h6>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="panel-header">
                            <h5><strong>Product Distribution of Stars</strong></h5>
                        </div>
                        @for ($ratings = 5; $ratings >= 1; $ratings--)
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <!-- Star rating (e.g., "5 stars") -->
                                <div style="flex: 1;">
                                    <span>{{ $ratings }} stars</span>
                                </div>
                    
                                <!-- Progress bar container -->
                                <div style="flex: 4; margin-right: 10px;">
                                    <div style="position: relative; background: rgb(235, 238, 245); height: 10px; width: 100%;">
                                        <div style="width: {{ $ratingsData['percentageDistribution'][$ratings] ?? 0 }}%; height: 10px; background: rgb(26, 187, 156); position: absolute; top: 0; left: 0;"></div>
                                    </div>
                                </div>
                    
                                <!-- Percentage of reviews (e.g., "25%") -->
                                <div style="flex: 1; text-align: right; margin-right: 10px;">
                                    {{ $ratingsData['percentageDistribution'][$ratings] ?? 0 }}%
                                </div>
                    
                                <!-- Number of reviews (e.g., "100 reviews") -->
                                <div style="flex: 2; text-align: left;">
                                    <span style="font-size: small;">{{ $ratingsData['countDistribution'][$ratings] ?? 0 }} reviews</span>
                                </div>
                            </div>
                        @endfor
                    </div>
                    
                </div>
                @if ($message = Session::get('error'))
                <div class="msg-error alert alert-danger py-2 px-3 rounded mb-20 fs-14"><i class="fa-regular fa-circle-exclamation me-2"></i> {{ $message }} </div>
                @endif
                @php
                    $encodedDate = request('date');
                    $decodedDate = urldecode($encodedDate);
                @endphp
                @if(!request()->has('date'))
                <p>Showing data for this month:</p>
                @else
                <p>Showing data for the selected date range<small>(mm/dd/yyy)</small> {{ $decodedDate }}:</p>
                @endif
                <table class="table table-dashed table-hover digi-dataTable" id="allProductTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer Name</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Reviewed Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productReviews as $product)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $product->first_name }} {{ $product->last_name }}</td>
                                <td>
                                    <div class="ratings">
                                        <div class="stars">
                                            @for ($ratings = 1; $ratings <= 5; $ratings++)
                                                @if ($product->rating >= $ratings)
                                                    <span>
                                                        <svg width="15" height="15" viewBox="0 0 15 15"  fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z" 
                                                            fill="#FFA800" />
                                                        </svg>
                                                    </span>
                                                @else
                                                    <span>
                                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z" 
                                                        fill="#E0E0E0" />
                                                        </svg>
                                                    </span>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $product->review }}</td>
                                <td>{{ \Carbon\Carbon::parse($product->created_at)->format('D, j M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="table-bottom-control"></div>
            </div>
        </div>
    </div>
</div>
@endsection