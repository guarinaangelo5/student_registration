```blade
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        :root {
            --orange: #ff6b00;
            --orange-light: #ff8c33;
            --black: #111111;
            --dark: #1a1a1a;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background:
                linear-gradient(
                    135deg,
                    #111111 0%,
                    #111111 35%,
                    #1c1c1c 35%,
                    #1c1c1c 100%
                );
            font-family: Arial, Helvetica, sans-serif;
        }

        .main-container {
            max-width: 1400px;
            margin: auto;
        }

        /* HEADER */
        .header-card {
            background: var(--black);
            color: white;
            border-radius: 20px;
            padding: 30px;
            border-left: 7px solid var(--orange);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        }

        .header-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .header-title span {
            color: var(--orange);
        }

        .header-subtitle {
            color: #bdbdbd;
            margin-bottom: 0;
        }

        /* BUTTON */
        .btn-orange {
            background: var(--orange);
            color: white;
            border: none;
            font-weight: 700;
            border-radius: 10px;
            padding: 11px 20px;
            transition: 0.2s ease;
        }

        .btn-orange:hover {
            background: var(--orange-light);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 107, 0, 0.35);
        }

        /* SUCCESS */
        .success-alert {
            background: #171717;
            color: white;
            border: none;
            border-left: 5px solid #28a745;
            border-radius: 12px;
        }

        .success-alert strong {
            color: #45d96b;
        }

        /* SEARCH */
        .search-card {
            background: white;
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.18);
        }

        .search-title {
            font-weight: 800;
            color: var(--black);
        }

        .search-input {
            border: 2px solid #e3e3e3;
            border-radius: 10px 0 0 10px;
            padding: 12px 15px;
        }

        .search-input:focus {
            border-color: var(--orange);
            box-shadow: 0 0 0 0.2rem rgba(255, 107, 0, 0.15);
        }

        .search-btn {
            background: var(--black);
            color: white;
            border: none;
            font-weight: 700;
            padding: 0 22px;
        }

        .search-btn:hover {
            background: var(--orange);
            color: white;
        }

        .clear-btn {
            border: 2px solid #ddd;
            font-weight: 600;
            border-radius: 10px;
        }

        /* STUDENT HEADING */
        .student-heading {
            color: white;
            font-weight: 800;
        }

        .student-count {
            background: var(--orange);
            color: white;
            font-weight: 700;
            padding: 8px 14px;
            border-radius: 50px;
        }

        /* TABLE */
        .table-card {
            background: white;
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .student-table {
            margin-bottom: 0;
        }

        .student-table thead th {
            background: var(--black);
            color: white;
            padding: 16px;
            border: none;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .student-table tbody td {
            padding: 16px;
            vertical-align: middle;
            border-color: #eeeeee;
        }

        .student-table tbody tr {
            transition: 0.2s ease;
        }

        .student-table tbody tr:hover {
            background: #fff7f0;
        }

        /* PROFILE PICTURE */
        .student-avatar {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: var(--black);
            color: var(--orange);
            border: 3px solid var(--orange);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
            font-weight: 800;

            overflow: hidden;
        }

        .student-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* BADGES */
        .id-badge {
            background: #eeeeee;
            color: #222;
            font-weight: 700;
            padding: 6px 10px;
            border-radius: 7px;
        }

        .student-id-badge {
            background: #fff0e6;
            color: var(--orange);
            border: 1px solid #ffd2b3;
            font-weight: 800;
            padding: 6px 10px;
            border-radius: 7px;
        }

        .student-name {
            font-weight: 800;
            color: #222;
        }

        .email-text {
            color: #666;
        }

        .course-text {
            font-weight: 600;
        }

        .year-badge {
            background: var(--black);
            color: white;
            padding: 6px 10px;
            border-radius: 7px;
            font-weight: 600;
        }

        /* ACTIONS */
        .action-buttons {
            white-space: nowrap;
        }

        .action-btn {
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            padding: 7px 11px;
            margin-right: 3px;
        }

        .btn-view {
            background: var(--black);
            color: white;
            border: none;
        }

        .btn-view:hover {
            background: #333;
            color: white;
        }

        .btn-edit {
            background: var(--orange);
            color: white;
            border: none;
        }

        .btn-edit:hover {
            background: var(--orange-light);
            color: white;
        }

        .btn-delete {
            background: white;
            color: #dc3545;
            border: 1px solid #dc3545;
        }

        .btn-delete:hover {
            background: #dc3545;
            color: white;
        }

        /* DELETE MODAL */
        .delete-modal .modal-content {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
        }

        .delete-modal .modal-header {
            background: var(--black);
            color: white;
            border-bottom: 4px solid var(--orange);
            padding: 18px 22px;
        }

        .delete-modal .modal-title {
            font-weight: 800;
        }

        .delete-icon {
            width: 75px;
            height: 75px;
            margin: 0 auto 15px;
            background: #fff0e6;
            color: var(--orange);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
        }

        .delete-modal .modal-body {
            padding: 30px 25px;
        }

        .delete-modal .modal-body h5 {
            font-weight: 800;
        }

        .btn-delete-confirm {
            background: #dc3545;
            color: white;
            border: none;
            font-weight: 700;
            border-radius: 9px;
            padding: 9px 18px;
        }

        .btn-delete-confirm:hover {
            background: #bb2d3b;
            color: white;
        }

        .btn-cancel {
            background: #eeeeee;
            color: #222;
            border: none;
            font-weight: 700;
            border-radius: 9px;
            padding: 9px 18px;
        }

        /* EMPTY */
        .empty-card {
            background: white;
            border-radius: 18px;
            padding: 60px 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .empty-icon {
            width: 75px;
            height: 75px;
            margin: auto auto 20px;
            background: #fff0e6;
            color: var(--orange);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .empty-card h4 {
            font-weight: 800;
        }

        /* FOOTER */
        .footer-text {
            color: #999;
            text-align: center;
            margin-top: 30px;
            font-size: 13px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {

            .header-card {
                padding: 22px;
            }

            .header-title {
                font-size: 25px;
            }

            .header-card .btn-orange {
                width: 100%;
            }

            .search-input {
                border-radius: 10px;
            }

            .search-btn {
                margin-top: 8px;
                width: 100%;
                padding: 11px;
                border-radius: 10px !important;
            }

            .clear-btn {
                margin-top: 8px;
                width: 100%;
            }

            .student-table {
                min-width: 1000px;
            }
        }
    </style>
</head>


<body>

<div class="container py-5 main-container">

    <!-- HEADER -->
    <div class="header-card mb-4">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

            <div>

                <h1 class="header-title">
                    Student <span>Registration</span>
                </h1>

                <p class="header-subtitle">
                    Manage and organize all registered students
                </p>

            </div>

            <a href="{{ route('students.create') }}"
               class="btn btn-orange">

                + Register Student

            </a>

        </div>

    </div>


    <!-- SUCCESS MESSAGE -->
    @if(session('success'))

        <div class="alert success-alert alert-dismissible fade show shadow-sm"
             role="alert">

            <strong>✓ Success!</strong>
            {{ session('success') }}

            <button type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- SEARCH -->
    <div class="card search-card mb-4">

        <div class="card-body p-4">

            <h5 class="search-title mb-3">
                🔎 Search Students
            </h5>

            <form action="{{ route('students.index') }}"
                  method="GET">

                <div class="row g-2">

                    <div class="col-lg-9">

                        <div class="input-group">

                            <input
                                type="text"
                                name="search"
                                class="form-control search-input"
                                placeholder="Search name, student ID, email, or course..."
                                value="{{ request('search') }}"
                            >

                            <button type="submit"
                                    class="btn search-btn">

                                Search

                            </button>

                        </div>

                    </div>

                    @if(request('search'))

                        <div class="col-lg-3">

                            <a href="{{ route('students.index') }}"
                               class="btn btn-outline-secondary clear-btn w-100">

                                Clear Search

                            </a>

                        </div>

                    @endif

                </div>

            </form>

        </div>

    </div>


    <!-- STUDENT LIST -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <h4 class="student-heading mb-0">
            Registered Students
        </h4>

        <span class="student-count">

            {{ $students->count() }}
            Student{{ $students->count() != 1 ? 's' : '' }}

        </span>

    </div>


    @if($students->count())

        <!-- TABLE -->
        <div class="table-card">

            <div class="table-responsive">

                <table class="table student-table">

                    <thead>

                        <tr>

                            <th>Profile</th>
                            <th>ID</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Year Level</th>
                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($students as $student)

                            <tr>

                                <!-- PROFILE -->
                                <td>

                                    <div class="student-avatar">

                                        @if($student->profile_picture)

                                            <img
                                                src="{{ asset('storage/' . $student->profile_picture) }}"
                                                alt="{{ $student->name }}"
                                            >

                                        @else

                                            {{ strtoupper(substr($student->name, 0, 1)) }}

                                        @endif

                                    </div>

                                </td>


                                <!-- ID -->
                                <td>

                                    <span class="id-badge">
                                        {{ $student->id }}
                                    </span>

                                </td>


                                <!-- STUDENT ID -->
                                <td>

                                    <span class="student-id-badge">
                                        {{ $student->student_id }}
                                    </span>

                                </td>


                                <!-- NAME -->
                                <td>

                                    <span class="student-name">
                                        {{ $student->name }}
                                    </span>

                                </td>


                                <!-- EMAIL -->
                                <td>

                                    <span class="email-text">
                                        {{ $student->email }}
                                    </span>

                                </td>


                                <!-- COURSE -->
                                <td>

                                    <span class="course-text">
                                        {{ $student->course }}
                                    </span>

                                </td>


                                <!-- YEAR -->
                                <td>

                                    <span class="year-badge">
                                        {{ $student->year_level }}
                                    </span>

                                </td>


                                <!-- ACTIONS -->
                                <td class="action-buttons">

                                    <a
                                        href="{{ route('students.show', $student) }}"
                                        class="btn action-btn btn-view">

                                        View

                                    </a>


                                    <a
                                        href="{{ route('students.edit', $student) }}"
                                        class="btn action-btn btn-edit">

                                        Edit

                                    </a>


                                    <button
                                        type="button"
                                        class="btn action-btn btn-delete"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $student->id }}">

                                        Delete

                                    </button>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>


        <!-- DELETE MODALS -->
        @foreach($students as $student)

            <div
                class="modal fade delete-modal"
                id="deleteModal{{ $student->id }}"
                tabindex="-1"
                aria-hidden="true"
            >

                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content">

                        <div class="modal-header">

                            <h5 class="modal-title">
                                Delete Student
                            </h5>

                            <button
                                type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="modal">
                            </button>

                        </div>


                        <div class="modal-body text-center">

                            <div class="delete-icon">
                                ⚠️
                            </div>

                            <h5>
                                Are you sure?
                            </h5>

                            <p class="text-muted mb-1">
                                You are about to delete
                            </p>

                            <p class="mb-2">

                                <strong>
                                    {{ $student->name }}
                                </strong>

                            </p>

                            <p class="text-danger small mb-0">
                                This action cannot be undone.
                            </p>

                        </div>


                        <div class="modal-footer">

                            <button
                                type="button"
                                class="btn btn-cancel"
                                data-bs-dismiss="modal">

                                Cancel

                            </button>


                            <form
                                action="{{ route('students.destroy', $student) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-delete-confirm">

                                    Yes, Delete

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @endforeach


    @else

        <!-- EMPTY STATE -->
        <div class="empty-card">

            <div class="empty-icon">
                👤
            </div>


            @if(request('search'))

                <h4>
                    No Students Found
                </h4>

                <p class="text-muted">

                    No student matched your search for

                    <strong>
                        "{{ request('search') }}"
                    </strong>

                </p>

                <a
                    href="{{ route('students.index') }}"
                    class="btn btn-orange">

                    Clear Search

                </a>

            @else

                <h4>
                    No Students Registered
                </h4>

                <p class="text-muted">
                    Start by registering your first student.
                </p>

                <a
                    href="{{ route('students.create') }}"
                    class="btn btn-orange">

                    + Register Student

                </a>

            @endif

        </div>

    @endif


    <!-- FOOTER -->
    <div class="footer-text">

        Student Registration System
        &copy; {{ date('Y') }}

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
```
