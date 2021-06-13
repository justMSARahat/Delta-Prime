@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    @if( Route::currentRouteNamed('admin.order.pending') ) Pending Orders @endif
                    @if( Route::currentRouteNamed('admin.order.complete') ) Completed Orders @endif
                    @if( Route::currentRouteNamed('admin.order.cancel') ) Canceled Orders @endif
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 30%">
                                Invoice
                            </th>
                            <th style="width: 10%">
                                Email
                            </th>
                            <th style="width: 15%" class="text-center">
                                Phone
                            </th>
                            <th style="width: 15%" class="text-center">
                                Payment Method
                            </th>
                            <th style="width: 15%" class="text-center">
                                Status
                            </th>
                            <th style="width: 30%" class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ( $orders as $item )
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>#{{ $item->invoice }}</td>
                                <td>{{ $item->email}}</td>
                                <td>{{ $item->phone}}</td>
                                {{-- <td>{{ ($item->payment_method)?'Paypal':(($item->payment_method==2)?'Omise':'')}} --}}
                                <td>
                                    @if ($item->payment_method==1)
                                        Paypal
                                    @else
                                         Omise
                                    @endif
                                </td>
                                <td>
                                    @if( $item->status==1 )
                                        <span>Prosessing</span>
                                    @elseif( $item->status==2 )
                                        <span>Shipped</span>
                                    @elseif( $item->status==3 )
                                        <span>Completed</span>
                                    @elseif( $item->status==4 )
                                        <span>Canceled</span>
                                    @endif
                                </td>
                                <td class="project-actions text-center">
                                    <a href="{{ route('order.show',$item->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $item->id }}"><i class="fa fa-trash"></i></a>
                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="text-align: left">
                                                I Agree to Cancel This Order!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <a href="{{ route('order.cancel',$item->id) }}" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {!! $orders->links('vendor.pagination.custom_2') !!}
            </div>
        </div>
        <!-- /.card -->


    </section>
    <!-- /.content -->
</div>
@endsection
