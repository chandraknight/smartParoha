<!DOCTYPE html>
<html>
<head>
    @include('include.head')
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('assets/src/plugins/datatables/media/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('assets/src/plugins/datatables/media/css/responsive.dataTables.css')}}">
</head>
<body>
@include('include.header')
@include('include.sidebar')
<div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>People Info</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">People Info</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>


            <!-- Export Datatable start -->
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h5 class="text-blue">Persons Info List</h5>
                    </div>
                </div>
                <div class="row">
                    <table class="stripe hover multiple-select-row data-table-export nowrap">
                        <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Id</th>
                            <th>Name</th>
                            <th>DOB Np</th>
                            <th>Gender</th>
                            <th>Religion</th>
                            <th>Caste</th>
                            <th class="datatable-nosort">Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse(\App\Person::all() as $person)
                            <tr>
                                <td class="table-plus">{{$person->id}}</td>
                                <td>{{$person->first_name}} {{$person->middle_name}} {{$person->last_name}}</td>
                                <td>{{$person->DOB_np}}</td>
                                <td>{{$person->gender}}</td>
                                <td>{{$person->religion}}</td>
                                <td>{{$person->caste}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button"
                                           data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="fa fa-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No record saved</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Export Datatable End -->
        </div>
        @include('include.footer')
    </div>
</div>

@include('include.script')
<script src="{{URL::asset('assets/src/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/src/plugins/datatables/media/js/dataTables.responsive.js')}}"></script>
<script src="{{URL::asset('assets/src/plugins/datatables/media/js/responsive.bootstrap4.js')}}"></script>
<!-- buttons for Export datatable -->
<script src="{{URL::asset('assets/src/plugins/datatables/media/js/button/dataTables.buttons.js')}}"></script>
<script src="{{URL::asset('assets/src/plugins/datatables/media/js/button/buttons.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/src/plugins/datatables/media/js/button/buttons.print.js')}}"></script>
<script src="{{URL::asset('assets/src/plugins/datatables/media/js/button/buttons.html5.js')}}"></script>
<script src="{{URL::asset('assets/src/plugins/datatables/media/js/button/buttons.flash.js')}}"></script>
<script src="{{URL::asset('assets/src/plugins/datatables/media/js/button/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/src/plugins/datatables/media/js/button/vfs_fonts.js')}}"></script>
<script>
    $('document').ready(function () {
         $('.data-table-export').DataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                "info": "_START_-_END_ of _TOTAL_ entries",
                searchPlaceholder: "Search"
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'pdf', 'print'
            ]
        });
        var table = $('.select-row').DataTable();
        $('.select-row tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
        var multipletable = $('.multiple-select-row').DataTable();
        $('.multiple-select-row tbody').on('click', 'tr', function () {
            $(this).toggleClass('selected');
        });
    });
</script>
</body>
</html>
