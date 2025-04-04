@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Categories</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Category</a></li>
                            <li class="active">List Categories</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row g-4 justify-content-center">
        <div class="col-lg-12">
            @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissable fade show" role="alert" style="margin-top:10px;">
                    {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">All Orders</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Order No</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Ordered Products</th>
                                <th scope="col">Order Amount</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Payment Gateway</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Delivery Method</th>
                                <th scope="col">Action</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th><input type="text" placeholder="Order No" /></th>
                                <th><input type="text" placeholder="Order Date" /></th>
                                <th></th>
                                <th><input type="text" placeholder="Amount" /></th>
                                <th><input type="text" placeholder="Payment Status" /></th>
                                <th><input type="text" placeholder="Order Status" /></th>
                                <th><input type="text" placeholder="Gateway" /></th>
                                <th><input type="text" placeholder="Method" /></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $order->order_code }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('D, j M Y') }}</td>
                                    <td>{{ $order->orders_products ? $order->orders_products->count() : 0 }}</td>
                                    <td>{{ number_format($order->grand_total, 2) }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->order_status }}</td>
                                    <td>{{ $order->payment_gateway }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>{{ $order->delivery_method }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap justify-content-start">
                                            <a href="{{ route('order-details', ['id' => $order->id]) }}" type="button"
                                                class="btn btn-primary btn-sm mx-1 mb-2">View</a>
                                            {{-- <a href="{{ url('admin/view-order-invoice/' . $order->id) }}" type="button"
                                                class="btn btn-success btn-sm mx-1 mb-2">Invoice</a> --}}
                                            {{-- <a href="{{ url('admin/print-pdf-invoice/' . $order->id) }}" type="button"
                                                class="btn btn-warning btn-sm mx-1 mb-2">PDF</a> --}}
                                        </div>
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
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize the DataTable
        var table = $('#bootstrap-data-table').DataTable();

        // Individual column search
        $('#bootstrap-data-table thead tr:eq(1) th').each(function (i) {
            var title = $(this).text();
            if (title !== '') {
                $('input', this).on('keyup change', function () {
                    // Set the filtering for the specific column
                    table.column(i).search(this.value).draw();
                });
            }
        });

    });
</script>
@endsection
