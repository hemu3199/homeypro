<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Properties Report</title>
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
                padding: 1px;
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
        <center><h1 class="text-center">Properties Report List</h1></center>


        <h2>Total: {{$totalproperties_report->count()}}</h2>
        @if ($totalproperties_report->count() > 0) 
            <table id="customers" class="table table-bordered">
                <thead>
                <tr>
                    <th class="border-bottom-0 w-5 text-center">S.No</th>
                    <th class="border-bottom-0 text-center">Property Id</th>
                    <th class="border-bottom-0 text-center">Property Name</th>
                    <th class="border-bottom-0 text-center">User Name</th>
                    <th class="border-bottom-0 text-center">Property Status</th>
                    <th class="border-bottom-0">Added By</th>
                    <th class="border-bottom-0">Agent Id / User Id</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($totalproperties_report as $key => $row)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center"><span class="badge rounded-pill bg-success">{{$row->property_id}}</span></td>
                            <td class="text-center"><a href="{{ route('admin.properties_details',$row->property_id)}}">{{DB::table('homeyproperties')->where(['property_id' => $row->property_id])->pluck('name')->first()}}</a></td>
                            <td class="text-center">{{DB::table('users')->where(['user_id' => $row->user_id])->pluck('name')->first()}}</td>
                            <td class="text-center">{{$row->status}}</td>
                            @if(strpos($row->agent_id, 'HOMEYAG') !== false)
                                <td class="text-center"><span class="badge rounded-pill bg-primary">Agent</span></td>
                            @elseif($row->agent_id == 'Admin')
                                <td class="text-center"><span class="badge rounded-pill bg-primary">Admin</span></td>
                            @elseif(strpos($row->agent_id, 'HOMEYU') !== false)
                                <td class="text-center"><span class="badge rounded-pill bg-primary">User</span></td>
                            @endif

                            @if($row->agent_id == 'Admin')
                                <td class="text-center"><span class="badge rounded-pill bg-success">Admin</span></td>
                            @else($row->user_id == NULL)
                                <td class="text-center"><span class="badge rounded-pill bg-success">{{ $row->agent_id }}</span></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">No Data Found</p>
        @endif
        
    </body>
</html>
