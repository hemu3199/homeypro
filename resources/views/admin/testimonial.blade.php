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
                    <h4 class="card-title">Testimonial List</h4>
                </div>
                <div class="card-body">
                    <div class="dashboard-search-listing">
                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search testimonial name" value="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter text-nowrap table-bordered border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">S.NO</th>
                                    <th class="border-bottom-0">User Id</th>
                                    <th class="border-bottom-0">User Name</th>
                                    <th class="border-bottom-0">User Email</th>
                                    <th class="border-bottom-0">Message</th>
                                    <th class="border-bottom-0">Ratings</th>
                                    <th class="border-bottom-0">Testimonial Status</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($testimonial_list as $key => $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a class="tablebtn color-bg">{{ $row->user_id }}</a></td>
                                    <td>{{ $row->user_name }}</td>
                                    <td>{{ $row->user_email }}</td>
                                    <td>{{ $row->message }}</td>
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
                                    @if ($row->status == '1')
                                    <td><a class="tablebtn" style="background-color:green">Approved</a></td>
                                    @elseif($row->status == '2')
                                    <td><a class="tablebtn" style="background-color:red">Rejected</a></td>
                                    @else
                                    <td>
                                        <a class="tablebtn" href="{{ route('admin.approve.testimonials',$row->id) }}" role="button" aria-pressed="true" style="background-color:#3270fc">Approve</a>
                                        <a class="tablebtn" href="{{ route('admin.reject.testimonials',$row->id) }}" role="button" aria-pressed="true" style="background-color:red">Reject</a>
                                    </td>
                                    @endif
                                    <td>
                                        <!--<a class="tablebtn color-bg" href="{{ route('users-testimonilas-edit',$row->id) }}" role="button" aria-pressed="true"><i class='fa fa-edit'></i></a>-->
                                        <a class="tablebtn color-bg" style="background-color: red" href="{{ route('admin.deletetestimonials',$row->id) }}" role="button" aria-pressed="true"><i class='fas fa-trash-alt'></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">" No Data Found "</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $testimonial_list->links() !!}
                        <nav aria-label="Page navigation"></nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header  border-0">
            <h4 class="card-title">Deleted Testimonial List</h4>
        </div>
        <div class="card-body">
            <div class="dashboard-search-listing">
                <input type="text" onkeyup="searchdeleted()" id="search-item-tables" placeholder="Search deleted testimonial name" value="">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
            <div class="table-responsive">
                <table class="table tables table-vcenter text-nowrap table-bordered border-bottom">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">S.NO</th>
                            <th class="border-bottom-0">User Id</th>
                            <th class="border-bottom-0">User Name</th>
                            <th class="border-bottom-0">User Email</th>
                            <th class="border-bottom-0">Message</th>
                            <th class="border-bottom-0">Ratings</th>
                            <th class="border-bottom-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($deleted_testimonial_list as $key => $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a class="tablebtn color-bg"></a>{{ $row->user_id }}</a></td>
                            <td>{{ $row->user_name }}</td>
                            <td>{{ $row->user_email }}</td>
                            <td>{{ $row->message }}</td>
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
                            <td>
                                <a class="tablebtn color-bg" style="background-color: red" href="{{ route('admin.deletetestimonials',$row->id) }}" role="button" aria-pressed="true"><i class='fas fa-trash-alt'></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">" No Data Found "</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {!! $testimonial_list->links() !!}
                <nav aria-label="Page navigation"></nav>
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
