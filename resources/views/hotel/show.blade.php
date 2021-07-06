<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Khách sạn</th>
                            <th scope="col">Số khách sạn trùng</th>
                            <th scope="col">Mapping</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotel_arr as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $hotel_count[$key] }}</td>
                                <td><a href="{{ route('map_hotel',$item->parent_id) }}"><button type="button" class="btn btn-danger">Map</button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>

</html>
