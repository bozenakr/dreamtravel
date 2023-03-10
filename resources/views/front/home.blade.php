@extends('layouts.front')

@section('content')
@section('title', 'Hotels')

<div class="container">
    <form action="{{route('start')}}" method="get">

        <div class="row justify-content-center" style="margin-bottom:20px">

            {{-- SEARCH --}}
            <div class="col-2">
                <div class="mb-3">
                    <label class="form-label">Search</label>
                    <input type="text" class="form-control" name="s" value="{{$s}}">
                </div>
            </div>
            <div class="col-2">
                <div class="head-buttons">
                    <button type="submit" class="btn btn-outline-success" style="margin-top: 30px">Search</button>
                </div>
            </div>

            {{-- SORT BY --}}
            <div class="col-2">
                <div class="mb-3">
                    <label class="form-label">Sort by</label>
                    <select class="form-select" name="sort">
                        <option>default</option>
                        @foreach($sortSelect as $value => $name)
                        <option value="{{$value}}" @if($sortShow==$value) selected @endif>{{$name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            {{-- PER PAGE PAGINATOR --}}
            {{-- Arba cia per page arba paginate --}}
            <div class="col-1">
                <div class="mb-3">
                    <label class="form-label">Per page</label>
                    <select class="form-select" name="per_page">
                        @foreach($perPageSelect as $value)
                        <option value="{{$value}}" @if($perPageShow==$value) selected @endif>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- SELECT COUNTRY --}}
            {{-- Arba cia select country arba categories blade --}}
            {{-- <div class="col-2">
                        <div class="mb-3">
                            <label class="form-label">Select Country</label>
                            <select class="form-select" name="country_id">
                                <option value="all">All</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}" @if($country->id == $countryShow) selected @endif>{{$country->title}}</option>
            @endforeach
            </select>
        </div>
</div> --}}

{{-- BUTTONS SHOW & RESET --}}
<div class="col-1">
    <div class="head-buttons d-flex">
        <button type="submit" class="btn btn-outline-success" style="margin-right: 5px; margin-top: 30px">Show</button>
        <a href="{{route('start')}}" class="btn btn-outline-success" style="margin-top: 30px">Reset</a>
    </div>
</div>
</div>
</form>
</div>


{{-- include categories --}}
<div class="container d-flex">
    <div class="col-3">
        @include('front.common.categories')
    </div>
    <div class="col-9">
        <div class="card-body">
            <div class="row justify-content-center">
                @forelse($hotels as $hotel)
                <div class="col-4 zoom">
                    <div class="list-table">
                        <div class="top">
                            <h3 class="text-center">
                                {{$hotel->title}}
                            </h3>
                            {{-- link on photo --}}
                            <a href="{{route('show-hotel', $hotel)}}">
                                <div class="smallimg">
                                    @if($hotel->photo)
                                    <img src="{{asset($hotel->photo)}}">
                                    @else
                                    <img src="{{asset('no-img-2.png')}}">
                                    @endif
                                </div>
                            </a>
                        </div>
                        <div class="bottom">
                            <div>
                                <div class="type"> {{$hotel->hotelCountry->title}}</div>
                                <div class="size"> {{$hotel->start}} - {{$hotel->end}}</div>
                                <div class="size"> {{$hotel->nights}} nights</div>
                            </div>
                            <div class="buy">
                                <div class="price"> {{$hotel->price}} EUR</div>
                                <form class="buy" action="{{route('add-to-cart')}}" method="post">
                                    <input class="margin-right" type="number" min="1" name="count" value="1">
                                    <button type="submit" class="btn">Add</button>
                                    <input type="hidden" name="product" value="{{$hotel->id}}">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="list-group-item">No hotels yet</div>
                @endforelse
            </div>
        </div>

        {{-- PER PAGE PAGINATOR LINKS --}}
        @if($perPageShow != 'all')
        <div class="m-2">{{ $hotels->links()}}
        </div>
        @endif

    </div>
</div>

</div>
</div>
@endsection
