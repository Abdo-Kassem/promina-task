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

                <h1 class='header'>REGISTER</h1>

                <form method='post' action="{{ route('user.do_register') }}">

                    @csrf
                    @method('post')
                    
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="#name" class='form-label'>Name</label>
                            <input type="text" name='name' id="name" class='form-control' placeholder="Type Name Here." value="{{ old('name') }}">
                            @error('name')
                                <span class='invalide-feedback'>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

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
                            <label for="#phone" class='form-label'>Phone</label>
                            <input type="tel" name='phone' id="phone" class='form-control' placeholder="Type Phone Here." value="{{ old('phone') }}">
                            @error('phone')
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

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="#password_confirmation" class='form-label'>Password Confirmation</label>
                            <input type="password" name='password_confirmation' id="password_confirmation" class='form-control' placeholder="Re-Type password Here." value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <span class='invalide-feedback'>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-action text-center">
                        <button type="submit" class='btn btn-primary'>Register</button>
                        <div class="login">
                            <span>Do You Have an Account ? </span>
                            <a href="{{ route('user.login') }}">Login</a>
                        </div>
                    </div>

                </form>

            </div>

        </div>

        <script src="{{ asset('user-dashboard') }}/assets/js/jquery-3.7.1.min.js"></script>
        <script src="{{ asset('user-dashboard') }}/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
</html>