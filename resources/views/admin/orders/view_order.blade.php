@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="container py-5">
  <div class="card shadow-sm rounded">
    <!-- Card Header -->
    <div class="card-header bg-light d-flex justify-content-between align-items-center p-4 border-bottom">
      <div>
        <h5 class="mb-1 fw-bold">Order Details</h5>
        <p class="text-muted small mb-0">
          {{ \Carbon\Carbon::parse($order->created_at)->format('D, M j, Y, g:i A') }} |
          <span class="text-muted">ID: #{{ $order->order_code }}</span>
        </p>
      </div>
      <div class="d-flex align-items-center">
        <form action="{{ route('update-order-status', $order->id) }}" method="POST">
          @csrf
          <select name="order_status" class="form-select form-select-sm me-2 py-1">
            <option value="Pending" {{ $order->order_status === 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Completed" {{ $order->order_status === 'Completed' ? 'selected' : '' }}>Completed</option>
            <option value="Processing" {{ $order->order_status === 'Processing' ? 'selected' : '' }}>Processing</option>
          </select>
          <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </form>
      </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success m-2">
      {{ session('success') }}
    </div>
  @endif

    @if(session('error'))
    <div class="alert alert-danger m-2">
      {{ session('error') }}
    </div>
  @endif

    <!-- Card Body -->
    <div class="card-body p-4">
      <div class="row g-4">
        <!-- Customer Details -->
        <div class="col-lg-4">
          <div class="border rounded p-3">
            <h6 class="fw-bold">
              <i class="fas fa-user"></i> {{$customer->guest ? 'Guest' : 'Customer'}}
            </h6>
            <p class="mb-1">Full Name: <strong>{{ $customer->first_name . ' ' . $customer->last_name }}</strong></p>
            <p class="mb-1">Email: {{ $customer->email }}</p>
            <p class="mb-1">Mobile Number: {{ $customer->mobile }}</p>
            <a href="{{ url('admin/customers') }}" class="text-primary small">
              View profile
            </a>
          </div>
        </div>

        <!-- Shipping Info -->
        <div class="col-lg-4">
          <div class="border rounded p-3">
            <h6 class="fw-bold">
              <i class="fas fa-shipping-fast"></i> {{ $shipment ? 'Ship to me' : 'Pickup at store' }}
            </h6>
            <p class="mb-1">Tracking Number: {{ $shipment->tracking_number ?? 'N/A' }}</p>
            <p class="mb-1">Shipping Type: {{ $order->ups_service_name ?? 'Pickup at store' }}</p>
            <p class="mb-1">Shipping Fee: ${{ number_format($order->ups_shipping_charges, 2) }}</p>
            <p class="mb-1">Status:
              <span class="text-success" style="font-size: 0.7rem">
                {{ $shipment ? 'Shipment created' : 'Order placed' }}
              </span>
            </p>

            @if(isset($shipment))
        <form action="{{ route('shipping.label.download', ['order_id' => $order->id]) }}" method="POST"
          style="display: inline;">
          @csrf
          <button type="submit" class="text-primary small btn btn-text bg-white p-0" style="font-size: 0.7rem">
          Download Shipping Label
          </button>
        </form>
        |
        <a href="https://www.ups.com/WebTracking/track?trackNums={{ $shipment->tracking_number }}" target="_blank"
          class="text-primary small btn btn-text bg-white p-0" style="font-size: 0.7rem">
          Track Shipment
        </a>
      @else
  @endif
          </div>
        </div>


        <!-- Delivery Info -->
        <div class="col-lg-4">
          <div class="border rounded p-3">
            <h6 class="fw-bold">
              <i class="fas fa-map-marker-alt"></i> {{ $shipment ? 'Delivery Address' : 'Billing Address' }}
            </h6>
            <p class="mb-1">City: {{ $customerAddress->city . ', ' . $customerAddress->state ?? 'N/A' }}</p>
            <p class="mb-1">Address: {{ $customerAddress->address_line ?? 'N/A' }}</p>
            <p class="mb-1">Country: {{ $customerAddress->country ?? 'N/A' }}</p>
            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($customerAddress->address_line . ', ' . $customerAddress->city . ', ' . $customerAddress->state . ', ' . $customerAddress->country) }}"
              class="text-primary small" target="_blank">
              Open map
            </a>
          </div>
        </div>
      </div>

      <!-- Ordered Products -->
      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ordered Products</h3>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Product Images</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Product Qty</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($order->orders_products as $orderProduct)
                    @php
            $product = $orderProduct->product;
          @endphp
                    @if ($product)
            <tr>
            <td>
              <a target="_blank" href="{{ $product->image_url }}">
              <img width="40" src="{{ $product->image_url }}" alt="{{ $product->product_name }}">
              </a>
            </td>
            <td>{{ $product->product_code }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $orderProduct->product_qty }}</td>
            <td>{{ number_format($orderProduct->product_total, 2) }}</td>
            </tr>

          @endif
          @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="border rounded p-3 mt-4">
    <h6 class="fw-bold">
        <i class="fas fa-receipt"></i> Order Summary
    </h6>
    <div class="d-flex justify-content-between">
        <p class="mb-1">Subtotal:</p>
        <p class="mb-1"><strong>${{ number_format($order->sub_total_amount, 2) }}</strong></p>
    </div>
    <div class="d-flex justify-content-between">
        <p class="mb-1">Shipping Fee:</p>
        <p class="mb-1"><strong>${{ number_format($order->ups_shipping_charges, 2) }}</strong></p>
    </div>
    <!-- <div class="d-flex justify-content-between">
        <p class="mb-1">Tip(s):</p>
        <p class="mb-1"><strong>${{ number_format($order->tips, 2) }}</strong></p>
    </div> -->
    <hr>
    <div class="d-flex justify-content-between">
        <p class="mb-1">Total:</p>
        <p class="mb-1"><strong>${{ number_format($order->grand_total, 2) }}</strong></p>
    </div>
</div>

    </div>
  </div>
</div>
@endsection
