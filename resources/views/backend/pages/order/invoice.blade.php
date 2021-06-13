@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: {{ $order->created_at->format('F j, Y') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                  To
                  <address>
                    <strong>{{ $order->name }} {{ $order->last_name }}</strong><br>
                    {{ $order->address_one }}<br>
                    {{ $order->address_two }}<br>
                    City: {{ $order->city_name->name }}<br>
                    State: {{ $order->state_name->name }}<br>
                    Country: {{ $order->country_name->name }}<br>
                    Post Code: {{ $order->post_code }}<br>
                    Phone: {{ $order->phone }}<br>
                    Email: {{ $order->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-6 invoice-col" style="text-align:right" >
                  <b>Invoice #{{ $order->invoice }}</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>
                    Payment Method:</b>
                    @if ($order->payment_method==1)
                        Paypal
                    @else
                        Omise
                    @endif
                  <br>
                  <b>Payment:</b> @if( $order->payment==1 )Success @elseif( $order->payment==2 ) Pending @elseif( $order->payment==2 ) Canceled @endif
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Size</th>
                      <th>Color</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( App\Models\Backend\order_item::where('invoice', $order->invoice)->get() as $item )
                            <tr>
                                <td>{{ $item->product_quantity }} Pices</td>
                                <td>{{ $item->product_name->title }}</td>
                                <td>
                                    @if( $item->size == 1 ) S
                                    @elseif( $item->size == 2 ) M
                                    @elseif( $item->size == 3 ) L
                                    @elseif( $item->size == 4 ) XL
                                    @elseif( $item->size == 5 ) XXL
                                    @elseif( $item->size == 6 ) XXXL
                                    @else No Size @endif
                                </td>
                                <td>{{ $item->color_name->title }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                </div>
                <!-- /.col -->
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{ $webinfo->currency_icon }} {{ $order->amount }} {{ $webinfo->currency }}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>{{ $webinfo->currency_icon }} {{ $order->amount }} {{ $webinfo->currency }}</td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{ route('order.shiped',$order->id) }}" class="btn btn-success float-right" style="margin-right: 5px;">Send to Shipping</a>
                  <a href="{{ route('order.complete',$order->id) }}" class="btn btn-primary float-right" style="margin-right: 5px;">Mark as Completed</a>
                  <a href="{{ route('order.destroy',$order->id) }}" class="btn btn-primary float-right" style="margin-right: 5px;">Cancel Order</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
