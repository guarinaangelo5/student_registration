<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile - Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        :root {
            --orange: #ff6b00;
            --orange-light: #ff8c33;
            --black: #111111;
            --dark: #1a1a1a;
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
            max-width: 900px;
            margin: auto;
        }

        .profile-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .profile-header {
            background: var(--black);
            color: white;
            padding: 35px;
            border-bottom: 6px solid var(--orange);
            text-align: center;
        }

        .profile-icon {
            width: 100px;
            height: 100px;
            margin: auto;
            border-radius: 50%;
            background: var(--orange);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 45px;
            font-weight: 800;
            border: 5px solid white;
        }

        .profile-name {
            font-size: 28px;
            font-weight: 800;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        .profile-role {
            color: #bbbbbb;
            margin-bottom: 0;
        }

        .profile-body {
            padding: 35px;
        }

        .info-box {
            background: #f8f8f8;
            border-left: 5px solid var(--orange);
            border-radius: 10px;
            padding: 18px;
            margin-bottom: 15px;
        }

        .info-label {
            color: #777;
            font-size: 13px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .info-value {
            color: var(--black);
            font-size: 17px;
            font-weight: 700;
            margin-top: 4px;
        }

        .btn-orange {
            background: var(--orange);
            color: white;
            border: none;
            font-weight: 700;
            border-radius: 10px;
            padding: 11px 20px;
        }

        .btn-orange:hover {
            background: var(--orange-light);
            color: white;
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
            background: #333;
            color: white;
        }

        .footer-text {
            color: #999;
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="container py-5 profile-container">

    <div class="profile-card">

        <!-- PROFILE HEADER -->
        <div class="profile-header">

            <div class="profile-icon">
                {{ strtoupper(substr($student->name, 0, 1)) }}
            </div>

            <h1 class="profile-name">
                {{ $student->name }}
            </h1>

            <p class="profile-role">
                Student Profile
            </p>

        </div>


        <!-- PROFILE INFORMATION -->
        <div class="profile-body">

            <h4 class="fw-bold mb-4">
                Profile Information
            </h4>

            <div class="row">

                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Student ID
                        </div>

                        <div class="info-value">
                            {{ $student->student_id }}
                        </div>

                    </div>

                </div>


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


                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Course
                        </div>

                        <div class="info-value">
                            {{ $student->course }}
                        </div>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Year Level
                        </div>

                        <div class="info-value">
                            {{ $student->year_level }}
                        </div>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Registered Date
                        </div>

                        <div class="info-value">
                            {{ $student->created_at->format('F d, Y') }}
                        </div>

                    </div>

                </div>

            </div>


            <!-- BUTTONS -->
            <div class="d-flex justify-content-between mt-4">

                <a href="{{ route('students.index') }}"
                   class="btn btn-dark-custom">

                    ← Back to Students

                </a>

                <a href="{{ route('students.edit', $student) }}"
                   class="btn btn-orange">

                    Edit Profile

                </a>

            </div>

        </div>

    </div>


    <div class="footer-text">
        Student Registration System &copy; {{ date('Y') }}
    </div>

</div>

</body>

</html>
```
