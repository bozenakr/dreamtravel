@extends('layouts.front')

@section('content')
@section('title', 'Hotel details')

<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-3">
            @include('front.common.cats')
        </div> --}}
        <div class="col-9">
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="list-table one">
                                <div class="top">
                                    <h3>
                                        {{$hotel->title}}
                                    </h3>
                                    {{-- <a href="{{route('show-hotel', $hotel)}}"> --}}
                                    <div class="smallimg">
                                        @if($hotel->photo)
                                        <img src="{{asset($hotel->photo)}}">
                                        @else
                                        <img src="{{asset('no-img.png')}}">
                                        @endif
                                    </div>
                                    </a>
                                </div>
                                <div class="bottom">
                                    <div>
                                        <div class="type"> {{$hotel->hotelCountry->title}}</div>
                                        <div class="size"> {{$hotel->days}} nights</div>
                                    </div>
                                    <div class="buy">
                                        <div class="price"> {{$hotel->price}} EUR</div>
                                        <form action="{{route('add-to-cart')}}" method="post">
                                            <button type="submit" class="btn btn-outline-primary">Add to cart</button>
                                            <input type="number" min="1" name="count" value="1">
                                            <input type="hidden" name="product" value="{{$hotel->id}}">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
