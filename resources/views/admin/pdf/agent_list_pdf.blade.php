<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Agents</title>
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
        <center><h1 class="text-center">Agent List</h1></center>


        <h2>Total Agents: {{$agentcount}}</h2>
        @if ($agentcount > 0) 
            <table id="customers" class="table table-bordered">
                <thead>
                <tr>
                    <th class="border-bottom-0 w-5 text-center">S.No</th>
                    <th class="border-bottom-0 w-10 text-center">Agent Id</th>
                    <th class="border-bottom-0 text-center">Agent Name</th>
                    <th class="border-bottom-0 text-center">Agent Email</th>
                    <th class="border-bottom-0 text-center">Agent Phone No</th>
                    <th class="border-bottom-0 text-center">Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($agentlist as $key => $row)
                    @php
                        $agent_status = DB::table('agents')->where(['agent_id' => $row->agent_id])->pluck('status')->first();
                    @endphp
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center"><span class="badge rounded-pill bg-success">{{$row->agent_id}}</span></td>
                            <td class="text-center">{{$row->name}}</td>
                            <td class="text-center">{{$row->email}}</td>
                            <td class="text-center">{{DB::table('agent_basic_information')->where(['agent_id' => $row->agent_id])->pluck('phoneno')->first() }}</td>
                            <td class="text-center">
                                @if($agent_status == 0)
                                    <span class="badge rounded-pill bg-primary">Active</span>
                                @else
                                    <span class="badge rounded-pill bg-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">No Data Found</p>
        @endif
        
    </body>
</html>
