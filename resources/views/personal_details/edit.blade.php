<!-- resources/views/personal_details/edit.blade.php -->
@extends('layouts.app')
<link href="{{ asset('css/edit.css') }}" rel="stylesheet">

@section('content')
<!-- Button to go to the Create Personal Details page -->
<a href="{{ url('personal-details/create') }}" style="padding: 8px 15px; background-color: #28a745; color: white; text-align: center; text-decoration: none; display: inline-block; margin-bottom: 20px;">Create Personal Detail</a>

<!-- Button to go to the List Personal Details page -->
<a href="{{ url('personal-details') }}" style="padding: 8px 15px; background-color: #007bff; color: white; text-align: center; text-decoration: none; display: inline-block; margin-bottom: 20px; margin-left: 10px;">List Personal Details</a>

<h1>Edit Personal Detail</h1>
<form method="POST" action="{{ url('personal-details/' . $personalDetail->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $personalDetail->name }}" required>
    </div>
    <div>
        <label for="mobile_number">Mobile Number:</label>
        <input type="text" id="mobile_number" name="mobile_number" value="{{ $personalDetail->mobile_number }}" required>
    </div>
    <div>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" value="{{ $personalDetail->state }}" required>
    </div>
    <div>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="{{ $personalDetail->city }}" required>
    </div>
    <div>
        <label for="skills">Skills:</label>
        <select id="skills" name="skills[]" multiple required>
            @php
                $selectedSkills = explode(',', $personalDetail->skills); // Assuming skills are stored as a comma-separated string
            @endphp
            <option value="skill1" {{ in_array('skill1', $selectedSkills) ? 'selected' : '' }}>Skill 1</option>
            <option value="skill2" {{ in_array('skill2', $selectedSkills) ? 'selected' : '' }}>Skill 2</option>
            <!-- Add more options here -->
        </select>
    </div>
    
    <div>
        <label for="profile_image">Profile Image:</label>
        <input type="file" id="profile_image" name="profile_image">
    </div>
    <div>
        <label for="portfolio_images">Portfolio Images:</label>
        <input type="file" id="portfolio_images" name="portfolio_images[]" multiple>
    </div>
    <button type="submit">Update</button>
</form>
@endsection
