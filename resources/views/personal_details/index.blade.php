<!-- resources/views/personal_details/index.blade.php -->
@extends('layouts.app')

<link href="{{ asset('css/index.css') }}" rel="stylesheet">

@section('content')
<h1>Personal Details</h1>
<a href="{{ url('personal-details/create') }}">Create New Detail</a>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
    <tr>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @foreach ($personalDetails as $detail)
        <tr>
            <td>{{ $detail->name }}</td>
            <td>
                <a href="{{ url('personal-details/' . $detail->id) }}">View</a> |
                <a href="{{ url('personal-details/' . $detail->id . '/edit') }}">Edit</a> |
                <form action="{{ url('personal-details/' . $detail->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
