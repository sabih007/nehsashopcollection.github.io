@include('layout.header')
    <div class="container">
        <div class="d-flex justify-content-between py-4">
            <h4><i class="fa fa-user-plus"></i> Edit Customers</h4>
            <a href="{{ route('customers.index') }}" class="btn btn-primary">back</a>
        </div>
    </div>
    <div class="container py-3">
        <div class="card border-0 shadow-lg">
            <div class="card-header">
                Nehsa Shop Collectiion
            </div>
            <div class="card-body">
                <form action="{{ route('customers.update', $customer->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6  my-2">
                            {{-- order no input field --}}
                            <div class="form-group mb-4">
                                <label for="order_no" class="form-label">Order No</label>
                                <input type="text" id="order_no" name="order_no"
                                    class="form-control @error('order_no') is-invalid @enderror"
                                    placeholder="Enter Order Number"
                                    value="{{ old('order_no', $customer->order_no) }}">
                                @error('order_no')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            {{-- customer name input field --}}
                            <div class="form-group mb-3">
                                <label for="customer_name" class="form-label">Customer Name</label>
                                <input type="text" id="customer_name" name="customer_name"
                                    class="form-control @error('customer_name') is-invalid @enderror"
                                    placeholder="Enter Customer Name"
                                    value="{{ old('customer_name', $customer->customer_name) }}">
                                @error('customer_name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="col-lg-6 my-2">

                            {{-- address input filed --}}
                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Customer Address</label>
                                <input type="text" id="address" name="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Enter Customer Address"
                                    value="{{ old('address', $customer->address) }}">
                                @error('address')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            {{-- order details input filed --}}
                            <div class="form-group mb-3">
                                <label for="order_details" class="form-label">Order Details</label>
                                <input type="text" id="order_details" name="order_details"
                                    class="form-control @error('order_details') is-invalid @enderror"
                                    placeholder="Enter Order Details"
                                    value="{{ old('order_details', $customer->order_details) }}">
                                @error('order_details')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            {{-- payment status input filed --}}
                            <div class="form-group mb-3">
                                <label for="payment_status" class="form-label">Payment Status</label>
                                <input type="text" id="payment_status" name="payment_status"
                                    class="form-control @error('payment_status') is-invalid @enderror"
                                    placeholder="Enter Payment Status"
                                    value="{{ old('payment_status', $customer->payment_status) }}">
                                @error('payment_status')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            {{-- Discount input filed --}}
                            <div class="form-group mb-3">
                                <label for="discount" class="form-label">Discount</label>
                                <input type="text" id="discount" name="discount"
                                    class="form-control @error('discount') is-invalid @enderror"
                                    placeholder="Enter Discount" value="{{ old('discount', $customer->discount) }}">
                                @error('discount')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            {{-- payment method input filed --}}
                            <div class="form-group mb-3">
                                <label for="payment_method" class="form-label">Payment Method</label>
                                <input type="text" id="payment_method" name="payment_method"
                                    class="form-control @error('payment_method') is-invalid @enderror"
                                    placeholder="Enter Payment Method"
                                    value="{{ old('payment_method', $customer->payment_method) }}">
                                @error('payment_method')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            {{-- Delivery charges input filed --}}
                            <div class="form-group mb-3">
                                <label for="delivery_charges" class="form-label">Delivery charges</label>
                                <input type="text" id="delivery_charges" name="delivery_charges"
                                    class="form-control @error('delivery_charges') is-invalid @enderror"
                                    placeholder="Enter Payment Method"
                                    value="{{ old('delivery_charges', $customer->delivery_charges) }}">
                                @error('delivery_charges')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            {{-- Delivery zone input filed --}}
                            <div class="form-group mb-3">
                                <label for="delivery_zone" class="form-label">Delivery Zone</label>
                                <input type="text" id="delivery_zone" name="delivery_zone"
                                    class="form-control @error('delivery_zone') is-invalid @enderror"
                                    placeholder="Enter Delivery Zone"
                                    value="{{ old('delivery_zone', $customer->delivery_zone) }}">
                                @error('delivery_zone')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            {{-- image input filed --}}
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">image</label>
                                <input type="file" id="image" name="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                <div class="pt-4">
                                    @if ($customer->image != '' && file_exists(public_path() . '/uploads/customers/' . $customer->image))
                                        <img src="{{ url('uploads/customers/' . $customer->image) }}"height="100"
                                            width="100" alt="" srcset="">
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="justify-content-center text-center mt-2">
                                <button type="submit" class="btn btn-primary" id="myWish" href="javascript:;">
                                    Edit & Processed</button>

                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
  @include('layout.footer')