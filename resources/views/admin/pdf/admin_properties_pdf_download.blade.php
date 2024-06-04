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
  padding: 4px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

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
	<h1>Properties List</h1>
	<table id="customers" class="table table-bordered">
		<thead>
			<tr>
			 <th class="border-bottom-0 w-5">S.No</th>
                                        <th class="border-bottom-0 w-10">Property Name</th>
                                        <th class="border-bottom-0 w-10">Property Address</th>
                                        <th class="border-bottom-0">Property Status</th>
                                        <!-- <th class="border-bottom-0">Rent/Sale</th> -->
                                        <th class="border-bottom-0">Price</th>
                                        <th class="border-bottom-0">Date</th>
                                        <th class="border-bottom-0">Added By</th>
                                       <th class="border-bottom-0">Added BY Id</th>
                                        <!-- <th class="border-bottom-0">Actions</th> -->
                                        <!-- <th class="border-bottom-0">View Details</th> -->
                                        <th>Featured</th>
		</tr>
		</thead>
		<tbody>
			
			 @foreach($totalproperties as $key => $row)
                <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('users-property-rent-details',$row->property_id)}}">{{$row->name}}</a></td>
                                        <td>{{$row->address}}</td>
                                        <td>
                                          @if($row->status == 0)
                                         <span class="badge rounded-pill bg-primary mt-2 ml-4"> Active</span>
                                          @else
                                         <span class="badge rounded-pill bg-warning mt-2 ml-4"> Inactive</span>

                                          @endif
                                        </td>

                                        <td>
                                          @if(!empty($row->price))
                                         <span class="badge rounded-pill bg-primary mt-2 ml-4">  {{$row->price}}</span>
                                          @else
                                         <span class="badge rounded-pill bg-dark mt-2 ml-4">  NA </span>
                                          @endif</td>
                                        <td>{{ $row->created_at->format('Y-m-d') }}</td>
                                        <td>
                                           @if(!empty($row->user_id))
                                             <span class="badge rounded-pill bg-primary mt-2 ml-4"> USer </span> 
                                          @elseif(!empty($row->agent_id))
                                         <span class="badge rounded-pill bg-primary mt-2 ml-4"> Agent</span>
                                          @else
                                           <span class="badge rounded-pill bg-primary mt-2 ml-4"> ADMIN</span>
                                             @endif

                                        </td>
                                        <td>
                                          
                                          @if(!empty($row->user_id))
                                          <span class="badge rounded-pill bg-success mt-2 ml-4">{{$row->user_id}}</span>
                                          @elseif(!empty($row->agent_id))
                                         <span class="badge rounded-pill bg-success mt-2 ml-4"> {{$row->agent_id}}</span>
                                          @else
                                          <span class="badge rounded-pill bg-success mt-2 ml-4">ADMIN</span>
                                          @endif

                                        </td>
                                         <td>
                                           @if($row->featured==0)
                                       
                                       <span class="badge rounded-pill bg-dark mt-2 ml-4">  NA</span>
                                        @else
                                        <span class="badge rounded-pill bg-primary mt-2 ml-4">  
                                       featured
                                     </span>
                                       
                                        @endif</td>
                                        

                                      
               </tr>
            @endforeach
			
		</tbody>
		
	</table>

</body>
</html>