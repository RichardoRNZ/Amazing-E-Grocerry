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
          <h1 class="mb-3">{{__('message.success')}}</h1>
          <h3 class="mb-3">{{__('message.wlll')}}</h3>
          <a class="btn btn-outline-light btn-lg" href="{{route('home')}}" role="button"
          >{{__('message.home')}}</a
          >
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
@endsection
