@extends('website.dashboard')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{ route('cutomer.auth') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Email Address" />
                        <input type="password" name="password" placeholder="PassWord" />
                        <span>
                            <input type="checkbox" name="remember_me" class="checkbox">
                            Keep me signed in
                        </span>


                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-3">
                <h2 class="or">In</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h1><span>E</span>-SHOPPER</h1>


                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->


@endsection
