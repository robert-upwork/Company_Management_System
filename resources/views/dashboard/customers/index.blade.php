@section('title') 
{{ __('customers/customers.customersList') }}
@endsection 
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('customers/customers.customersList') }}</h4>  
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.customers') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('customers/customers.customersList') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('customers.create') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>{{ __('customers/customers.customerAdd') }}</a>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="default-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sales employee</th>
                                    <th>Nickname</th>
                                    <th>Customer Name</th>
                                    <th>Entity Type</th>
                                    <th>Entity Name</th>
                                    <th>Position</th>
                                    <th>Mobile Number</th>
                                    <th>Landline Number</th>
                                    <th>Fax</th>
                                    <th>Email</th>
                                    <th>ZipCode</th>
                                    {{--<th>Country</th>--}}
                                    <th>Profile</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($customers) > 0)
                                @foreach($customers as $key => $customer)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    {{--<td>{{ $customer->name }}</td>--}}
                                    {{--<td>{{ $customer->email }}</td>--}}
                                    {{--<td>{{ $customer->phone }}</td>--}}
                                    <td>{{ $customer->sales_employee }}</td>
                                    <td>{{ $customer->nickname }}</td>
                                    <td>{{ $customer->customer_name }}</td>
                                    <td>{{ $customer->entity_type }}</td>
                                    <td>{{ $customer->entity_name }}</td>
                                    <td>{{ $customer->position }}</td>
                                    <td>{{ $customer->mobile_number }}</td>
                                    <td>{{ $customer->landline_number }}</td>
                                    <td>{{ $customer->fax }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->zipcode }}</td>
                                    {{--<td>{{ $customer->country }}</td>--}}
                                    <td>
                                        {{--<div class="custom-control custom-switch" >--}}
                                            {{--<input type="checkbox" onclick="status_change('{{csrf_token()}}','{{$customer->id}}','{{url('customer-status')}} ')" {{ $customer->status == 1?'checked':''}} class="custom-control-input" id="customSwitch{{$key}}">--}}
                                            {{--<label class="custom-control-label" for="customSwitch{{$key}}"></label>--}}
                                        {{--</div>--}}
                                        <div class="button-list" >
                                            <a class="btn btn-info-rgba" href="{{ route('customers.profile',$customer->id) }}" title="Profile"><i class="feather icon-info"></i></a>
                              	        </div>
                                    </td>
                                    <td>
                                        <div class="button-list">
                                            <a class="btn btn-success-rgba"  title="Edit" href="{{ route('customers.edit',$customer->id) }}" ><i class="feather icon-edit-2"></i></a>

                                            <a href="{{ route('customers.destroy',$customer->id) }}" title="Delete" class="btn btn-danger-rgba" onclick="return confirm('Are you sure？')"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @endif
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->

@endsection
@section('script')

    <script>

        function status_change(token, id, route) {
            $.ajax({
                url : route,
                type: "POST",
                data: {_token: token, id: id},
                success: function (response) {
                    //$(".table").load(location.href + " .table>*", "");
                }
            });
        }
    </script>


    <script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script>

    <script>
        $(document).ready(function() {
            var buttonCommon = {
                exportOptions: {
                    format: {
                        body: function ( data, row, column, node ) {
                            // Strip $ from salary column to make it numeric
                            console.log(row);
                            if(row == 4){
                                return $('#customSwitch' + column).is(":checked") ? 'Active' : 'Inactive' ;
                            }
                            return data;
                        }
                    },
                    columns: [ 0, 1, 2, 3,4 ]
                }
            };

            $('#default-datatable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    $.extend( true, {}, buttonCommon, {
                        extend: 'print',
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'csvHtml5',
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'excelHtml5'
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'pdfHtml5'
                    } ),
                ]
            } );
        });
    </script>
@endsection