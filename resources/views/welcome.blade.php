@extends('layouts.app')

@section('title', 'Customer Management System')

@section('content')
<div class="container mt-2">
    <!-- Hero Section -->
    <div class="d-flex justify-content-center">
        <img src="{{ asset('images/hero_image.gif') }}" alt="Hero Image" class="img-fluid" style="width: 500px; height: auto;">
    </div>
    <h1 class="text-center" style="font-size:xx-large;">Welcome to the Customer Management System</h1>
    <p class="lead text-center mb-3">This system allows you to manage your customers' information.</p>
    
    <!-- Add Customer Button -->
    <div class="d-flex justify-content-center mb-3">
        <a href="{{ route('customers.index') }}" class="btn btn-primary">Get Started</a>
    </div>
</div>
@endsection

