<!-- resources/views/personal_details/create.blade.php -->
@extends('layouts.app')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@section('content')
<!-- Button to go to the Show Personal Details page -->
<a href="{{ url('personal-details') }}" style="padding: 8px 15px; background-color: #007bff; color: white; text-align: center; text-decoration: none; display: inline-block; margin-bottom: 20px;">Show Personal Details</a>
<h1>Create Personal Detail</h1>
<form method="POST" action="{{ url('personal-details') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="mobile_number">Mobile Number:</label>
        <input type="text" id="mobile_number" name="mobile_number" required>
    </div>
    <div>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>
    </div>
    <div>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>
    </div>
    <div>
        <label>Skills:</label>
        <div>
            <input type="checkbox" id="skill1" name="skills[]" value="skill1">
            <label for="skill1">Skill 1</label>
        </div>
        <div>
            <input type="checkbox" id="skill2" name="skills[]" value="skill2">
            <label for="skill2">Skill 2</label>
        </div>
    </div>
    
    <div>
        <label for="profile_image">Profile Image:</label>
        <input type="file" id="profile_image" name="profile_image">
    </div>
    <div>
        <label for="portfolio_images">Portfolio Images:</label>
        <input type="file" id="portfolio_images" name="portfolio_images[]" multiple>
    </div>
    <button type="submit">Submit</button>
</form>
@endsection
