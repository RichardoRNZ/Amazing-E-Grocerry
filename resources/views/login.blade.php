@extends('components.main')
@section('content')

    <body id="login">
        <div class="container-login" id="container">
            <div class="form-container register-container">
                <form action="{{route('register')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <h1>{{__('message.register')}}</h1>
                    <div class="select-group-form">
                        <input type="text" name="first_name" id="first_name" placeholder="First Name">
                        <input type="text" name="last_name" id="" placeholder="Last Name">
                    </div>

                    <input type="email" placeholder="Email" name="email">
                    <div class="select-group-form">
                        <select name="gender" id="" class="gender">
                            <option value="" selected disabled>Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                        <select name="role" id="">
                            <option value="" selected disabled>Role</option>
                            <option value="2">User</option>
                            <option value="1">Admin</option>

                        </select>
                    </div>
                    <input type="password" name="password" id="" placeholder="Password">
                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                    <input type="file" name="image" id="">
                    <button>{{__('message.register')}}</button>
                </form>
            </div>
            <div class="form-container login-container" id="login-container">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <h1>{{__('message.login')}}</h1>
                    <input type="email" placeholder="Email" name="email">
                    <input type="password" name="password" placeholder="Password">
                    <br>
                    <button>{{__('message.login')}}</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>{{__('message.welcome')}}</h1>
                        <p>{{__('message.please')}}</p>
                        <button class="ghost" id="signIn" onclick="RemoveRightPanel()">{{__('message.login')}}</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>{{__('message.hello')}}</h1>
                        <p>{{__('message.come')}}</p>
                        <button class="ghost" id="signUp" onclick="AddRightPanel()">{{__('message.register')}}</button>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection
