@extends('layouts.admin_layout.admin_layout')
@section('content')

<?php
// echo "<pre>"; print_r($usersCount); die;
// echo $current_month = date('M Y', strtotime("-0 month")); "<br>";
// echo $before_1_month = date('M Y', strtotime("-1 month")); die; 
    use Carbon\Carbon;
    use App\Models\Order;
    $ordersCount = [];
    $months = [];
    $currentMonth = Carbon::now();
    for ($i = 0; $i <= 10; $i++) {
        $targetDate = $currentMonth->copy()->subMonths($i);
        $ordersCount[] = Order::where('order_status', 'Completed')
            ->whereYear('created_at', $targetDate->year)
            ->whereMonth('created_at', $targetDate->month)
            ->count();
        $months[] = $targetDate->format('M Y');
    }
    $ordersCount = array_reverse($ordersCount);
    $months = array_reverse($months);
    $dataPoints = [];
    for ($i = 0; $i <= 10; $i++) {
        $dataPoints[] = array("y" => $ordersCount[$i], "label" => $months[$i]);
    }

?>
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">₦<span>{{ $todaySales }}</span></div>
                                    <div class="stat-heading"><strong>Today's Sales (Completed Order)</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib">
                                <i class="ti-money text-success border-success"></i>
                            </div>
                            <div class="stat-content dib">
                                    <div class="stat-text">₦<span>{{ $pendingSales }}</span></div>
                                    <div class="stat-heading">This Month</div>
                                    <div class="stat-heading"><strong>Pending Sales </strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">₦<span>{{ $totalSales }}</span></div>
                                    <div class="stat-heading"><strong>This Month Sales (Completed and Paid)</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib">
                                <i class="ti-money text-success border-success"></i>
                            </div>
                            <div class="stat-content dib">
                                    <div class="stat-text">₦<span>{{ $allSales }}</span></div>
                                    <div class="stat-heading"><strong>All Total Sales</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-browser"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">349</span></div>
                                    <div class="stat-heading"><strong>Number </strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
           
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-cart"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $pendingOrders }}</span></div>
                                    <div class="stat-heading"><strong>Pending Orders</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-cart"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $totalOrders }}</span></div>
                                    <div class="stat-heading"><strong>All Completed Orders</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $nonguestCustomers }}</span></div>
                                    <div class="stat-heading"><strong>Non Guest Customers</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $guestCustomers }}</span></div>
                                    <div class="stat-heading"><strong>Guest Customers</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-browser"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">349</span></div>
                                    <div class="stat-heading"><strong>Number </strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- /Widgets -->
        <!--  Traffic  -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders Reports</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
        </div>
        
        <!--  /Traffic -->
        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h4 class="box-title">Recent Orders</h4>
                            <a href="{{ url('admin/orders') }}" class="all-orders">View All Orders</a>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="serial">S/N</th>
                                            <th>Order No</th>
                                            <th>Order Date</th>
                                            <th>Customer Name</th>
                                            <th>Total Amount</th>
                                            <th>Payment Gateway</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($orders as $order)
                                        <tbody>
                                            <tr>
                                                <td class="serial">{{ $loop->iteration }}</td>
                                                <td><a href="{{ url('admin/order/'.$order->id) }}">#{{ $order->order_code }} </a> </td>
                                                <td>  <span class="name">{{ \Carbon\Carbon::parse($order->order_date)->format('D, j M Y') }}</span> </td>
                                                <td>
                                                    {{ json_decode($order->billing_address)->firstname }} {{ json_decode($order->billing_address)->lastname }}
                                                </td>
                                                <td><span>${{ $order->grand_total }}</span></td>
                                                <td><span>{{ $order->payment_gateway }}</span></td>
                                                <td>
                                                    @if($order->order_status === 'Pending')
                                                        <span class="badge badge-warning">{{ $order->order_status }}</span>
                                                    @elseif ($order->order_status === "Processing")
                                                        <span class="badge badge-info">{{ $order->order_status }}</span>
                                                    @elseif ($order->order_status === "Completed")
                                                        <span class="badge badge-success">{{ $order->order_status }}</span>
                                                    @else 
                                                        <span class="badge badge-danger">{{ $order->order_status }}</span>
                                                    @endif
                                                    {{-- <span class="badge badge-warning">{{ $order->order_status }}</span> --}}
                                                </td>
                                                <td>
                                                    @if($order->payment_status === 'Pending')
                                                        <span class="badge badge-warning">{{ $order->payment_status }}</span>
                                                    @elseif ($order->payment_status === "Processing")
                                                        <span class="badge badge-info">{{ $order->payment_status }}</span>
                                                    @elseif ($order->payment_status === "Paid")
                                                        <span class="badge badge-success">{{ $order->payment_status }}</span>
                                                    @else 
                                                        <span class="badge badge-danger">{{ $order->payment_status }}</span>
                                                    @endif
                                                    {{-- <span class="badge badge-warning">{{ $order->order_status }}</span> --}}
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/order/' . $order->id) }}" type="button"
                                                        class="btn btn-primary btn-sm mx-1 mb-2">View</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div> <!-- /.card -->
                </div>  <!-- /.col-lg-8 -->
            </div>
        </div>
        <!-- /.orders -->
        <!-- To Do and Live Chat -->
       
        <!-- /To Do and Live Chat -->
        <!-- Calender Chart Weather  -->
       
        <!-- /Calender Chart Weather -->
        <!-- Modal - Calendar - Add New Event -->
        
        <!-- /#event-modal -->
        <!-- Modal - Calendar - Add Category -->
        <div class="modal fade none-border" id="add-category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><strong>Add a category </strong></h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Category Name</label>
                                    <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Choose Category Color</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                        <option value="success">Success</option>
                                        <option value="danger">Danger</option>
                                        <option value="info">Info</option>
                                        <option value="pink">Pink</option>
                                        <option value="primary">Primary</option>
                                        <option value="warning">Warning</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- /#add-category -->
    </div>
    <!-- .animated -->
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function () { 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "Orders Report"
    },
    axisY: {
        title: "Number of Orders"
    },
    data: [{        
        type: "line",
            indexLabelFontSize: 16,
        dataPoints : <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        // dataPoints: [
        // 	{ y: 450 },
        // 	{ y: 414},
        // 	{ y: 520, indexLabel: "\u2191 highest",markerColor: "red", markerType: "triangle" },
        // 	{ y: 460 },
        // 	{ y: 450 },
        // ]
    }]
});
chart.render();

}
</script>
@endsection