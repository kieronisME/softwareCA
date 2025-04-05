<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h2>Payment Successful!</h2>
            </div>
            <div class="card-body">
                <p>Thank you for your purchase. Your payment was successful.</p>
                <p>A confirmation email has been sent to your registered email address.</p>
                <a href="{{ route('topDogRoutes.create.Admin') }}" class="btn btn-primary">Return to Home</a>
            </div>
        </div>
    </div>
</body>
</html>