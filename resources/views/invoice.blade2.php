@extends('layout')

@section('main')
<div><a href="/home">Home</a></div>
<h1>Invoice #: {{ $invoice->id }}</h1>

<table>
    <tr>
        <th>Quantity #</th>
        <th>Item</th>
        <th>Cost</th>
        <th>Sub-Total</th>
        <th><a href="#">Remove</a></th>
    </tr>

    
    @foreach($invoice as $i)
    <tr>
        <td><a href="invoice/{{ $i->id }}">{{ $i->id }}</a></td>
        <td>{{ $i->customer_id }}</td>
        <td>{{ $i->id }}</td>
        <td>{{ $i->created_at }}</td>
        <td><a href="invoice/{{ $i->id }}/edit">Edit</a></td>
        <td><a href="invoice/{{ $i->id }}/delete">Delete</a></td>
    </tr>
    @endforeach
    

</table>
<form action="{{ URL::to('invoice/new') }}" method="POST">
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="text" value="amount of items" name="amounts">
    
    <a href="#">Add</a>
</form>
<a href="{{ URL::to('invoices') }}">Invoices</a>
@endsection