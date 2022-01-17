@extends('website.dashboard')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="#">
                            <input type="text" placeholder="Name"/>
                            <input type="email" placeholder="Email Address"/>
                            <input type="password" placeholder="Password"/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                    </form>
                </div><!--/login form-->
            </div>


            <div class="col-sm-1">
                <h2 class="or">IN</h2>
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
