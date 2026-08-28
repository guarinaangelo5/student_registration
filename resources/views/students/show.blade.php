```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Profile</title>

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

        .profile-container {
            max-width: 950px;
            margin: auto;
        }

        /* PROFILE CARD */
        .profile-card {
            background: white;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
        }

        /* HEADER */
        .profile-header {
            background: var(--black);
            color: white;
            padding: 40px 30px;
            text-align: center;
            border-bottom: 6px solid var(--orange);
        }

        /* PROFILE PICTURE */
        .profile-icon {
            width: 130px;
            height: 130px;
            margin: auto;
            border-radius: 50%;
            background: var(--orange);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            font-weight: 800;
            border: 5px solid white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .profile-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name {
            font-size: 30px;
            font-weight: 800;
            margin-top: 18px;
            margin-bottom: 5px;
        }

        .profile-role {
            color: #bbbbbb;
            margin-bottom: 0;
            font-size: 15px;
        }

        /* BODY */
        .profile-body {
            padding: 35px;
        }

        .section-title {
            font-weight: 800;
            color: var(--black);
            margin-bottom: 25px;
        }

        /* INFORMATION BOX */
        .info-box {
            background: #f8f8f8;
            border-left: 5px solid var(--orange);
            border-radius: 12px;
            padding: 18px;
            height: 100%;
            transition: 0.2s ease;
        }

        .info-box:hover {
            background: #fff5ed;
            transform: translateY(-2px);
        }

        .info-label {
            color: #777;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 0.6px;
            margin-bottom: 6px;
        }

        .info-value {
            color: var(--black);
            font-size: 17px;
            font-weight: 700;
            word-break: break-word;
        }

        /* STUDENT ID */
        .student-id {
            display: inline-block;
            background: #fff0e6;
            color: var(--orange);
            border: 1px solid #ffd2b3;
            border-radius: 8px;
            padding: 6px 12px;
            font-weight: 800;
        }

        /* YEAR BADGE */
        .year-badge {
            display: inline-block;
            background: var(--black);
            color: white;
            border-radius: 8px;
            padding: 6px 12px;
            font-weight: 700;
        }

        /* SUCCESS MESSAGE */
        .success-alert {
            border-left: 5px solid #198754;
            border-radius: 10px;
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

        /* FOOTER */
        .footer-text {
            color: #999;
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
        }

        /* MOBILE */
        @media (max-width: 768px) {

            .profile-header {
                padding: 30px 20px;
            }

            .profile-name {
                font-size: 25px;
            }

            .profile-body {
                padding: 25px 20px;
            }

            .profile-body .d-flex {
                flex-direction: column;
                gap: 10px;
            }

            .profile-body .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container py-5 profile-container">

    <div class="profile-card">

        <!-- PROFILE HEADER -->
        <div class="profile-header">

            <!-- PROFILE PICTURE -->
            <div class="profile-icon">

                @if($student->profile_picture)

                    <img
                        src="{{ asset('storage/' . $student->profile_picture) }}"
                        alt="{{ $student->name }}"
                    >

                @else

                    {{ strtoupper(substr($student->name, 0, 1)) }}

                @endif

            </div>

            <!-- STUDENT NAME -->
            <h1 class="profile-name">
                {{ $student->name }}
            </h1>

            <p class="profile-role">
                Student Profile
            </p>

        </div>


        <!-- PROFILE BODY -->
        <div class="profile-body">

            <!-- SUCCESS MESSAGE -->
            @if(session('success'))

                <div class="alert alert-success success-alert mb-4">

                    <strong>Success!</strong>
                    {{ session('success') }}

                </div>

            @endif


            <h4 class="section-title">
                Student Information
            </h4>


            <div class="row g-3">

                <!-- STUDENT ID -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Student ID
                        </div>

                        <div class="info-value">

                            <span class="student-id">
                                {{ $student->student_id }}
                            </span>

                        </div>

                    </div>

                </div>


                <!-- FULL NAME -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Full Name
                        </div>

                        <div class="info-value">
                            {{ $student->name }}
                        </div>

                    </div>

                </div>


                <!-- FIRST NAME -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            First Name
                        </div>

                        <div class="info-value">
                            {{ $student->first_name }}
                        </div>

                    </div>

                </div>


                <!-- MIDDLE NAME -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Middle Name
                        </div>

                        <div class="info-value">
                            {{ $student->middle_name ?: 'N/A' }}
                        </div>

                    </div>

                </div>


                <!-- LAST NAME -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Last Name
                        </div>

                        <div class="info-value">
                            {{ $student->last_name }}
                        </div>

                    </div>

                </div>


                <!-- EMAIL -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Email Address
                        </div>

                        <div class="info-value">
                            {{ $student->email }}
                        </div>

                    </div>

                </div>


                <!-- MOBILE -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Mobile Number
                        </div>

                        <div class="info-value">
                            {{ $student->mobile_number }}
                        </div>

                    </div>

                </div>


                <!-- DATE OF BIRTH -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Date of Birth
                        </div>

                        <div class="info-value">

                            {{ $student->date_of_birth
                                ? \Carbon\Carbon::parse($student->date_of_birth)->format('F d, Y')
                                : 'N/A'
                            }}

                        </div>

                    </div>

                </div>


                <!-- GENDER -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Gender
                        </div>

                        <div class="info-value">
                            {{ $student->gender }}
                        </div>

                    </div>

                </div>


                <!-- PROGRAM -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Program
                        </div>

                        <div class="info-value">
                            {{ $student->program }}
                        </div>

                    </div>

                </div>


                <!-- YEAR LEVEL -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Year Level
                        </div>

                        <div class="info-value">

                            <span class="year-badge">
                                {{ $student->year_level }}
                            </span>

                        </div>

                    </div>

                </div>


                <!-- ADDRESS -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Address
                        </div>

                        <div class="info-value">
                            {{ $student->address }}
                        </div>

                    </div>

                </div>


                <!-- PROFILE PICTURE STATUS -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Profile Picture
                        </div>

                        <div class="info-value">

                            @if($student->profile_picture)

                                <span class="text-success">
                                    ✓ Uploaded
                                </span>

                            @else

                                <span class="text-danger">
                                    No profile picture
                                </span>

                            @endif

                        </div>

                    </div>

                </div>


                <!-- REGISTERED DATE -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Registered Date
                        </div>

                        <div class="info-value">

                            {{ $student->created_at
                                ? $student->created_at->format('F d, Y')
                                : 'N/A'
                            }}

                        </div>

                    </div>

                </div>


                <!-- LAST UPDATED -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Last Updated
                        </div>

                        <div class="info-value">

                            {{ $student->updated_at
                                ? $student->updated_at->format('F d, Y h:i A')
                                : 'N/A'
                            }}

                        </div>

                    </div>

                </div>

            </div>


            <!-- ACTION BUTTONS -->
            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">

                <a
                    href="{{ route('students.index') }}"
                    class="btn btn-dark-custom"
                >
                    ← Back to Students
                </a>


                <a
                    href="{{ route('students.edit', $student) }}"
                    class="btn btn-orange"
                >
                    ✏ Edit Profile
                </a>

            </div>

        </div>

    </div>


    <!-- FOOTER -->
    <div class="footer-text">

        Student Registration System
        &copy; {{ date('Y') }}

    </div>

</div>

</body>

</html>

