<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bulletin Board</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="css/app.css">
</head> 
<body>
  <div class="container">

    @if($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    @endif
    @if($message = Session::get('error'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

  <form action="" method="POST" class="form-width login-center">
      <h2 class="mt-5">Login Form</h2>
      @csrf
      <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
        @error('email')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <button class="btn btn-color mt-3" type="submit">Login</button>
    </form>
  </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
