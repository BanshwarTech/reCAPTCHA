<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Contact Us</h2>
        <form action="{{ route('contact') }}" method="POST" novalidate>
            @csrf

            <!-- Full Name -->
            <div class="mb-3 position-relative">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name') }}"
                    @error('name') 
                           data-bs-toggle="tooltip"
                           data-bs-placement="right"
                           title="{{ $message }}"
                       @enderror>
            </div>

            <!-- Email -->
            <div class="mb-3 position-relative">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}"
                    @error('email') 
                           data-bs-toggle="tooltip"
                           data-bs-placement="right"
                           title="{{ $message }}"
                       @enderror>
            </div>

            <!-- Subject -->
            <div class="mb-3 position-relative">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject"
                    name="subject" value="{{ old('subject') }}"
                    @error('subject') 
                           data-bs-toggle="tooltip"
                           data-bs-placement="right"
                           title="{{ $message }}"
                       @enderror>
            </div>

            <!-- Message -->
            <div class="mb-3 position-relative">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4"
                    @error('message') 
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title="{{ $message }}"
                    @enderror>{{ old('message') }}</textarea>
            </div>

            <!-- reCAPTCHA -->
            <div class="mb-3">
                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                @error('g-recaptcha-response')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Success / Error Alerts -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>

    <!-- Bootstrap JS and Tooltip Initialization -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

</body>

</html>
