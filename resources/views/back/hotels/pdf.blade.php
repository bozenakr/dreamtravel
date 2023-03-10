<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dreamTravel - {{$hotel->title}}</title>
    <style>
        @font-face {
            font-family: 'Roboto';
            src: url("C:\xampp\htdocs\dreamTravel\storage\fonts\Roboto-Bold.ttf") format("truetype");
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: 'Roboto';
            src: url("C:\xampp\htdocs\dreamTravel\storage\fonts\Roboto-Regular.ttf") format("truetype");
            font-weight: 400;
            font-style: normal;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        .mb-3 {
            margin: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .img img {
            height: 400px;
            width: auto;
        }

        .qr {
            float: right;
            padding: 10px 100px 0 0;
        }

    </style>
</head>
<body>
    <h1>dreamTravel offer - {{$hotel->hotelCountry?->title}}</h1>

    {{-- QR CODE --}}
    <div class="col-9">
        <div class="mb-3 qr">
            <img src="data:image/png;base64, {{ base64_encode(QrCode::phoneNumber('+37000000000')) }} ">
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Hotel</label>
            {{$hotel->title}}
        </div>

        {{-- DATES --}}
        <div class="mb-3">
            <label class="form-label">Dates</label>
            {{$hotel->start}} - {{$hotel->end}}
        </div>
        <div class="mb-3">
            <label class="form-label">Nights</label>
            {{$hotel->nights}} nights
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            {{$hotel->price}} EUR
        </div>
        <div class="col-9">
            <div class="mb-3">
                <label class="form-label">Hotel description</label>
                <div>{{$hotel->desc}}</div>
            </div>
        </div>
        @if($hotel->photo)
        <div class="col-4">
            <div class="mb-3 img">
                <img src="{{asset($hotel->photo)}}">
            </div>
        </div>
        @endif




</body>
</html>
