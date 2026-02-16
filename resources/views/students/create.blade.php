<!DOCTYPE html>
<html>

<head>
    <title>Add Student</title>
</head>

<body>
    <h1>Add New Student</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <label>Name</label> <input type="text" name="username" required>
        <label>Email</label> <input type="email" name="email" required>
        <label>Age</label> <input type="number" name="age" required>
        <button class="btn btn-green">Save Student</button>
    </form>
</body>

</html>