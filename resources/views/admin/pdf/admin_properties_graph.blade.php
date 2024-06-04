<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Properties</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #3270fc;
            color: white;
        }
    </style>
</head>

<body>
<!-- <img src="{{asset('/adminhomey/images/logo.png')}}" style="margin: auto; height: 150px;width: 150px;"> -->
<!-- <img src="{{asset('adminhomey/images/logo.png')}}" alt=""> -->
<center><h1 class="text-center">Properties</h1></center>

<h2>Total Properties: {{$total_property_count}}</h2>
@if ($total_property_count_jan->count() > 0) 
<br>
<h3>Properties Added In January</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_property_count_jan as $key => $row)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$row->property_id)}}">{{$row->name}}</a></td>
                    <td class="text-center">
                        @if($row->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$row->price}}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($row->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($row->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($row->created_at)->format('Y') }}</td>
                    
                    @if($row->agent_id == NULL)
                    <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($row->user_id == 0 && $row->agent_id == 0)
                    <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($row->user_id == NULL)
                    <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($row->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $row->user_id }}</span></td>
                    @elseif($row->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $row->agent_id }}</span></td>
                    @elseif($row->user_id == 0 && $row->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif

                    @if($row->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Added In February -->
@if ($total_property_count_feb->count() > 0) 
<br>
    <h3>Properties Added In February</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_property_count_feb as $key => $feb)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$feb->property_id)}}">{{$feb->name}}</a></td>
                    <td class="text-center">
                        @if($feb->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{$feb->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($feb->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($feb->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($feb->created_at)->format('Y') }}</td>

                    @if($feb->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($feb->user_id == 0 && $feb->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($feb->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($feb->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $feb->user_id }}</span></td>
                    @elseif($feb->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $feb->agent_id }}</span></td>
                    @elseif($feb->user_id == 0 && $feb->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif

                    @if($feb->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Added In March -->
@if ($total_property_count_march->count() > 0) 
<br>
    <h3>Properties Added In March</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_property_count_march as $key => $march)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$march->property_id)}}">{{$march->name}}</a></td>
                    <td class="text-center">
                        @if($march->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{$march->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($march->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($march->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($march->created_at)->format('Y') }}</td>
                    
                    @if($march->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($march->user_id == 0 && $march->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($march->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($march->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $march->user_id }}</span></td>
                    @elseif($march->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $march->agent_id }}</span></td>
                    @elseif($march->user_id == 0 && $march->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($march->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Added In April -->
@if ($total_property_count_apr->count() > 0)
<br> 
    <h3>Properties Added In April </h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_property_count_apr as $key => $apr)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$apr->property_id)}}">{{$apr->name}}</a></td>
                    <td class="text-center">
                        @if($apr->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{$apr->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($apr->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($apr->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($apr->created_at)->format('Y') }}</td>
                                        
                    @if($apr->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($apr->user_id == 0 && $apr->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($apr->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($apr->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $apr->user_id }}</span></td>
                    @elseif($apr->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $apr->agent_id }}</span></td>
                    @elseif($apr->user_id == 0 && $apr->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($apr->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Added In May -->
@if ($total_property_count_may->count() > 0) 
<br>
    <h3>Properties Added In May</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_property_count_may as $key => $may)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$may->property_id)}}">{{$may->name}}</a></td>
                    <td class="text-center">
                        @if($may->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{$may->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($may->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($may->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($may->created_at)->format('Y') }}</td>
                                        
                    @if($may->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($may->user_id == 0 && $may->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($may->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($may->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $may->user_id }}</span></td>
                    @elseif($may->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $may->agent_id }}</span></td>
                    @elseif($may->user_id == 0 && $may->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($may->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Added In June -->
@if ($total_property_count_jun->count() > 0) 
<br>
    <h3>Properties Added In June</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>

            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_property_count_jun as $key => $jun)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$jun->property_id)}}">{{$jun->name}}</a></td>
                    <td class="text-center">
                        @if($jun->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{$jun->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($jun->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($jun->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($jun->created_at)->format('Y') }}</td>
                                        
                    @if($jun->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($jun->user_id == 0 && $jun->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($jun->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($jun->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $jun->user_id }}</span></td>
                    @elseif($jun->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $jun->agent_id }}</span></td>
                    @elseif($jun->user_id == 0 && $jun->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($jun->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Added In July -->
@if ($total_property_count_july->count() > 0) 
<br>
    <h3>Properties Added In July</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_property_count_july as $key => $july)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$july->property_id)}}">{{$july->name}}</a></td>
                    <td class="text-center">
                        @if($july->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{$july->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($july->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($july->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($july->created_at)->format('Y') }}</td>
                                        
                    @if($july->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($july->user_id == 0 && $july->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($july->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($july->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $july->user_id }}</span></td>
                    @elseif($july->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $july->agent_id }}</span></td>
                    @elseif($july->user_id == 0 && $july->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($july->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Added In August -->
@if ($total_property_count_aug->count() > 0) 
<br>
    <h3>Properties Added In August</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_property_count_aug as $key => $aug)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$aug->property_id)}}">{{$aug->name}}</a></td>  
                    <td class="text-center">
                        @if($aug->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{$aug->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($aug->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($aug->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($aug->created_at)->format('Y') }}</td>
                                        
                    @if($aug->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($aug->user_id == 0 && $aug->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($aug->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($aug->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $aug->user_id }}</span></td>
                    @elseif($aug->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $aug->agent_id }}</span></td>
                    @elseif($aug->user_id == 0 && $aug->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($aug->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Added In September -->
@if ($total_property_count_sept->count() > 0) 
<br>
    <h3>Properties Added In September</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_property_count_sept as $key => $sept)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$sept->property_id)}}">{{$sept->name}}</a></td>
                    <td class="text-center">
                        @if($sept->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{$sept->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($sept->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($sept->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($sept->created_at)->format('Y') }}</td>
                                        
                    @if($sept->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($sept->user_id == 0 && $sept->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($sept->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($sept->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $sept->user_id }}</span></td>
                    @elseif($sept->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $sept->agent_id }}</span></td>
                    @elseif($sept->user_id == 0 && $sept->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($sept->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Added In October -->
@if ($total_property_count_oct->count() > 0) 
<br>
    <h3>Properties Added In October</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_property_count_oct as $key => $oct)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$oct->property_id)}}">{{$oct->name}}</a></td>
                    <td class="text-center">
                        @if($oct->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{$oct->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($oct->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($oct->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($oct->created_at)->format('Y') }}</td>
                                        
                    @if($oct->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($oct->user_id == 0 && $oct->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($oct->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($oct->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $oct->user_id }}</span></td>
                    @elseif($oct->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $oct->agent_id }}</span></td>
                    @elseif($oct->user_id == 0 && $oct->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($oct->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Added In November -->
@if ($total_property_count_nov->count() > 0) 
<br>
    <h3>Properties Added In November</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_property_count_nov as $key => $nov)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$nov->property_id)}}">{{$nov->name}}</a></td>
                    <td class="text-center">
                        @if($nov->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{$nov->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($nov->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($nov->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($nov->created_at)->format('Y') }}</td>
                                        
                    @if($nov->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($nov->user_id == 0 && $nov->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($nov->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($nov->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $nov->user_id }}</span></td>
                    @elseif($nov->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $nov->agent_id }}</span></td>
                    @elseif($nov->user_id == 0 && $nov->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($nov->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Added In December -->
@if ($total_property_count_dec->count() > 0) 
<br>
    <h3>Properties Added In December</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_property_count_dec as $key => $dec)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$dec->property_id)}}">{{$dec->name}}</a></td>
                    <td class="text-center">
                        @if($dec->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{$dec->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($dec->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($dec->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($dec->created_at)->format('Y') }}</td>
                                        
                    @if($dec->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($dec->user_id == 0 && $dec->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($dec->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($dec->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $dec->user_id }}</span></td>
                    @elseif($dec->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $dec->agent_id }}</span></td>
                    @elseif($dec->user_id == 0 && $dec->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($dec->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif
<br><br>
<h2>Total Verified Properties: {{$verfied_property}}</h2>

<!-- Properties Verified In January -->
@if ($total_verified_property_count_jan->count() > 0) 
<br>
<h3>Properties Verified In January</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <!-- <th class="border-bottom-0">Property Status</th> -->
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_verified_property_count_jan as $key => $row)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$row->property_id)}}">{{$row->name}}</a></td>
                    <!-- <td class="text-center">
                        @if($row->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td> -->
                    <td class="text-center">{{$row->price}}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($row->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($row->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($row->created_at)->format('Y') }}</td>
                                        
                    @if($row->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($row->user_id == 0 && $row->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($row->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($row->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $row->user_id }}</span></td>
                    @elseif($row->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $row->agent_id }}</span></td>
                    @elseif($row->user_id == 0 && $row->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($row->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Verified In February -->
@if ($total_verified_property_count_feb->count() > 0) 
<br>
    <h3>Properties Verified In February</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <!-- <th class="border-bottom-0">Property Status</th> -->
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_verified_property_count_feb as $key => $feb)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$feb->property_id)}}">{{$feb->name}}</a></td>
                    <!-- <td class="text-center">
                        @if($feb->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td> -->
                    <td>{{$feb->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($feb->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($feb->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($feb->created_at)->format('Y') }}</td>
                                        
                    @if($feb->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($feb->user_id == 0 && $feb->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($feb->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($feb->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $feb->user_id }}</span></td>
                    @elseif($feb->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $feb->agent_id }}</span></td>
                    @elseif($feb->user_id == 0 && $feb->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($feb->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Verified In March -->
@if ($total_verified_property_count_march->count() > 0) 
<br>
    <h3>Properties Verified In March</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <!-- <th class="border-bottom-0">Property Status</th> -->
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_verified_property_count_march as $key => $march)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$march->property_id)}}">{{$march->name}}</a></td>
                    <!-- <td class="text-center">
                        @if($march->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td> -->
                    <td>{{$march->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($march->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($march->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($march->created_at)->format('Y') }}</td>
                                        
                    @if($march->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($march->user_id == 0 && $march->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($march->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($march->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $march->user_id }}</span></td>
                    @elseif($march->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $march->agent_id }}</span></td>
                    @elseif($march->user_id == 0 && $march->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($march->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Verified In April -->
@if ($total_verified_property_count_apr->count() > 0)
<br> 
    <h3>Properties Verified In April </h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <!-- <th class="border-bottom-0">Property Status</th> -->
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_verified_property_count_apr as $key => $apr)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$apr->property_id)}}">{{$apr->name}}</a></td>
                    <!-- <td class="text-center">
                        @if($apr->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td> -->
                    <td>{{$apr->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($apr->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($apr->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($apr->created_at)->format('Y') }}</td>
                                        
                    @if($apr->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($apr->user_id == 0 && $apr->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($apr->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($apr->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $apr->user_id }}</span></td>
                    @elseif($apr->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $apr->agent_id }}</span></td>
                    @elseif($apr->user_id == 0 && $apr->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($apr->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Verified In May -->
@if ($total_verified_property_count_may->count() > 0) 
<br>
    <h3>Properties Verified In May</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <!-- <th class="border-bottom-0">Property Status</th> -->
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_verified_property_count_may as $key => $may)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$may->property_id)}}">{{$may->name}}</a></td>
                    <!-- <td class="text-center">
                        @if($may->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td> -->
                    <td>{{$may->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($may->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($may->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($may->created_at)->format('Y') }}</td>
                                        
                    @if($may->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($may->user_id == 0 && $may->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($may->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($may->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $may->user_id }}</span></td>
                    @elseif($may->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $may->agent_id }}</span></td>
                    @elseif($may->user_id == 0 && $may->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($may->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Verified In June -->
@if ($total_verified_property_count_jun->count() > 0) 
<br>
    <h3>Properties Verified In June</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>

            <!-- <th class="border-bottom-0">Property Status</th> -->
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_verified_property_count_jun as $key => $jun)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$jun->property_id)}}">{{$jun->name}}</a></td>
                    <!-- <td class="text-center">
                        @if($jun->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td> -->
                    <td>{{$jun->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($jun->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($jun->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($jun->created_at)->format('Y') }}</td>
                                        
                    @if($jun->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($jun->user_id == 0 && $jun->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($jun->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($jun->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $jun->user_id }}</span></td>
                    @elseif($jun->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $jun->agent_id }}</span></td>
                    @elseif($jun->user_id == 0 && $jun->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($jun->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Verified In July -->
@if ($total_verified_property_count_july->count() > 0) 
<br>
    <h3>Properties Verified In July</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <!-- <th class="border-bottom-0">Property Status</th> -->
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_verified_property_count_july as $key => $july)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$july->property_id)}}">{{$july->name}}</a></td>
                    <!-- <td class="text-center">
                        @if($july->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td> -->
                    <td>{{$july->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($july->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($july->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($july->created_at)->format('Y') }}</td>
                                        
                    @if($july->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($july->user_id == 0 && $july->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($july->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($july->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $july->user_id }}</span></td>
                    @elseif($july->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $july->agent_id }}</span></td>
                    @elseif($july->user_id == 0 && $july->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($july->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Verified In August -->
@if ($total_verified_property_count_aug->count() > 0) 
<br>
    <h3>Properties Verified In August</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <!-- <th class="border-bottom-0">Property Status</th> -->
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_verified_property_count_aug as $key => $aug)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$aug->property_id)}}">{{$aug->name}}</a></td>  
                    <!-- <td class="text-center">
                        @if($aug->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td> -->
                    <td>{{$aug->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($aug->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($aug->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($aug->created_at)->format('Y') }}</td>
                                        
                    @if($aug->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($aug->user_id == 0 && $aug->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($aug->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($aug->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $aug->user_id }}</span></td>
                    @elseif($aug->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $aug->agent_id }}</span></td>
                    @elseif($aug->user_id == 0 && $aug->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($aug->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Verified In September -->
@if ($total_verified_property_count_sept->count() > 0) 
<br>
    <h3>Properties Verified In September</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <!-- <th class="border-bottom-0">Property Status</th> -->
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_verified_property_count_sept as $key => $sept)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$sept->property_id)}}">{{$sept->name}}</a></td>
                    <!-- <td class="text-center">
                        @if($sept->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td> -->
                    <td>{{$sept->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($sept->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($sept->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($sept->created_at)->format('Y') }}</td>
                                        
                    @if($sept->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($sept->user_id == 0 && $sept->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($sept->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($sept->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $sept->user_id }}</span></td>
                    @elseif($sept->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $sept->agent_id }}</span></td>
                    @elseif($sept->user_id == 0 && $sept->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($sept->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Verified In October -->
@if ($total_verified_property_count_oct->count() > 0) 
<br>
    <h3>Properties Verified In October</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <!-- <th class="border-bottom-0">Property Status</th> -->
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_verified_property_count_oct as $key => $oct)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$oct->property_id)}}">{{$oct->name}}</a></td>
                    <!-- <td class="text-center">
                        @if($oct->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td> -->
                    <td>{{$oct->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($oct->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($oct->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($oct->created_at)->format('Y') }}</td>
                                        
                    @if($oct->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($oct->user_id == 0 && $oct->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($oct->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($oct->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $oct->user_id }}</span></td>
                    @elseif($oct->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $oct->agent_id }}</span></td>
                    @elseif($oct->user_id == 0 && $oct->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($oct->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Verified In November -->
@if ($total_verified_property_count_nov->count() > 0) 
<br>
    <h3>Properties Verified In November</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <!-- <th class="border-bottom-0">Property Status</th> -->
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_verified_property_count_nov as $key => $nov)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$nov->property_id)}}">{{$nov->name}}</a></td>
                    <!-- <td class="text-center">
                        @if($nov->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td> -->
                    <td>{{$nov->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($nov->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($nov->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($nov->created_at)->format('Y') }}</td>
                    
                    @if($nov->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($nov->user_id == 0 && $nov->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($nov->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($nov->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $nov->user_id }}</span></td>
                    @elseif($nov->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $nov->agent_id }}</span></td>
                    @elseif($nov->user_id == 0 && $nov->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif

                    @if($nov->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Verified In December -->
@if ($total_verified_property_count_dec->count() > 0) 
<br>
    <h3>Properties Verified In December</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <!-- <th class="border-bottom-0">Property Status</th> -->
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Date</th>
            <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th>
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_verified_property_count_dec as $key => $dec)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.properties_details',$dec->property_id)}}">{{$dec->name}}</a></td>
                    <!-- <td class="text-center">
                        @if($dec->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td> -->
                    <td>{{$dec->price}}</td>
                    <td>{{ \Carbon\Carbon::parse($dec->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($dec->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($dec->created_at)->format('Y') }}</td>
                                        
                    @if($dec->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($dec->user_id == 0 && $dec->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($dec->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($dec->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $dec->user_id }}</span></td>
                    @elseif($dec->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $dec->agent_id }}</span></td>
                    @elseif($dec->user_id == 0 && $dec->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif
                    
                    @if($dec->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif
<br><br>
<h2>Total Bookmarked Properties: {{$bookmarked_property}}</h2>
@if ($total_bookmarked_property_count_jan->count() > 0) 
<br>
<h3>Properties Bookmarked In January</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Bookmarked By</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <!-- <th class="border-bottom-0">Date</th> -->
            <!-- <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th> -->
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_bookmarked_property_count_jan as $key => $row)
            @php
            $book_jan = App\Models\Homeyproperties::where(['property_id' => $row->property_id])->first();
            @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-success">{{$row->user_id}}</span></td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$row->property_id)}}">{{$book_jan->name}}</a></td>
                    <td class="text-center">
                        @if($book_jan->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$book_jan->price}}</td>
                    <!-- <td class="text-center">{{ \Carbon\Carbon::parse($book_jan->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($book_jan->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($book_jan->created_at)->format('Y') }}</td> -->
                    
                    <!-- @if($book_jan->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($book_jan->user_id == 0 && $book_jan->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($book_jan->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($book_jan->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_jan->user_id }}</span></td>
                    @elseif($book_jan->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_jan->agent_id }}</span></td>
                    @elseif($book_jan->user_id == 0 && $book_jan->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif -->

                    @if($book_jan->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Bookmarked In February -->
@if ($total_bookmarked_property_count_feb->count() > 0) 
<br>
    <h3>Properties Bookmarked In February</h3>
    <table id="customers">
        <thead>
        <tr>
        <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Bookmarked By</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <!-- <th class="border-bottom-0">Date</th> -->
            <!-- <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th> -->
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_bookmarked_property_count_feb as $key => $feb)
            @php
            $book_feb = App\Models\Homeyproperties::where(['property_id' => $feb->property_id])->first();
            @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-success">{{$feb->user_id}}</span></td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$feb->property_id)}}">{{$book_feb->name}}</a></td>
                    <td class="text-center">
                        @if($book_feb->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$book_feb->price}}</td>
                    <!-- <td class="text-center">{{ \Carbon\Carbon::parse($book_feb->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($book_feb->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($book_feb->created_at)->format('Y') }}</td> -->
                    
                    <!-- @if($book_feb->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($book_feb->user_id == 0 && $book_feb->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($book_feb->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($book_feb->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_feb->user_id }}</span></td>
                    @elseif($book_feb->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_feb->agent_id }}</span></td>
                    @elseif($book_feb->user_id == 0 && $book_feb->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif -->

                    @if($book_feb->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Bookmarked In March -->
@if ($total_bookmarked_property_count_march->count() > 0) 
<br>
    <h3>Properties Bookmarked In March</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Bookmarked By</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <!-- <th class="border-bottom-0">Date</th> -->
            <!-- <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th> -->
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_bookmarked_property_count_march as $key => $march)
            @php
            $book_march = App\Models\Homeyproperties::where(['property_id' => $march->property_id])->first();
            @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-success">{{$march->user_id}}</span></td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$march->property_id)}}">{{$book_march->name}}</a></td>
                    <td class="text-center">
                        @if($book_march->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$book_march->price}}</td>
                    <!-- <td class="text-center">{{ \Carbon\Carbon::parse($book_march->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($book_march->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($book_march->created_at)->format('Y') }}</td> -->
                    
                    <!-- @if($book_march->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($book_march->user_id == 0 && $book_march->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($book_march->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($book_march->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_march->user_id }}</span></td>
                    @elseif($book_march->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_march->agent_id }}</span></td>
                    @elseif($book_march->user_id == 0 && $book_march->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif -->

                    @if($book_march->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Bookmarked In April -->
@if ($total_bookmarked_property_count_apr->count() > 0)
<br> 
    <h3>Properties Bookmarked In April </h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Bookmarked By</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <!-- <th class="border-bottom-0">Date</th> -->
            <!-- <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th> -->
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_bookmarked_property_count_apr as $key => $apr)
            @php
            $book_apr = App\Models\Homeyproperties::where(['property_id' => $apr->property_id])->first();
            @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-success">{{$apr->user_id}}</span></td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$apr->property_id)}}">{{$book_apr->name}}</a></td>
                    <td class="text-center">
                        @if($book_apr->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$book_apr->price}}</td>
                    <!-- <td class="text-center">{{ \Carbon\Carbon::parse($book_apr->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($book_apr->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($book_apr->created_at)->format('Y') }}</td> -->
                    
                    <!-- @if($book_apr->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($book_apr->user_id == 0 && $book_apr->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($book_apr->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($book_apr->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_apr->user_id }}</span></td>
                    @elseif($book_apr->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_apr->agent_id }}</span></td>
                    @elseif($book_apr->user_id == 0 && $book_apr->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif -->

                    @if($book_apr->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Bookmarked In May -->
@if ($total_bookmarked_property_count_may->count() > 0) 
<br>
    <h3>Properties Bookmarked In May</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Bookmarked By</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <!-- <th class="border-bottom-0">Date</th> -->
            <!-- <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th> -->
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_bookmarked_property_count_may as $key => $may)
            @php
            $book_may = App\Models\Homeyproperties::where(['property_id' => $may->property_id])->first();
            @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-success">{{$may->user_id}}</span></td>
                    <!-- <td class="text-center"><a href="{{ route('admin.properties_details',$may->property_id)}}">{{$book_may->name}}</a></td> -->
                    <td class="text-center">
                        @if($book_may->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$book_may->price}}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($book_may->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($book_may->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($book_may->created_at)->format('Y') }}</td>
                    
                    <!-- @if($book_may->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($book_may->user_id == 0 && $book_may->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($book_may->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($book_may->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_may->user_id }}</span></td>
                    @elseif($book_may->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_may->agent_id }}</span></td>
                    @elseif($book_may->user_id == 0 && $book_may->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif -->

                    @if($book_may->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Bookmarked In June -->
@if ($total_bookmarked_property_count_jun->count() > 0) 
<br>
    <h3>Properties Bookmarked In June</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Bookmarked By</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <!-- <th class="border-bottom-0">Date</th> -->
            <!-- <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th> -->
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_bookmarked_property_count_jun as $key => $jun)
            @php
            $book_jun = App\Models\Homeyproperties::where(['property_id' => $jun->property_id])->first();
            @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-success">{{$jun->user_id}}</span></td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$jun->property_id)}}">{{$book_jun->name}}</a></td>
                    <td class="text-center">
                        @if($book_jun->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$book_jun->price}}</td>
                    <!-- <td class="text-center">{{ \Carbon\Carbon::parse($book_jun->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($book_jun->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($book_jun->created_at)->format('Y') }}</td> -->
                    
                    <!-- @if($book_jun->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($book_jun->user_id == 0 && $book_jun->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($book_jun->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($book_jun->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_jun->user_id }}</span></td>
                    @elseif($book_jun->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_jun->agent_id }}</span></td>
                    @elseif($book_jun->user_id == 0 && $book_jun->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif -->

                    @if($book_jun->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Bookmarked In July -->
@if ($total_bookmarked_property_count_july->count() > 0) 
<br>
    <h3>Properties Bookmarked In July</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Bookmarked By</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <!-- <th class="border-bottom-0">Date</th> -->
            <!-- <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th> -->
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_bookmarked_property_count_july as $key => $july)
            @php
            $book_july = App\Models\Homeyproperties::where(['property_id' => $july->property_id])->first();
            @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-success">{{$july->user_id}}</span></td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$july->property_id)}}">{{$book_july->name}}</a></td>
                    <td class="text-center">
                        @if($book_july->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$book_july->price}}</td>
                    <!-- <td class="text-center">{{ \Carbon\Carbon::parse($book_july->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($book_july->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($book_july->created_at)->format('Y') }}</td> -->
                    
                    <!-- @if($book_july->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($book_july->user_id == 0 && $book_july->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($book_july->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($book_july->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_july->user_id }}</span></td>
                    @elseif($book_july->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_july->agent_id }}</span></td>
                    @elseif($book_july->user_id == 0 && $book_july->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif -->

                    @if($book_july->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Bookmarked In August -->
@if ($total_bookmarked_property_count_aug->count() > 0) 
<br>
    <h3>Properties Bookmarked In August</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Bookmarked By</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <!-- <th class="border-bottom-0">Date</th> -->
            <!-- <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th> -->
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_bookmarked_property_count_aug as $key => $aug)
            @php
            $book_aug = App\Models\Homeyproperties::where(['property_id' => $aug->property_id])->first();
            @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-success">{{$aug->user_id}}</span></td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$aug->property_id)}}">{{$book_aug->name}}</a></td>
                    <td class="text-center">
                        @if($book_aug->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$book_aug->price}}</td>
                    <!-- <td class="text-center">{{ \Carbon\Carbon::parse($book_aug->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($book_aug->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($book_aug->created_at)->format('Y') }}</td> -->
                    
                    <!-- @if($book_aug->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($book_aug->user_id == 0 && $book_aug->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($book_aug->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($book_aug->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_aug->user_id }}</span></td>
                    @elseif($book_aug->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_aug->agent_id }}</span></td>
                    @elseif($book_aug->user_id == 0 && $book_aug->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif -->

                    @if($book_aug->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Bookmarked In September -->
@if ($total_bookmarked_property_count_sept->count() > 0) 
<br>
    <h3>Properties Bookmarked In September</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Bookmarked By</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <!-- <th class="border-bottom-0">Date</th> -->
            <!-- <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th> -->
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_bookmarked_property_count_sept as $key => $sept)
            @php
            $book_sept = App\Models\Homeyproperties::where(['property_id' => $sept->property_id])->first();
            @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-success">{{$sept->user_id}}</span></td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$sept->property_id)}}">{{$book_sept->name}}</a></td>
                    <td class="text-center">
                        @if($book_sept->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$book_sept->price}}</td>
                    <!-- <td class="text-center">{{ \Carbon\Carbon::parse($book_sept->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($book_sept->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($book_sept->created_at)->format('Y') }}</td> -->
                    
                    <!-- @if($book_sept->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($book_sept->user_id == 0 && $book_sept->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($book_sept->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($book_sept->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_sept->user_id }}</span></td>
                    @elseif($book_sept->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_sept->agent_id }}</span></td>
                    @elseif($book_sept->user_id == 0 && $book_sept->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif -->

                    @if($book_sept->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Bookmarked In October -->
@if ($total_bookmarked_property_count_oct->count() > 0) 
<br>
    <h3>Properties Bookmarked In October</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Bookmarked By</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <!-- <th class="border-bottom-0">Date</th> -->
            <!-- <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th> -->
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_bookmarked_property_count_oct as $key => $oct)
            @php
            $book_oct = App\Models\Homeyproperties::where(['property_id' => $oct->property_id])->first();
            @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-success">{{$oct->user_id}}</span></td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$oct->property_id)}}">{{$book_oct->name}}</a></td>
                    <td class="text-center">
                        @if($book_oct->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$book_oct->price}}</td>
                    <!-- <td class="text-center">{{ \Carbon\Carbon::parse($book_oct->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($book_oct->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($book_oct->created_at)->format('Y') }}</td> -->
                    
                    <!-- @if($book_oct->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($book_oct->user_id == 0 && $book_oct->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($book_oct->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($book_oct->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_oct->user_id }}</span></td>
                    @elseif($book_oct->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_oct->agent_id }}</span></td>
                    @elseif($book_oct->user_id == 0 && $book_oct->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif -->

                    @if($book_oct->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Bookmarked In November -->
@if ($total_bookmarked_property_count_nov->count() > 0) 
<br>
    <h3>Properties Bookmarked In November</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Bookmarked By</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <!-- <th class="border-bottom-0">Date</th> -->
            <!-- <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th> -->
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_bookmarked_property_count_nov as $key => $nov)
            @php
            $book_nov = App\Models\Homeyproperties::where(['property_id' => $nov->property_id])->first();
            @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-success">{{$nov->user_id}}</span></td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$nov->property_id)}}">{{$book_nov->name}}</a></td>
                    <td class="text-center">
                        @if($book_nov->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$book_nov->price}}</td>
                    <!-- <td class="text-center">{{ \Carbon\Carbon::parse($book_nov->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($book_nov->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($book_nov->created_at)->format('Y') }}</td> -->
                    
                    <!-- @if($book_nov->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($book_nov->user_id == 0 && $book_nov->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($book_nov->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($book_nov->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_nov->user_id }}</span></td>
                    @elseif($book_nov->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_nov->agent_id }}</span></td>
                    @elseif($book_nov->user_id == 0 && $book_nov->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif -->

                    @if($book_nov->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif

<!-- Properties Bookmarked In December -->
@if ($total_property_count_dec->count() > 0) 
<br>
    <h3>Properties Bookmarked In December</h3>
    <table id="customers">
        <thead>
        <tr>
            <th class="border-bottom-0 w-5">S.No</th>
            <th class="border-bottom-0 w-10">Bookmarked By</th>
            <th class="border-bottom-0 w-10">Property Name</th>
            <th class="border-bottom-0">Property Status</th>
            <th class="border-bottom-0">Price</th>
            <!-- <th class="border-bottom-0">Date</th> -->
            <!-- <th class="border-bottom-0">Added By</th>
            <th class="border-bottom-0">Agent Id / User Id</th> -->
            <th>Featured</th>
        </tr>
        </thead>
        <tbody>
            @foreach($total_bookmarked_property_count_dec as $key => $dec)
            @php
            $book_dec = App\Models\Homeyproperties::where(['property_id' => $dec->property_id])->first();
            @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><span class="badge rounded-pill bg-success">{{$dec->user_id}}</span></td>
                    <td class="text-center"><a href="{{ route('admin.properties_details',$dec->property_id)}}">{{$book_dec->name}}</a></td>
                    <td class="text-center">
                        @if($book_dec->status == 0)
                            <span class="badge rounded-pill bg-primary">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">{{$book_dec->price}}</td>
                    <!-- <td class="text-center">{{ \Carbon\Carbon::parse($book_dec->created_at)->format('d')}}-{{ \Carbon\Carbon::parse($book_dec->created_at)->format('m') }}-{{ \Carbon\Carbon::parse($book_dec->created_at)->format('Y') }}</td> -->
                    
                    <!-- @if($book_dec->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                    @elseif($book_dec->user_id == 0 && $book_dec->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                    @elseif($book_dec->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                    @endif

                    @if($book_dec->agent_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_dec->user_id }}</span></td>
                    @elseif($book_dec->user_id == NULL)
                        <td class="text-center"><span class="badge rounded-pill bg-success">{{ $book_dec->agent_id }}</span></td>
                    @elseif($book_dec->user_id == 0 && $book_dec->agent_id == 0)
                        <td class="text-center"><span class="badge rounded-pill bg-success">Added By Admin</span></td>
                    @endif -->

                    @if($book_dec->featured==0)
                        <td><span class="badge rounded-pill bg-primary">Regular Listing</span></td>
                    @else
                        <td class="text-center"><span class="badge rounded-pill bg-success">Featured</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
@endif
<br><br>
</body>
</html>
