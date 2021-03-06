<!DOCTYPE html>
<html>
<head>
    @include('include.head')
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('assets/src/plugins/jquery-steps/build/jquery.steps.css')}}">
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
                            <h4>Persons Details</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Person</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                January 2018
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                {{--<a class="dropdown-item" href="#">Export List</a>--}}
                                {{--<a class="dropdown-item" href="#">Policies</a>--}}
                                {{--<a class="dropdown-item" href="#">View Assets</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                {{-- <div class="clearfix">
                     <h4 class="text-blue">Step wizard vertical</h4>
                     <p class="mb-30 font-14">jQuery Step wizard</p>
                 </div>--}}
                <div class="wizard-content">

                    <form class="tab-wizard wizard-circle wizard vertical" action="{{Route('savePerson')}}"
                          method="post">
                        @csrf
                        <h5>Personal Info</h5>
                        <section>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name : *</label>
                                        <input type="text" class="form-control" name="first_name"
                                               placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Middle Name :</label>
                                        <input type="text" class="form-control" name="middle_name"
                                               placeholder="Middle Name">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name : * </label>
                                        <input type="text" class="form-control" name="last_name"
                                               placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth :</label>
                                        <input type="text" name="DOB_en" class="form-control date-picker"
                                               placeholder="Select Date" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Gender</label>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="genderMale" name="gender" value="male"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="genderMale">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="genderFemale" name="gender"
                                               class="custom-control-input" value="female">
                                        <label class="custom-control-label" for="genderFemale">Female</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="genderOther" name="gender" class="custom-control-input"
                                               value="other">
                                        <label class="custom-control-label" for="genderOther">Others</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Religion</label>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="religionHindu" name="religion"
                                               class="custom-control-input" value="hindu">
                                        <label class="custom-control-label" for="religionHindu">Hindu</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="religionMuslim" name="religion"
                                               class="custom-control-input" value="muslim">
                                        <label class="custom-control-label" for="religionMuslim">Muslim</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input type="radio" id="religionOther" name="religion"
                                               class="custom-control-input" value="other">
                                        <label class="custom-control-label" for="religionOther">Others</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nationality :</label>
                                        <input type="text" class="form-control" name="nationality"
                                               placeholder="Nationality">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Caste :</label>
                                        <input type="text" class="form-control" name="caste" placeholder="Caste">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Marital Status :</label>
                                        <select class="form-control" name="marital">
                                            <option value="Married">Married</option>
                                            <option value="Unmarried">Unmarried</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widow">Widow</option>
                                            <option value="Widower">Widower</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contact :</label>
                                        <input type="text" class="form-control" name="contact"
                                               placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email :</label>
                                        <input type="email" class="form-control" name="email"
                                               placeholder="email@email.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Recent Photo :</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{--step 2--}}
                        <h5>Identity Info</h5>
                        <section>
                            <div id="info">
                                <div class="identity-info">
                                    <div class="row ">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Identity Number</label>
                                                <input type="text" class="form-control" name="idnumber[]">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>ID Type :</label>
                                                <select class="form-control" name='idtype[]'>
                                                    <option value="citizenship">Citizenship</option>
                                                    <option value="pasport">PassPort</option>
                                                    <option value="voterid">Voter ID</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Identity Issued Date</label>
                                                <input type="date" class="form-control" name="personidissueddate[]">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Identity Issued By</label>
                                                <input type="text" class="form-control" name="personidissuedby[]">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <a class="pull-right btn btn-primary btn-md add-more-click"
                                            id="addrowIdentity"><i
                                                class="fa fa-plus-circle"></i> Add</a>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Step 3 -->
                        <h5>Address </h5>
                        <section>
                            <h3>Permanent Address</h3>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control" name="country[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" name="state[]">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>District</label>
                                        <input type="text" class="form-control" name="district[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Municipality / VDC </label>
                                        <input type="text" class="form-control" name="municipality[]">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ward</label>
                                        <input type="text" class="form-control" name="ward[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Village</label>
                                        <input type="text" class="form-control" name="village[]">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tole</label>
                                        <input type="text" class="form-control" name="tole[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>House</label>
                                        <input type="text" class="form-control" name="house[]">
                                        <input type="hidden" class="form-control" name="type[]" value="permanent">
                                    </div>
                                </div>
                            </div>
                            <h3>Temporary Address</h3>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control" name="country[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" name="state[]">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>District</label>
                                        <input type="text" class="form-control" name="district[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Municipality / VDC </label>
                                        <input type="text" class="form-control" name="municipality[]">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ward</label>
                                        <input type="text" class="form-control" name="ward[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Village</label>
                                        <input type="text" class="form-control" name="village[]">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tole</label>
                                        <input type="text" class="form-control" name="tole[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>House</label>
                                        <input type="text" class="form-control" name="house[]">
                                        <input type="hidden" class="form-control" name="type[]" value="temporary">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 4 -->
                        <h5>Family Info</h5>
                        <section>
                            <div class="family-info">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Person :</label>
                                            <input type="text" class="form-control" name="personname[]">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Related Person Identity Number :</label>
                                            <input type="text" class="form-control" name="relatedid[]">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Related Person Id Issued Date :</label>
                                            <input type="date" class="form-control" name="relatedidissuedate[]">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Related Person Id Issued By :</label>
                                            <input type="text" class="form-control" name="relatedidissueby[]">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Relation Type :</label>
                                            <select class="form-control" name='relationship_type[]'>
                                                <option value="father">Father</option>
                                                <option value="mother">Mother</option>
                                                <option value="brother">Brother</option>
                                                <option value="sister">Sister</option>
                                                <option value="son">Son</option>
                                                <option value="daughter">Daughter</option>
                                                <option value="daughterInLaw">Daughter-In-Law</option>
                                                <option value="grandson">Grand Son</option>
                                                <option value="grandDaughter">Grand Daughter</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Add More</label>
                                        <a class="pull-right btn btn-primary btn-md add-more-click"
                                           rel="content-y"
                                           role="button" id="add-more-family"><i class="fa fa-plus-circle"></i></a>

                                    </div>
                                </div>

                        </section>
                        <!-- Step 5 -->
                        <h5>Education </h5>
                        <section>
                            <div class="education-info">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Degree :</label>
                                                <select class="form-control" name="degree[]">
                                                    <option value="Below SLC/SEE">Below SLC/SEE</option>
                                                    <option value="SLC">SLC/SEE</option>
                                                    <option value="Intermediate">Intermediate</option>
                                                    <option value="Bachelor">Bachelor</option>
                                                    <option value="Master">Master</option>
                                                    <option value="MPhil">MPhil</option>
                                                    <option value="PhD">PhD</option>
                                                    <option value="Vocational Training">Vocational Training</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Board / University</label>
                                                <input type="text" class="form-control" name="university[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Year of Start</label>
                                                <input type="text" class="form-control" name="year_of_start[]">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Year of Completion</label>
                                                <input type="text" class="form-control" name="year_of_completion[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Stream</label>
                                                <input type="text" class="form-control" name="stream[]">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>College</label>
                                                <input type="text" class="form-control" name="college[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="pull-right col-md-2">
                                <a id="add-education" class="pull-right btn btn-primary btn-md add-more-click"
                                   rel="content-y"
                                   role="button"><i class="fa fa-plus-circle"></i> Add</a>

                            </div>
                        </section>
                        <!-- Step 6 -->
                        <h5>Language </h5>
                        <section>
                            <div class="language-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Language Known :</label>
                                            <input type="text" class="form-control" name="language[]">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Can Read ?</label>
                                            <select class="form-control" name="can_read[]">
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Can Write?:</label>
                                            <select class="form-control" name="can_write[]">
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Add More</label>
                                        <a id="add-language" class="pull-right btn btn-primary btn-md add-more-click"
                                           rel="content-y"
                                           role="button"><i class="fa fa-plus-circle"></i></a>
                                    </div>
                                </div>


                        </section>
                    </form>
                </div>
            </div>

            <!-- success Popup html Start -->
            <div class="modal fade" id="success-modal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center font-18">
                            <h3 class="mb-20">Form Submitted!</h3>
                            <div class="mb-30 text-center"><img
                                    src="{{URL::asset('assets/vendors/images/success.png')}}"></div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- success Popup html End -->
        </div>

        @include('include.footer')
    </div>
</div>
@include('include.script')
<script src="{{URL::asset('assets/src/plugins/jquery-steps/build/jquery.steps.js')}}"></script>

<script>
    $(".tab-wizard").steps({
        headerTag: "h5",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            $('.steps .current').prevAll().addClass('disabled');
        },
        onFinished: function (event, currentIndex) {
            $('form').submit();
            $('#success-modal').modal('show');
        }
    });
</script>
<script>

    $(document).ready(function () {
        var counter = 0;

        $("#addrowIdentity").on("click", function () {
            var newRow = $("<div class='row'>");
            var cols = "";

            cols += '<div class="col-md-3" ><div class="form-group">' +
                '<label>Identity Number</label>' +
                '<input type="text" class="form-control" name="idnumber[]">' +
                '</div>' +
                '</div>';

            cols += '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label>ID Type :</label>' +
                '<select class="form-control" name="idtype[]">' +
                '<option value="citizenship">Citizenship</option>' +
                '<option value="pasport">PassPort</option>' +
                '<option value="voterid">Voter ID</option>' +
                '<option value="other">Other</option>' +
                '</select>' +
                '</div>' +
                '</div>';

            cols += '<div class="col-md-3" ><div class="form-group">' +
                '<label>Identity Issued Date</label>' +
                '<input type="date" class="form-control" name="personidissueddate[]">' +
                '</div>' +
                '</div>';

            cols += '<div class="col-md-3" ><div class="form-group">' +
                '<label>Identity Issued By</label>' +
                '<input type="text" class="form-control" name="personidissuedby[]">' +
                '</div>' +
                '</div>';

            cols += '<div class="col-md-2">' +
                '<div class="form-group">' +
                '<label>Remove</label>' +
                '<a  class="pull-right btn btn-primary btn-md add-more-click ibtnDel"' +
                'rel="content-y"' +
                'role="button" ><i class="fa fa-minus-circle"></i></a>' +
                ' </div>' +
                '</div>';

            newRow.append(cols);
            $("div.identity-info").append(newRow);
            counter++;

        });


        $("div.identity-info").on("click", ".ibtnDel", function (event) {
            $(this).closest(".row").remove();
            counter -= 1
        });


    });

</script>
<script>

    $(document).ready(function () {
        var counter = 0;

        $("#add-more-family").on("click", function () {
            var newRow = $("<div class='row'>");
            var cols = "";


            cols += ' <div class="col-md-3">'+
                '<div class="form-group">'+
                '<label>Person :</label>'+
            '<input type="text" class="form-control" name="personname[]">'+
               ' </div>'+
                '</div>';

            cols += ' <div class="col-md-3">'+
               ' <div class="form-group">'+
                '<label>Related Person Id :</label>'+
           ' <input type="text" class="form-control" name="relatedid[]">'+
                '</div>'+
                '</div>';

            cols += ' <div class="col-md-3">'+
                ' <div class="form-group">'+
                '<label>Related Person Id Issued Date :</label>'+
                ' <input type="date" class="form-control" name="relatedidissuedate[]">'+
                '</div>'+
                '</div>';

            cols += ' <div class="col-md-3">'+
                ' <div class="form-group">'+
                '<label>Related Person Id Issued By :</label>'+
                ' <input type="text" class="form-control" name="relatedidissueby[]">'+
                '</div>'+
                '</div>';

            cols +=  '<div class="col-md-3">'+
                '<div class="form-group">'+
               ' <label>Relation Type :</label>'+
            '<select class="form-control" name="relationship_type[]">'+
                '<option value="father">Father</option>'+
                '<option value="mother">Mother</option>'+
               ' <option value="brother">Brother</option>'+
                '<option value="sister">Sister</option>'+
                '<option value="son">Son</option>'+
               ' <option value="daughter">Daughter</option>'+
               ' <option value="daughterInLaw">Daughter-In-Law</option>'+
               ' <option value="grandson">Grand Son</option>'+
            '<option value="grandDaughter">Grand Daughter</option>'+
            '</select>'+
            '</div>'+
            '</div>';
            cols += '<div class="col-md-2">' +
                '<div class="form-group">' +
                '<label>Remove</label>' +
                '<a  class="pull-right btn btn-primary btn-md add-more-click ibtnDel2"' +
                'rel="content-y"' +
                'role="button" ><i class="fa fa-minus-circle"></i></a>' +
                ' </div>' +
                '</div>';

            newRow.append(cols);
            $("div.family-info").append(newRow);
            counter++;

        });


        $("div.family-info").on("click", ".ibtnDel2", function (event) {
            $(this).closest(".row").remove();
            counter -= 1
        });


    });

</script>

<script>

    $(document).ready(function () {
        var counter = 0;

        $("#add-education").on("click", function () {
            var newRow = $("<div class='row'>");
            var cols = "";


            cols += '<div class="row">'+
                '<div class="col-md-5">'+
                '<div class="form-group">'+
            '<label>Degree :</label>'+
            '<select class="form-control" name="degree[]">'+
            '<option value="Below SLC/SEE">Below SLC/SEE</option>'+
            '<option value="SLC">SLC/SEE</option>'+
            ' <option value="Intermediate">Intermediate</option>'+
            '<option value="Bachelor">Bachelor</option>'+
            '<option value="Master">Master</option>'+
            '<option value="MPhil">MPhil</option>'+
            ' <option value="PhD">PhD</option>'+
            '<option value="Vocational Training">Vocational Training</option>'+
            '<option value="Others">Others</option>'+
            '</select>'+
            '</div>'+
            '</div>'+
            '<div class="col-md-5">'+
            '<div class="form-group">'+
            '<label>Board / University</label>'+
            '<input type="text" class="form-control" name="university[]">'+
            ' </div>'+
            '</div>'+
            ' </div>';

            cols += '<div class="row">'+
            '<div class="col-md-5">'+
            '<div class="form-group">'+
            '<label>Year of Start</label>'+
            '<input type="text" class="form-control" name="year_of_start[]">'+
            '</div>'+

            '</div>'+
            ' <div class="col-md-5">'+
            ' <div class="form-group">'+
            '<label>Year of Completion</label>'+
            '<input type="text" class="form-control" name="year_of_completion[]">'+
            '</div>'+
            '</div>'+
            '</div>';


            cols +=  '<div class="row">'+
                '<div class="col-md-5">'+
                '<div class="form-group">'+
                '<label>Stream</label>'+
                '<input type="text" class="form-control" name="stream[]">'+
                '</div>'+
                '</div>'+
                '<div class="col-md-5">'+
                '<div class="form-group">'+
                ' <label>College</label>'+
                '<input type="text" class="form-control" name="college[]">'+
                '</div>'+
                '</div>'+
                '</div>';


            cols += '<div class="col-md-2">' +
                '<div class="form-group">' +
                '<label>Remove</label>' +
                '<a  class="pull-right btn btn-primary btn-md add-more-click ibtnDel3"' +
                'rel="content-y"' +
                'role="button" ><i class="fa fa-minus-circle"></i></a>' +
                ' </div>' +
                '</div>';

            newRow.append(cols);
            $("div.education-info").append(newRow);
            counter++;

        });


        $("div.education-info").on("click", ".ibtnDel3", function (event) {
            $(this).closest(".row").remove();
            counter -= 1
        });


    });

</script>

<script>

    $(document).ready(function () {
        var counter = 0;

        $("#add-language").on("click", function () {
            var newRow = $("<div class='row'>");
            var cols = "";


            cols += '<div class="col-md-6">'+
            '<div class="form-group">'+
            '<label>Language Known :</label>'+
            '<input type="text" class="form-control" name="language[]">'+
            '</div>'+
            '</div>';

            cols += '<div class="col-md-2">'+
                '<div class="form-group">'+
                '<label>Can Read ?</label>'+
                '<select class="form-control" name="can_read[]">'+
                '<option>Yes</option>'+
                '<option>No</option>'+
                '</select>'+
            '</div>'+
            '</div>';


            cols += '<div class="col-md-2">'+
                '<div class="form-group">'+
                '<label>Can Write?:</label>'+
                '<select class="form-control" name="can_write[]">'+
                '<option>Yes</option>'+
                ' <option>No</option>'+
                '</select>'+
                ' </div>'+
                '</div>';


            cols += '<div class="col-md-2">' +
                '<div class="form-group">' +
                '<label>Remove</label>' +
                '<a  class="pull-right btn btn-primary btn-md add-more-click ibtnDel4"' +
                'rel="content-y"' +
                'role="button" ><i class="fa fa-minus-circle"></i></a>' +
                ' </div>' +
                '</div>';

            newRow.append(cols);
            $("div.language-info").append(newRow);
            counter++;

        });


        $("div.language-info").on("click", ".ibtnDel4", function (event) {
            $(this).closest(".row").remove();
            counter -= 1
        });


    });

</script>
</body>
</html>
