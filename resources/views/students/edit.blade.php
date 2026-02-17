<!DOCTYPE html>
<html>

<head>
    <title>Edit Student</title>
</head>

<body>
    <h1>Edit Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name</label> <input type="text" name="username" value="{{ $student->username }}" required>
        <label>Email</label> <input type="email" name="email" value="{{ $student->email }}" required>
        <label>Age</label> <input type="number" name="age" value="{{ $student->age }}" required>
        <button class="btn btn-green">Update Student</button>
    </form>
    <br>
    <a href="{{ route('students.index') }}">Back to List</a>
</body>

</html>