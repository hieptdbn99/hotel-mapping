<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/hotel_mapping.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="sticky-col first-col"></th>
                            @foreach ($hotels as $key => $item)
                                <th>Provider {{ $key+1 }}</th>   
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
            
                        <tr>
                            <th class="sticky-col first-col">Hotel</th>
                            @foreach ($hotels as $key => $item)
                                <td>{{ $item->name }}</td>   
                            @endforeach
                        </tr>
                        <tr>
                            <th class="sticky-col first-col">Description</th>
                            @foreach ($hotels as $key => $item)
                                <td>{{ $item->description }}</td>   
                            @endforeach
                        </tr>
                        <tr>
                            <th class="sticky-col first-col">Address</th>
                            @foreach ($hotels as $key => $item)
                                <td>{{ $item->address }}</td>   
                            @endforeach
                        </tr>
                        <tr>
                            <th class="sticky-col first-col">Email address</th>
                            @foreach ($hotels as $key => $item)
                                <td>{{ $item->email }}</td>   
                            @endforeach
                        </tr>
                        <tr>
                            <th class="sticky-col first-col">Phone number</th>
                            @foreach ($hotels as $key => $item)
                                <td>{{ $item->phone }}</td>   
                            @endforeach
                        </tr>
                        <tr>
                            <th class="sticky-col first-col">Ranking</th>
                            @foreach ($hotels as $key => $item)
                                <td>{{ $item->ranking }}</td>   
                            @endforeach
                        </tr>
            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
