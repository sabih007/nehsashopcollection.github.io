<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class CustomersControllers extends Controller
{
  public function index()
  {
    $customers = Customer::orderBy('id', 'ASC')->paginate(5);
    return view('customers.list', ['customers' => $customers]);
  }
  public function create()
  {
    return view('customers.create');
  }
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'order_no' => 'required',
      'customer_name' => 'required',
      'address' => 'required',
      'order_details' => 'required',
      'payment_status' => 'required',
      'discount' => 'required',
      'payment_method' => 'required',
      'delivery_charges' => 'required',
      'delivery_zone' => 'required',
      'image' => 'sometimes|image:png,jpeg,gif,jpg'
    ]);

    if ($validator->passes()) {
      $customer = new Customer();
      $customer->order_no = $request->order_no;
      $customer->customer_name = $request->customer_name;
      $customer->address = $request->address;
      $customer->discount = $request->discount;
      $customer->order_details = $request->order_details;
      $customer->payment_status = $request->payment_status;
      $customer->payment_method = $request->payment_method;
      $customer->delivery_charges = $request->delivery_charges;
      $customer->delivery_zone = $request->delivery_zone;
      $customer->save();


      if ($request->image) {
        $ext = $request->image->getClientOriginalExtension();
        $newFileName = time() . '.' . $ext;
        $request->image->move(public_path() . '/uploads/customers', $newFileName); //this will save file in a folder
        $customer->image = $newFileName;
        $customer->save();
      }
      // $request->session()->flash('success', 'Customer Added Successfully.!');
      // Alert::success('Congratulations', 'Customer Added Successful.!');
      // Alert::toast('Congratulations', 'Customer Added Successful.!');
      Alert::toast('Added.! Customer has been added successfully!','success','top-right');

      return redirect()->route('customers.index');
    } else {
      //return with error
      return redirect()->route('customers.create')->withErrors($validator)->withInput();
    }
  }
  public function edit($id)
  {

    $customer = Customer::findOrFail($id);
    return view('customers.edit', ['customer' => $customer]);
  }
  public function update($id, Request $request)
  {
    $validator = Validator::make($request->all(), [
      'order_no' => 'required',
      'customer_name' => 'required',
      'address' => 'required',
      'order_details' => 'required',
      'payment_status' => 'required',
      'discount' => 'required',
      'payment_method' => 'required',
      'delivery_charges' => 'required',
      'delivery_zone' => 'required',
      'image' => 'sometimes|image:png,jpeg,gif,jpg'
    ]);

    if ($validator->passes()) {
      $customer = Customer::find($id);
      $customer->order_no = $request->order_no;
      $customer->customer_name = $request->customer_name;
      $customer->address = $request->address;
      $customer->discount = $request->discount;
      $customer->order_details = $request->order_details;
      $customer->payment_status = $request->payment_status;
      $customer->payment_method = $request->payment_method;
      $customer->delivery_charges = $request->delivery_charges;
      $customer->delivery_zone = $request->delivery_zone;
      $customer->save();


      if ($request->image) {
        $oldImage = $customer->image;
        $ext = $request->image->getClientOriginalExtension();
        $newFileName = time() . '.' . $ext;
        $request->image->move(public_path() . '/uploads/customers', $newFileName); //this will save file in a folder
        $customer->image = $newFileName;
        $customer->save();
        File::delete(public_path() . '/uploads/customers' . $oldImage);
      }
      // $request->session()->flash('success', 'Customer Updated Successfully.!');
      Alert::success('Updated.!', 'Customer Updated Successful.!');


      return redirect()->route('customers.index');
    } else {
      //return with error
      return redirect()->route('customers.edit', $id)->withErrors($validator)->withInput();
    }
  }
  public function destroy($id, Request $request)
  {
    $customer = Customer::findOrFail($id);
    File::delete(public_path() . '/uploads/customers' . $customer->image);
    $customer->delete();
    // $request->session()->flash('success', 'Customer Delete  Successfully.!');
    Alert::success('Deleted.!', 'Customer Deleted  Successfully.!');

    return redirect()->route('customers.index');

  }

  public function export() 
  {
      return Excel::download(new CustomersExport, 'CustomersDetails.xlsx');
  }
}
