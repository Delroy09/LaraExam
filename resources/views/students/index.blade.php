<table border="2" cellpadding="9">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Actions</th>
    </tr>

    @forelse($students as $student)
    <tr>
        <td>{{ $student->username }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->age }}</td>
        <td>
            <a href="{{ route('students.edit', $student->id) }}">Edit</a>

            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Delete?')">Delete</button>
            </form>
        </td>
    </tr>

    @empty
    <tr>
        <td colspan="4" style="text-align:center;">
            No students found
        </td>
    </tr>
    @endforelse
</table>