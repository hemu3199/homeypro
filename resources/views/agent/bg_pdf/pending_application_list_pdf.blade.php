<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pending Application</title>
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
        <center><h1 class="text-center">Pending Application</h1></center>


        <h2>Total Pending Application: {{$total_application_pending->count()}}</h2>
            <table id="customers" class="table table-bordered">
                <thead>
                <tr>
                    <th class="border-bottom-0 text-center">S.NO</th>
                    <th class="border-bottom-0 text-center">Property Id</th>
                    <th class="border-bottom-0 text-center">Property Name</th>
                     <th class="border-bottom-0 text-center">Property Status</th>
                    <th class="border-bottom-0 text-center">User Id</th>
                    <th class="border-bottom-0 text-center">User Name</th>
                    <!-- <th class="border-bottom-0 text-center">Application Status</th> -->
                    <th class="border-bottom-0 text-center">Application Received</th>
                    <!-- <th class="border-bottom-0 text-center">View Applications</th> -->
                    <th class="border-bottom-0 text-center">Remakes</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($total_application_pending as $key => $row)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center"><span class="badge rounded-pill bg-success">{{DB::table('homeyproperties')->where(['property_id' => $row->property_id])->pluck('property_id')->first();}}</span></td>
                            <td class="text-center">{{DB::table('homeyproperties')->where(['property_id' => $row->property_id])->pluck('name')->first();}}</td>
                            @php
                            $status=DB::table('homeyproperties')->where(['property_id' => $row->property_id])->first();
                            @endphp
                            @if($status->status == 0)
                            
                            <td class="text-center"><span class="badge rounded-pill bg-success">Active</span></td>
                            @else
                            @if($status->status == 1 && $status->property_deleted == 0)
                            
                            <td class="text-center"><span class="badge rounded-pill bg-warning">Inactive</span></td>
                            @else
                            
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Deleted</a></td>
                            @endif
                            @endif
                            <td class="text-center"><span class="badge rounded-pill bg-success">{{DB::table('users')->where(['user_id' => $row->user_id])->pluck('user_id')->first();}}</span></td>
                            <td class="text-center">{{DB::table('users')->where(['user_id' => $row->user_id])->pluck('name')->first();}}</td>
                            <!-- <td class="text-center">
                                @if($row->approval_status == 0)
                                <span class="badge rounded-pill bg-warning">Pending</span>
                                @elseif($row->approval_status == 1)
                                <span class="badge rounded-pill bg-primary">Approved</span>
                                @elseif($row->approval_status == 2)
                                <span class="badge rounded-pill bg-danger">Rejected</span>
                                @endif 
                            </td> -->
                            <td class="text-center">{{ \Carbon\Carbon::parse($row->updated_at)->format('d')}}-{{ \Carbon\Carbon::parse($row->updated_at)->format('m') }}-{{ \Carbon\Carbon::parse($row->updated_at)->format('Y') }}</td>
                            <!-- <td> <a href="{{ route('agent.bgviewapplication', ['id' => $row->user_id, 'property_id' => $row->property_id]) }}"
                                class="btn btn-primary" role="button" aria-pressed="true">View Application</a>
                            </td> -->
                            @if($row->remarks == NULL)
                            <td class="text-center"><span class="badge rounded-pill bg-danger">NA</span></td>
                            @else
                            <td class="text-center">{{$row->remarks}}</td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">" No Data Found "</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        
    </body>
</html>
