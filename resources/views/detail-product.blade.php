@extends('components.main')
@section('content')

    <section id="product-detail">
        <div class="container">
            <div class="col-lg-8 border p-3 detail-section bg-white">
                @foreach ($items as $item)



                    <div class="row m-0">

                        <div class="col-lg-4 product-image">
                            <img src="{{$item->picture}}" class="border p-2">
                        </div>
                        <div class="col-lg-8">
                            <div class="product-detail border p-3 m-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="m-0 p-0">{{$item->name}}</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="m-0 p-0 price-product">IDR. {{$item->price}}</p>
                                    </div>
                                    <div class="col-lg-12 pt-2">
                                        <h5>Description :</h5>
                                        <span>{{$item->description}}</span>
                                        <hr class="m-0 pt-2 mt-2">
                                        <form action="{{route('add-to-cart')}}" method="GET">
                                    </div>
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                        <button><i class="fa-solid fa-cart-shopping"></i> Add to cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
            </div>
        </div>
    </section>
@endsection
