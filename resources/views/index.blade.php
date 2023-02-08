@extends('components.main')
@section('content')
<div
    class="p-5 text-center bg-image"
    style="
      background-image: url('https://cdn.britannica.com/17/196817-050-6A15DAC3/vegetables.jpg');
      height: 600px;
    "
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">{{__('message.find')}}</h1>
          <h1 class="mb-3">{{__('message.here')}}</h1>
          <a class="btn btn-outline-light btn-lg" href="{{route('login-page')}}" role="button"
          >{{__('message.login')}}</a
          >
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
@endsection
