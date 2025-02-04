<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Link to Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .profile-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
        }

        .alert {
            display: none;
        }
    </style>
</head>
<body>

    <!-- Profile Section -->
    <div class="profile-container">
        <div class="profile-header">
            <!-- Display Profile Picture -->
            <img src="{{ asset('backend/img/yuki.jpg') }}" alt="Profile Picture">
            <h2>{{ auth()->user()->name }}'s Profile</h2>
        </div>

        <!-- Success Alert -->
        <div id="successAlert" class="alert alert-success">
            Profile updated successfully!
        </div>

        <!-- Update Profile Form -->
        <form action="{{ route('profile.update') }}" method="POST" id="profileForm">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" required>
            </div>

            <div class="form-group">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control" required>
                    <option value="admin" {{ auth()->user()->level == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="owner" {{ auth()->user()->level == 'owner' ? 'selected' : '' }}>Owner</option>
                    <option value="user" {{ auth()->user()->level == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>

    <!-- Link to JavaScript and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript for handling form submission and showing success message
        document.getElementById('profileForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            
            // Simulate a successful form submission (you should replace this with your actual submission logic)
            setTimeout(function() {
                // Show success alert
                document.getElementById('successAlert').style.display = 'block';
            }, 1000); // Simulate a short delay before showing success message
        });
    </script>
</body>
</html>
