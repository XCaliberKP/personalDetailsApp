<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalDetail; // Ensure this matches your model

class PersonalDetailController extends Controller
{
    // Method to display all personal details
    public function index()
    {
        $personalDetails = PersonalDetail::all();
        return view('personal_details.index', compact('personalDetails'));
    }

    // Method to display a form for creating a new personal detail
    public function create()
    {
        return view('personal_details.create');
    }

    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'mobile_number' => 'required|numeric',
        'state' => 'required|max:255',
        'city' => 'required|max:255',
        'skills' => 'required', // Adjust validation based on your needs
        'profile_image' => 'image|nullable|max:1999', // Example validation for image
        'portfolio_images' => 'nullable', // Add validation as needed
        'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Create a new PersonalDetail instance and assign the validated data
    $personalDetail = new PersonalDetail();
    $personalDetail->name = $validatedData['name'];
    $personalDetail->mobile_number = $validatedData['mobile_number'];
    $personalDetail->state = $validatedData['state'];
    $personalDetail->city = $validatedData['city'];

    // Handling the 'skills' field
    if (is_array($validatedData['skills'])) {
        // Convert the array of skills to a comma-separated string
        $personalDetail->skills = implode(',', $validatedData['skills']);
    } else {
        // Assign directly if it's not an array
        $personalDetail->skills = $validatedData['skills'];
    }

    // Handle file upload for profile image
    if ($request->hasFile('profile_image')) {
        $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('profile_image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);

        $personalDetail->profile_image = $fileNameToStore;
    } else {
        $personalDetail->profile_image = 'noimage.jpg'; // Default image or no image
    }

    // Handle multiple file upload for portfolio images
    if ($request->hasFile('portfolio_images')) {
        $portfolioImages = [];
        foreach ($request->file('portfolio_images') as $file) {
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $file->storeAs('public/portfolio_images', $fileNameToStore);
            $portfolioImages[] = $fileNameToStore;
        }
        $personalDetail->portfolio_images = json_encode($portfolioImages);
    } else {
        $personalDetail->portfolio_images = json_encode([]); // Empty array if no images
    }

    // Save the personal detail
    $personalDetail->save();

    // Redirect to a specific route with a success message
    return redirect('/personal-details')->with('success', 'Personal Detail Created');
}


    // Method to display a specific personal detail
    public function show($id)
    {
        $personalDetail = PersonalDetail::findOrFail($id);
        return view('personal_details.show', compact('personalDetail'));
    }

    // Method to show the form for editing a specific personal detail
    public function edit($id)
    {
        $personalDetail = PersonalDetail::findOrFail($id);
        return view('personal_details.edit', compact('personalDetail'));
    }

    // Method to update a specific personal detail
public function update(Request $request, $id)
{
    $personalDetail = PersonalDetail::findOrFail($id);

    // Validate and update data
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'mobile_number' => 'required|numeric',
        'state' => 'required|max:255',
        'city' => 'required|max:255',
        'skills' => 'required', // Adjust validation based on your needs
        'profile_image' => 'image|nullable|max:1999', // Example validation for image
        'portfolio_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Update model data
    $personalDetail->update($validatedData);

    // Handle file upload for profile image
    if ($request->hasFile('profile_image')) {
        $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('profile_image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);

        $personalDetail->profile_image = $fileNameToStore;
    }

    // Handle multiple file upload for portfolio images
    if ($request->hasFile('portfolio_images')) {
        $portfolioImages = [];
        foreach ($request->file('portfolio_images') as $file) {
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $file->storeAs('public/portfolio_images', $fileNameToStore);
            $portfolioImages[] = $fileNameToStore;
        }
        $personalDetail->portfolio_images = json_encode($portfolioImages);
    }

    // Save the updated details
    $personalDetail->save();

    return redirect('/personal-details')->with('success', 'Personal Detail Updated');
}

    // Method to delete a specific personal detail
    public function destroy($id)
    {
        $personalDetail = PersonalDetail::findOrFail($id);
        $personalDetail->delete();

        return redirect('/personal-details')->with('success', 'Personal Detail Deleted');
    }
}
