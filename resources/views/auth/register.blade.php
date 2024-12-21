<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mt-5">Register</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select name="role" class="form-control" required>
                            <option value="HRD">HRD</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="accounting">Accounting</option>
                            <option value="kapten_divisi">Kapten Divisi</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
