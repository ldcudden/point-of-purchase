<?php namespace App\Http\Controllers;

use Request;
use Validator;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Item;
use Carbon\Carbon;

class InvoiceController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Invoice Controller
	|--------------------------------------------------------------------------
	| This controller handles all requests related to Invoice objects
	| Patterns Demonstrated:
	| - returning views and redirects
	| - passing data to a view
	| - model CRUD operations
	| - inline validator usage
	*/

	public function showAll() {
		$invoices = Invoice::all();
		return view('invoice_all', ['invoices' => $invoices->getArray()]);
	}

	public function create() {
		return view('invoice_new');
	}

	public function postCreate() {
		$validator = Validator::make(Request::all(), [
			'name' => 'required',
			'price' => 'required|numeric'
		]);
		if($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors());
		}

		$invoice = new Invoice();
		$invoice->name = Request::input('name');
		$invoice->description = Request::input('description');
		$invoice->price = Request::input('price');
		$invoice->save();
		return redirect('invoice');
	}

	public function show($id) {
		$invoice = new Invoice($id);
		return view('invoice', ['invoice' => $invoice]);
	}

	public function edit($id) {
		$invoice = new Invoice($id);
		return view('invoice_edit', ['invoice' => $invoice]);
	}

	public function postEdit($id) {
		$validator = Validator::make(Request::all(), [
			'name' => 'required',
			'price' => 'required|numeric'
		]);
		if($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors());
		}

		$invoice = new Invoice($id);
		$invoice->name = Request::get('name');
		$invoice->description = Request::get('description');
		$invoice->price = Request::get('price');
		$invoice->save();
		return redirect('invoice/' . $id);
	}

	public function delete($id) {
		$invoice = new Invoice($id);
		$invoice->delete();
		return redirect('invoice');
	}
}
