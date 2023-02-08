@extends('components.main')
@section('content')

    <section class="section-product">
        <div class="container-product">
            <div class="row">
                @foreach ($items as $item)


                    <div class="col-md-6 col-lg-8 col-xl-3 mb-5">
                        <div class="product-card" style="width: 18rem;">
                            <img class="card-img-top" src="{{$item->picture}}" alt="Card image cap">
                            <div class="card-body">
                                <div class="product-title">
                                    <h4>{{$item->name}}</h4>
                                </div>
                                <h5 class="product-price">IDR. {{$item->price}}</h5>

                                <div class="detail-button">
                                 <a href="{{route('product-detail',['id'=>$item->id])}}">Detail Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
            <div class="pagination">
                {{$items->links()}}
            </div>
        </div>



    </section>
@endsection
