@extends("admin.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Agent List')
@section("content")
<div class="dashboard-content">
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                @if(session('message'))
                <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                @elseif(session('error'))
                <div class="alert alert-danger" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-header  border-0">
                    <h4 class="card-title">Agent Reviews List</h4>
                </div>
                <div class="card-body">
                    <div class="dashboard-search-listing">
                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search Review" value="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter text-nowrap table-bordered border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">S.NO</th>
                                    <th class="border-bottom-0">Property Id</th>
                                    <th class="border-bottom-0">Property Name</th>
                                    <th class="border-bottom-0">User Id</th>
                                    <th class="border-bottom-0">User Name</th>
                                    <th class="border-bottom-0">User Email</th>
                                    <th class="border-bottom-0">Message</th>
                                    <th class="border-bottom-0">Ratings</th>
                                       <th class="border-bottom-0">Agent</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reviews as $key => $row)
                                @php
                                    $helpful_review_count = \App\Models\LikeReview::where('review_id', $row->id)->where('property_id', $row->property_id)->count();
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="badge rounded-pill bg-success mt-2 ml-4">{{ $row->property_id }}</td></span>
                                    <td>{{(\App\Models\Homeyproperties::where(['property_id' => $row['property_id']])->pluck('name')->first())}}</td>
                                    <td><span class="badge rounded-pill bg-success mt-2 ml-4">{{ $row->user_id }}</td></span>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->review }}</td>
                                    @if ($row->rating == '1')
                                    <td><i class='fas fa-star' style="color: yellow"></i></td>
                                    @elseif ($row->rating == '2')
                                    <td><i class='fas fa-star' style="color: yellow"></i><i class='fas fa-star' style="color: yellow"></i></td>
                                    @elseif ($row->rating == '3')
                                    <td><i class='fas fa-star' style="color: yellow"></i><i class='fas fa-star' style="color: yellow"></i><i class='fas fa-star' style="color: yellow"></i></td>
                                    @elseif ($row->rating == '4')
                                    <td><i class='fas fa-star' style="color: yellow"></i><i class='fas fa-star' style="color: yellow"></i><i class='fas fa-star' style="color: yellow"></i><i class='fas fa-star' style="color: yellow"></i></td>
                                    @elseif ($row->rating == '5')
                                    <td><i class='fas fa-star' style="color: yellow"></i><i class='fas fa-star' style="color: yellow"></i><i class='fas fa-star' style="color: yellow"></i><i class='fas fa-star' style="color: yellow"></i><i class='fas fa-star' style="color: yellow"></i></td>
                                    @endif
                                    <td> @php
                                        $agent_name=DB::table('agent_basic_information')->where('agent_id','=',$row->member_id)->pluck('fname')->first();
                                        @endphp
                                        @if(!empty($agent_name))
                                            {{

                                                $agent_name
                                            }}
                                        @else
                                        To HOMEY
                                        @endif
                                    </td>
                                    <td>
                                        <a class="tablebtn color-bg" style="background-color: red" href="{{ route('admin.delete-agents-review',$row->id) }}" role="button" aria-pressed="true"><i class='fas fa-trash-alt'></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">" No Data Found "</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $reviews->links() !!}
                        <nav aria-label="Page navigation"></nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>

<script type="text/javascript">
    function search() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search-item-table");
        filter = input.value.toUpperCase();
        table = document.getElementsByClassName("table")[0]; // Assuming there's only one table
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2]; // Change index to match the column you want to search (0-indexed)
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchdeleted() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search-item-tables");
        filter = input.value.toUpperCase();
        table = document.getElementsByClassName("tables")[0]; // Assuming there's only one table
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2]; // Change index to match the column you want to search (0-indexed)
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection
