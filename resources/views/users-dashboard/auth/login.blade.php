<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>promina task</title>
        <link rel="stylesheet" href="{{ asset('user-dashboard') }}/assets/css/auth.css">
        <link rel="stylesheet" href="{{ asset('user-dashboard') }}/assets/css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('user-dashboard') }}/assets/css/fontawesome/css/all.min.css">
    </head>
    
    <body>

        <div class="container">

            <div class="form-register col-md-6 col-sm-8">

                <form method='post' action="{{ route('user.do_login') }}">
                    @csrf
                    @method('POST')

                   <h1 class='header'>LOGIN</h1>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="#email" class='form-label'>Email</label>
                            <input type="email" name='email' id="email" class='form-control' placeholder="Type Email Here." value="{{ old('email') }}">
                            @error('email')
                                <span class='invalide-feedback'>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="#password" class='form-label'>Password</label>
                            <input type="password" name='password' id="password" class='form-control' placeholder="Type password Here." value="{{ old('password') }}">
                            @error('password')
                                <span class='invalide-feedback'>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-action text-center">
                        <button type="submit" class='btn btn-primary'>Login</button>
                        <div class="login">
                            <span>Don't You Have an Account ? </span>
                            <a href="{{ route('user.register') }}">Register</a>
                        </div>
                    </div>

                </form>

            </div>

        </div>

        <script src="{{ asset('user-dashboard') }}/assets/js/jquery-3.7.1.min.js"></script>
        <script src="{{ asset('user-dashboard') }}/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
</html>