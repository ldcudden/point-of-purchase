@extends('layout')

@section('main')
<div><a href="/home">Home</a></div>
<h1>Create Invoice</h1>


@if($errors->count() > 0)
<div class="errors">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

<form action="{{ URL::to('invoice/new') }}" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div><span>Customer ID:</span><input type="text" name="customer_id" value="{{ old('name') }}"></div>
    <div><span>Date Created: </span><input type="text" name="created_at" value="{{ old('description') }}"></div>
    
    <div><button>Save</button></div>
</form>
@endsection
