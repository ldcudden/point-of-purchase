@extends('layout')

@section('main')
<div><a href="/home">Home</a></div>
<h1>Invoice #{{ $invoice->id }}</h1>

<table>
    <tr>
        <th>Quantity #</th>
        <th>Item</th>
        <th>Cost</th>
        <th>Sub-Total</th>
        <th><a href="#">Remove</a></th>
    </tr>

   
        <td><a href="invoice/{{ $invoice->id }}">{{ $invoice->id }}</a></td>
        <td>{{ $invoice->customer_id }}</td>
        <td>{{ $invoice->id }}</td>
        <td>{{ $invoice->created_at }}</td>
        <td><a href="invoice/{{ $invoice->id }}/edit">Edit</a></td>
        <td><a href="invoice/{{ $invoice->id }}/delete">Delete</a></td>
   

</table>
<form action="{{ URL::to('invoice/new') }}" method="POST">
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="text" value="amount of items" name="amounts">
    
    <a href="#">Add</a>
</form>
<a href="{{ URL::to('invoice') }}">Invoices</a>
@endsection