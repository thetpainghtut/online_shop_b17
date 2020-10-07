@extends('backendtemplate')

@section('content')
	<div class="container-fluid">
    <!-- Page Heading -->
      	<div class="row">
      		<div class="col-md-12 mb-3">
        		<h1 class="h3 mb-0 text-gray-800 d-inline-block">Items List</h1>
        		<a href="{{route('items.create')}}" class="btn btn-info float-right">Add New</a>
      		</div>
      	</div>
        
        <div class="row">
        	<div class="col-md-12">
        		<table class="table table-bordered">
        			<thead class="thead-dark">
        				<tr>
        					<th>No</th>
        					<th>Codeno</th>
        					<th>Name</th>
        					<th>Price</th>
        					<th>Actions</th>
        				</tr>
        			</thead>
        			<tbody>
        				@php $i=1; @endphp
        				@foreach($items as $item)
        				<tr>
        					<td>{{$i++}}</td>
        					<td>{{$item->codeno}}</td>
        					<td>{{$item->name}}</td>
        					<td>{{$item->price}} MMK</td>
        					<td>
        						<a href="{{route('items.show',$item->id)}}" class="btn btn-primary">Detail</a>
        						<a href="{{route('items.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                <form method="post" action="{{route('items.destroy',$item->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                                <a href="#" class="btn btn-info showmodal">Modal</a>
        					</td>
        				</tr>
        				@endforeach
        			</tbody>
        		</table>
        	</div>
        </div>
 	</div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            {{-- <th>No</th> --}}
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Extn.</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.showmodal').click(function () {
                $('#exampleModal').modal('show');
            })

            $('#example').DataTable( {
                "data": [
                            [
                              "Tiger Nixon",
                              "System Architect",
                              "Edinburgh",
                              "5421",
                              "2011/04/25",
                              "$320,800"
                            ],
                            [
                              "Ashton Cox",
                              "Junior Technical Author",
                              "San Francisco",
                              "1562",
                              "2009/01/12",
                              "$86,000"
                            ],
                            [
                              "Cedric Kelly",
                              "Senior Javascript Developer",
                              "Edinburgh",
                              "6224",
                              "2012/03/29",
                              "$433,060"
                            ],
                            [
                              "Airi Satou",
                              "Accountant",
                              "Tokyo",
                              "5407",
                              "2008/11/28",
                              "$162,700"
                            ],
                            [
                              "Brielle Williamson",
                              "Integration Specialist",
                              "New York",
                              "4804",
                              "2012/12/02",
                              "$372,000"
                            ],
                            [
                              "Herrod Chandler",
                              "Sales Assistant",
                              "San Francisco",
                              "9608",
                              "2012/08/06",
                              "$137,500"
                            ],
                            [
                              "Rhona Davidson",
                              "Integration Specialist",
                              "Tokyo",
                              "6200",
                              "2010/10/14",
                              "$327,900"
                            ],
                            [
                              "Colleen Hurst",
                              "Javascript Developer",
                              "San Francisco",
                              "2360",
                              "2009/09/15",
                              "$205,500"
                            ],
                            [
                              "Sonya Frost",
                              "Software Engineer",
                              "Edinburgh",
                              "1667",
                              "2008/12/13",
                              "$103,600"
                            ],
                            [
                              "Jena Gaines",
                              "Office Manager",
                              "London",
                              "3814",
                              "2008/12/19",
                              "$90,560"
                            ],
                            [
                              "Quinn Flynn",
                              "Support Lead",
                              "Edinburgh",
                              "9497",
                              "2013/03/03",
                              "$342,000"
                            ],
                            [
                              "Charde Marshall",
                              "Regional Director",
                              "San Francisco",
                              "6741",
                              "2008/10/16",
                              "$470,600"
                            ],
                            [
                              "Haley Kennedy",
                              "Senior Marketing Designer",
                              "London",
                              "3597",
                              "2012/12/18",
                              "$313,500"
                            ],
                            [
                              "Tatyana Fitzpatrick",
                              "Regional Director",
                              "London",
                              "1965",
                              "2010/03/17",
                              "$385,750"
                            ],
                            [
                              "Michael Silva",
                              "Marketing Designer",
                              "London",
                              "1581",
                              "2012/11/27",
                              "$198,500"
                            ],
                            [
                              "Paul Byrd",
                              "Chief Financial Officer (CFO)",
                              "New York",
                              "3059",
                              "2010/06/09",
                              "$725,000"
                            ],
                            [
                              "Gloria Little",
                              "Systems Administrator",
                              "New York",
                              "1721",
                              "2009/04/10",
                              "$237,500"
                            ],
                            [
                              "Bradley Greer",
                              "Software Engineer",
                              "London",
                              "2558",
                              "2012/10/13",
                              "$132,000"
                            ],
                            [
                              "Dai Rios",
                              "Personnel Lead",
                              "Edinburgh",
                              "2290",
                              "2012/09/26",
                              "$217,500"
                            ],
                            [
                              "Jenette Caldwell",
                              "Development Lead",
                              "New York",
                              "1937",
                              "2011/09/03",
                              "$345,000"
                            ],
                            [
                              "Yuri Berry",
                              "Chief Marketing Officer (CMO)",
                              "New York",
                              "6154",
                              "2009/06/25",
                              "$675,000"
                            ],
                            [
                              "Caesar Vance",
                              "Pre-Sales Support",
                              "New York",
                              "8330",
                              "2011/12/12",
                              "$106,450"
                            ],
                            [
                              "Doris Wilder",
                              "Sales Assistant",
                              "Sydney",
                              "3023",
                              "2010/09/20",
                              "$85,600"
                            ],
                            [
                              "Angelica Ramos",
                              "Chief Executive Officer (CEO)",
                              "London",
                              "5797",
                              "2009/10/09",
                              "$1,200,000"
                            ],
                            [
                              "Gavin Joyce",
                              "Developer",
                              "Edinburgh",
                              "8822",
                              "2010/12/22",
                              "$92,575"
                            ],
                            [
                              "Jennifer Chang",
                              "Regional Director",
                              "Singapore",
                              "9239",
                              "2010/11/14",
                              "$357,650"
                            ],
                            [
                              "Garrett Winters",
                              "Accountant",
                              "Tokyo",
                              "8422",
                              "2011/07/25",
                              "$170,750"
                            ]
                        ],
                "aoColumnDefs": [ {
                    "aTargets": [ 6 ],
                    "mData": "download_link",
                    "mRender": function ( data, type, full ) {
                        return '<a href="#" class="btn btn-info showmodal">Modal</a>';
                    }
                },
                // {
                //    "aTargets": [ 0 ],
                //     // "mData": "download_link",
                //     "mRender": function ( data, type, full ) {
                //         return `<a href="${full}">${data}</a>`;
                //     } 
                // }
                ]

            } );
        })
    </script>
@endsection