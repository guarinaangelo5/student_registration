<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register Student</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

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
            max-width: 900px;
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
            font-size: 30px;
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

        /* FORM CARD */

        .form-card {
            background: white;
            border-radius: 20px;
            border: none;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
        }

        .form-body {
            padding: 35px;
        }

        .section-title {
            font-weight: 800;
            color: var(--black);
            margin-bottom: 25px;
        }

        /* FORM */

        .form-label {
            font-weight: 700;
            color: #222;
        }

        .required {
            color: #dc3545;
        }

        .form-control,
        .form-select {
            border: 2px solid #e5e5e5;
            border-radius: 10px;
            padding: 11px 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--orange);
            box-shadow: 0 0 0 0.2rem rgba(255, 107, 0, 0.15);
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            font-weight: 600;
        }

        /* PROFILE UPLOAD */

        .profile-upload {
            background: #fff8f3;
            border: 2px dashed #ffb37d;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
        }

        .profile-preview {
            width: 120px;
            height: 120px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: var(--black);
            color: var(--orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 45px;
            font-weight: 800;
            overflow: hidden;
            border: 5px solid var(--orange);
        }

        .profile-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-help {
            color: #777;
            font-size: 13px;
            margin-top: 8px;
        }

        .choose-file {
            max-width: 500px;
            margin: auto;
        }

        /* BUTTONS */

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
        }

        .btn-dark-custom {
            background: var(--black);
            color: white;
            border: none;
            font-weight: 700;
            border-radius: 10px;
            padding: 11px 20px;
        }

        .btn-dark-custom:hover {
            background: #333333;
            color: white;
        }

        /* ERROR */

        .error-alert {
            border-left: 5px solid #dc3545;
            border-radius: 10px;
        }

        /* FOOTER */

        .footer-text {
            color: #999;
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
        }

        /* MOBILE */

        @media (max-width: 768px) {
            .form-body {
                padding: 25px 20px;
            }

            .header-card {
                padding: 25px 20px;
            }

            .header-title {
                font-size: 25px;
            }

            .form-actions {
                flex-direction: column;
                gap: 10px;
            }

            .form-actions .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container py-5 main-container">

    <!-- HEADER -->

    <div class="header-card mb-4">

        <h1 class="header-title">
            Register <span>Student</span>
        </h1>

        <p class="header-subtitle">
            Add a new student to the registration system
        </p>

    </div>


    <!-- FORM CARD -->

    <div class="form-card">

        <div class="form-body">

            <!-- VALIDATION ERRORS -->

            @if($errors->any())

                <div class="alert alert-danger error-alert">

                    <strong>Please fix the following:</strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <h4 class="section-title">
                Student Information
            </h4>


            <!-- FORM -->

            <form
                action="{{ route('students.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                <!-- STUDENT ID -->

                <div class="mb-3">

                    <label class="form-label">
                        Student ID
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="student_id"
                        class="form-control @error('student_id') is-invalid @enderror"
                        value="{{ old('student_id') }}"
                        placeholder="e.g. 2026-0001"
                        required
                    >

                    @error('student_id')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- NAME -->

                <div class="row">

                    <!-- FIRST NAME -->

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            First Name
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="first_name"
                            class="form-control @error('first_name') is-invalid @enderror"
                            value="{{ old('first_name') }}"
                            placeholder="First name"
                            required
                        >

                        @error('first_name')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- MIDDLE NAME -->

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Middle Name
                        </label>

                        <input
                            type="text"
                            name="middle_name"
                            class="form-control @error('middle_name') is-invalid @enderror"
                            value="{{ old('middle_name') }}"
                            placeholder="Middle name (optional)"
                        >

                        @error('middle_name')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- LAST NAME -->

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Last Name
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="last_name"
                            class="form-control @error('last_name') is-invalid @enderror"
                            value="{{ old('last_name') }}"
                            placeholder="Last name"
                            required
                        >

                        @error('last_name')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                <!-- EMAIL -->

                <div class="mb-3">

                    <label class="form-label">
                        Email Address
                        <span class="required">*</span>
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="student@example.com"
                        required
                    >

                    @error('email')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- MOBILE -->

                <div class="mb-3">

                    <label class="form-label">
                        Mobile Number
                        <span class="required">*</span>
                    </label>

                    <input
                        type="tel"
                        name="mobile_number"
                        class="form-control @error('mobile_number') is-invalid @enderror"
                        value="{{ old('mobile_number') }}"
                        placeholder="e.g. 09123456789"
                        inputmode="numeric"
                        required
                    >

                    @error('mobile_number')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- DATE OF BIRTH + GENDER -->

                <div class="row">

                    <!-- DATE OF BIRTH -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Date of Birth
                            <span class="required">*</span>
                        </label>

                        <input
                            type="date"
                            name="date_of_birth"
                            class="form-control @error('date_of_birth') is-invalid @enderror"
                            value="{{ old('date_of_birth') }}"
                            required
                        >

                        @error('date_of_birth')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- GENDER -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Gender
                            <span class="required">*</span>
                        </label>

                        <select
                            name="gender"
                            class="form-select @error('gender') is-invalid @enderror"
                            required
                        >

                            <option value="">
                                Select gender
                            </option>

                            <option
                                value="Male"
                                {{ old('gender') == 'Male' ? 'selected' : '' }}
                            >
                                Male
                            </option>

                            <option
                                value="Female"
                                {{ old('gender') == 'Female' ? 'selected' : '' }}
                            >
                                Female
                            </option>

                            <option
                                value="Other"
                                {{ old('gender') == 'Other' ? 'selected' : '' }}
                            >
                                Other
                            </option>

                        </select>

                        @error('gender')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                <!-- PROGRAM -->

                <div class="mb-3">

                    <label class="form-label">
                        Program
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="program"
                        class="form-control @error('program') is-invalid @enderror"
                        value="{{ old('program') }}"
                        placeholder="e.g. BS Information Technology"
                        required
                    >

                    @error('program')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- YEAR LEVEL -->

                <div class="mb-3">

                    <label class="form-label">
                        Year Level
                        <span class="required">*</span>
                    </label>

                    <select
                        name="year_level"
                        class="form-select @error('year_level') is-invalid @enderror"
                        required
                    >

                        <option value="">
                            Select year level
                        </option>

                        <option
                            value="1st Year"
                            {{ old('year_level') == '1st Year' ? 'selected' : '' }}
                        >
                            1st Year
                        </option>

                        <option
                            value="2nd Year"
                            {{ old('year_level') == '2nd Year' ? 'selected' : '' }}
                        >
                            2nd Year
                        </option>

                        <option
                            value="3rd Year"
                            {{ old('year_level') == '3rd Year' ? 'selected' : '' }}
                        >
                            3rd Year
                        </option>

                        <option
                            value="4th Year"
                            {{ old('year_level') == '4th Year' ? 'selected' : '' }}
                        >
                            4th Year
                        </option>

                    </select>

                    @error('year_level')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- ADDRESS -->

                <div class="mb-4">

                    <label class="form-label">
                        Address
                        <span class="required">*</span>
                    </label>

                    <textarea
                        name="address"
                        class="form-control @error('address') is-invalid @enderror"
                        rows="3"
                        placeholder="Enter complete address"
                        required
                    >{{ old('address') }}</textarea>

                    @error('address')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- PROFILE PICTURE -->

                <div class="mb-4">

                    <label class="form-label">
                        Profile Picture
                        <span class="required">*</span>
                    </label>

                    <div class="profile-upload">

                        <!-- PREVIEW -->

                        <div
                            class="profile-preview"
                            id="profilePreview"
                        >
                            👤
                        </div>


                        <div class="choose-file">

                            <input
                                type="file"
                                name="profile_picture"
                                id="profilePicture"
                                class="form-control @error('profile_picture') is-invalid @enderror"
                                accept="image/jpeg,image/png,image/webp"
                                required
                            >

                            @error('profile_picture')

                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="profile-help">

                            JPG, JPEG, PNG, or WEBP

                            <br>

                            Maximum file size: 2MB

                        </div>

                    </div>

                </div>


                <!-- BUTTONS -->

                <div class="d-flex justify-content-between align-items-center form-actions">

                    <a
                        href="{{ route('students.index') }}"
                        class="btn btn-dark-custom"
                    >
                        ← Back
                    </a>


                    <button
                        type="submit"
                        class="btn btn-orange"
                    >
                        ✓ Register Student
                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- FOOTER -->

    <div class="footer-text">

        Student Registration System

        &copy; {{ date('Y') }}

    </div>

</div>


<!-- IMAGE PREVIEW -->

<script>

    const profilePicture =
        document.getElementById('profilePicture');

    const profilePreview =
        document.getElementById('profilePreview');


    profilePicture.addEventListener('change', function(event) {

        const file = event.target.files[0];


        if (!file) {

            profilePreview.innerHTML = '👤';

            return;
        }


        if (!file.type.startsWith('image/')) {

            profilePreview.innerHTML = '👤';

            return;
        }


        const reader = new FileReader();


        reader.onload = function(e) {

            profilePreview.innerHTML =
                `<img
                    src="${e.target.result}"
                    alt="Profile Preview"
                >`;

        };


        reader.readAsDataURL(file);

    });

</script>

</body>
</html>