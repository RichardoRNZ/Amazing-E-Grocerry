@extends('components.main')
@section('content')
    <section class="vh-100" id="cart">
        @if (empty($cart) || count($cart) == 0)
            <div class="empty-cart">
                <h1>{{__('message.empty')}}</h1>
            </div>
        @else
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <p><span class="h2">Shopping Cart </span><span class="h4">({{count($cart)}} item in your cart)</span></p>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart as $c => $item)
                            <div class="card mb-4">
                                <div class="card-body p-4">

                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="{{ $item['image'] }}" class="img-fluid"
                                                alt="Generic placeholder image">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="small text-muted mb-4 pb-2">Name</p>
                                                <p class="lead fw-normal mb-0">{{ $item['name'] }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-center">
                                            <div>
                                                <p class="small text-muted mb-4 pb-2">Price</p>
                                                <p class="lead fw-normal mb-0">IDR. {{ $item['price'] }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="small text-muted mb-4 pb-2">Total</p>
                                                <p class="lead fw-normal mb-0">IDR. {{ $item['price'] }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <p class="small text-muted mb-4 pb2">Action</p>
                                                <a href="{{ route('delete-item', ['id' => $c]) }}"
                                                    class="lead fw-normal mb-0"><i class="fa-solid fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @php

                                    $total += $item['price'];

                                @endphp
                            </div>
                        @endforeach


                        <div class="card mb-5">
                            <div class="card-body p-4">

                                <div class="float-end">
                                    <p class="mb-0 me-5 d-flex align-items-center">
                                        <span class="small text-muted me-2">Order total:</span> <span
                                            class="lead fw-normal">IDR. {{ $total }}</span>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex justify-content-end mb-8">
                            <a href="{{ route('home') }}" type="button" class="btn btn-light btn-lg me-2">Continue
                                shopping</a>
                            <form action="{{ route('add-order') }}" method="POST">
                                @csrf
                                <input type="number" name="price" value="{{ $total }}" hidden>
                                <button class="btn btn-lg text-white" id="checkout">Check out</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection
