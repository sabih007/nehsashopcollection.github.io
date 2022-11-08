@include('layout.header')
    <div class="container">
        <div class="d-flex justify-content-between py-4">
            <h4>Customers List</h4>
            <a href="{{ route('customers.create') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Create</a>
        </div>
    </div>
    <div class="container py-3">
        <div class="card border-0 shadow-lg">
            @if (Session::has('success'))
                <div class="alert alert-success" id="success-alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-header d-flex">
                <div>
                    Nehsa Shop Collectiion

                </div>
                <div class="btn-row-btn">
                    <a href="{{ route('customers.export') }}" class="btn btn-primary"><i class="fas fa-file-excel"></i> Export Customer Excel </a>
                    <a href="{{route('pdf.preview')}}" class="btn btn-primary"><i class="fa-solid fa-file-pdf"></i> Export Customer Pdf</a>

                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="table_row">
                                <th class="text-nowrap "scope="col"> ID </th>
                                <th class="text-nowrap" scope="col"> Order No </th>
                                <th class="text-nowrap"> Image </th>
                                <th class="text-nowrap"> Customer Name </th>
                                <th class="text-nowrap"> Order Details </th>
                                <th class="text-nowrap"> Payment Status </th>
                                <th class="text-nowrap"> Discount </th>
                                <th class="text-nowrap"> Customer Address </th>
                                <th class="text-nowrap"> Payment Method </th>
                                <th class="text-nowrap"> Delivery Charges </th>
                                <th class="text-nowrap"> Delivery Zone </th>
                                <th class="text-nowrap"> Order Creation Date and time </th>
                                <th class="text-nowrap"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($customers->isNotEmpty())

                                @foreach ($customers as $customer)
                                    <tr valign="middle">
                                        <td class="text-nowrap"scope="col">
                                            {{ $customer->id }}
                                        </td>
                                        <td class="text-nowrap" scope="col">
                                            {{ $customer->order_no }}
                                        </td>
                                        <td class="text-nowrap">
                                            @if ($customer->image != '' && file_exists(public_path() . '/uploads/customers/' . $customer->image))
                                                <img src="{{ url('uploads/customers/' . $customer->image) }}"height="40"
                                                    width="40" class="rounded-circle" alt="" srcset="">
                                            @else
                                                <img src="{{ url('assets/images/no-image.png') }}"height="40"
                                                    width="40" class="rounded-circle" alt="" srcset="">
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $customer->customer_name }}
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $customer->order_details }}
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $customer->payment_status }}
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $customer->discount }}
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $customer->address }}
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $customer->payment_method }}
                                        </td>
                                        <td class="text-nowrap">

                                            {{ $customer->delivery_charges }}
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $customer->delivery_zone }}
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $customer->created_at }}
                                        </td>
                                        <td class="text-nowrap d-flex mr-2">
                                            <a href="{{ route('customers.edit', $customer->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                          

                                            <form id="customer-edit-action-{{ $customer->id }}"
                                                action="{{ route('customers.destroy', $customer->id) }}"
                                                method="post">
                                                @csrf
                                                @method('Delete')
                                                <button type="submit" href="javascript:;"  onclick="deleteCustomer({{ $customer->id }})"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
    
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12" class="text-center">Oops.! No Record Found.</td>
                                </tr>
                            @endif
                        </tbody>
                        <div>
                            {{ $customers->links() }}
                        </div>
                </div>
                </table>
            </div>
        </div>

    </div>
   


@include('layout.footer')