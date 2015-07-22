@extends('layout')

@section('main')
<div><a href="/home">Home</a></div>
<h1>Invoices</h1>

<table>
    <tr>
        <th>Invoice #</th>
        <th>Customer Name</th>
        <th>Total</th>
        <th>Date</th>
        <th><a href="#">Details</a></th>
    </tr>

    @foreach($invoices as $inv)
    <tr>
        <td><a href="invoice/{{ $inv->id }}">{{ $inv->id }}</a></td>
        <td>{{ $inv->getCustomer()->fullName() }}</td>
        <td>{{ $inv->customer_id }}</td>
        <td>{{ $inv->created_at }}</td>
        <td><a href="invoice/{{ $inv->id }}/edit">Edit</a></td>
    </tr>
    @endforeach

</table>

<a href="{{ URL::to('invoice/new') }}">New Invoice</a>
@endsection