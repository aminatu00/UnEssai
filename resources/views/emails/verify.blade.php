<!-- resources/views/auth/verify.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Vérification du compte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Vérification du compte</h2>
        <form action="{{ route('verify') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="verification_code">Code de vérification :</label>
                <input type="text" name="verification_code" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Vérifier</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
