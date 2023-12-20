{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Details Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        form {
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input, select, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="/person/create" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="@csrf">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="mobile">Mobile Number:</label>
        <input type="tel" id="mobile" name="mobile" required>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="skills">Skills:</label>
        <select id="skills" name="skills[]" multiple>
            <option value="skill1">Skill 1</option>
            <option value="skill2">Skill 2</option>
        </select>

        <label for="profileImage">Profile Image:</label>
        <input type="file" id="profileImage" name="profileImage" accept="image/*" required>

        <label for="portfolioImages">Portfolio Images:</label>
        <input type="file" id="portfolioImages" name="portfolioImages[]" accept="image/*" multiple>

        <button type="submit">Submit</button>
    </form>
</body>
</html> --}}
