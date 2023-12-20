<!-- resources/views/personal_details/show.blade.php -->
@extends('layouts.app')

<link href="{{ asset('css/show.css') }}" rel="stylesheet">

@section('content')
<!-- Button to go to the Create Personal Details page -->
<a href="{{ url('personal-details/create') }}" style="padding: 8px 15px; background-color: #28a745; color: white; text-align: center; text-decoration: none; display: inline-block; margin-bottom: 20px;">Create Personal Detail</a>

<!-- Button to go to the List Personal Details page -->
<a href="{{ url('personal-details') }}" style="padding: 8px 15px; background-color: #007bff; color: white; text-align: center; text-decoration: none; display: inline-block; margin-bottom: 20px; margin-left: 10px;">List Personal Details</a>

<h1>View Personal Detail</h1>
<div>
    <strong>Name:</strong> {{ $personalDetail->name }}
</div>
<div>
    <strong>Mobile Number:</strong> {{ $personalDetail->mobile_number }}
</div>
<div>
    <strong>State:</strong> {{ $personalDetail->state }}
</div>
<div>
    <strong>City:</strong> {{ $personalDetail->city }}
</div>
<div>
    <strong>Skills:</strong> {{ $personalDetail->skills }}
</div>
@if ($personalDetail->profile_image)
    <div>
        <strong>Profile Image:</strong>
        <img src="{{ asset('storage/profile_images/' . $personalDetail->profile_image) }}" alt="Profile Image">
    </div>
@endif
@if ($personalDetail->portfolio_images)
    <div>
        <strong>Portfolio Images:</strong>
        @foreach (json_decode($personalDetail->portfolio_images) as $image)
            <img src="{{ asset('storage/portfolio_images/' . $image) }}" alt="Portfolio Image">
        @endforeach
    </div>
@endif
@endsection
