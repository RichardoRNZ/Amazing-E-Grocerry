@extends('components.main')
@section('content')
<div class="container rounded bg-white mt-5 mb-5" id="profile">


    <div class="row" id="profile">
        <div class="col-md-5 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" height="150px" src="{{asset('/storage/images/' .Auth::user()->display_picture_link)}}"><span class="font-weight-bold">{{Auth::user()->first_name. " " .Auth::user()->last_name}}</span><span class="text-black-50">{{Auth::user()->email}}</span><span> </span></div>
        </div>
        <div class="col-md-7 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">{{__('message.profile')}}</h4>
                </div>
                <form action="{{route('update-profile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="first name" value="{{Auth::user()->first_name}}" name="first_name"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="{{Auth::user()->last_name}}" placeholder="last name" name="last_name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email Address</label><input type="email" name="email" class="form-control" placeholder="email" value="{{Auth::user()->email}}"></div>
                    <div class="col-md-12 radio-gender">
                        <label class="labels">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="1"/>
                            <label class="form-check-label" for="flexRadioDefault1"> Male </label>
                          </div>

                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="2"/>
                            <label class="form-check-label" for="flexRadioDefault1"> Female </label>
                          </div>
                    </div>
                    <div class="col-md-12"><label class="labels">Role</label><input type="text" class="form-control" value="{{Auth::user()->getRole->name}}" disabled></div>
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" name="password" placeholder="password" value=""></div>
                    <div class="col-md-12"><label class="labels">Confirm Password</label><input type="password" name="confirm_password" class="form-control" placeholder="confirm password" value=""></div>

                    <div class="col-md-12"><label class="labels">Profile Picture</label><input type="file" class="form-control" placeholder="enter email id" name="image" value=""></div>

                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" >Save Profile</button></div>
            </div>
        </form>
        </div>
    </div>
</div>
</div>

</div>

@endsection
