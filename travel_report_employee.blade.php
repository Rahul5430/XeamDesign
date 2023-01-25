@extends('admins.layouts.app')
@section('content')

<style>
    .select2-container .select2-selection--single {
        height: 36px !important;
        font-size: 14px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 36px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 32px !important;
    }

    .total_approval_amount,
    .total_claim_amount {
        border: 1px solid #d2d6de;
        padding: 6px 12px;
        display: inherit;
    }

    table tr th,
    table tr td {
        vertical-align: middle;
        text-align: center;
    }

    .input_group_1 {
        margin-right: 15px;
    }

    .submit-btn-style {
        margin-top: 23px;
    }

    @media screen and (max-width: 1200px) {
        .submit-btn-style {
            margin-top: 0;
        }
    }

    @media screen and (max-width: 500px) {
        .input_group_1 {
            margin-right: 0;
        }
    }
</style>

<style>
    th,
    td {
        text-align: center !important;
        vertical-align: middle !important;
    }

    .box-header {
        display: flex !important;
        align-items: center;
    }

    .info-amount {
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        /* border-radius: 4px; */
        -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
        box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
        display: inline-block;
        height: 25px;
    }

    .view-more {
        width: 100%;
        text-align: center;
        color: #c9c5c5;
        border-bottom: 1px solid #c9c5c5;
        line-height: 0.1em;
        margin: 10px 0 20px;
    }

    .view-more span {
        cursor: pointer;
        background: #fff;
        padding: 0 10px;
    }

    .view-account-heading {
        background: linear-gradient(to right, #00A0FF, #E9304D);
        /* background-image: url(../../../static_assets/header_bg.jpg); */
        background-size: cover;
        color: white;
        text-align: center;
    }

    .view-account .col-md-3,
    .view-account .col-md-6 {
        padding-left: 0;
        padding-right: 0;
    }

    .view-account .col-md-3 div,
    .view-account .col-md-6 div {
        font-weight: 600;
    }

    .total-amount {
        padding: 7px 10px;
        width: fit-content;
        margin: auto;
        background: linear-gradient(to right, #00A0FF, #E9304D);
        /* background-image: url(../../../static_assets/header_bg.jpg); */
        background-size: cover;
        color: white;
    }

    .levels-parent {
        display: flex;
    }

    .levels {
        display: flex;
        /* justify-content: center; */
        align-items: center;
        background-color: #f4f4f4;
        flex-direction: column;
        text-align: center;
        padding: 0 !important;
        /* margin: 15px; */
    }

    .approved {
        color: white;
        background-color: #00b953;
        border-radius: 4px;
        padding: 3px 7px;
    }

    .pending {
        color: white;
        background-color: #ef810f;
        border-radius: 4px;
        padding: 3px 7px;
    }

    .rejected {
        color: white;
        background-color: #ff0000;
        border-radius: 4px;
        padding: 3px 7px;
    }

    table#view-more-table tr {
        display: none;
    }

    table#view-more-table tr.visible-row {
        display: table-row;
    }

    table#view-more-table tbody tr:hover {
        background-color: #ccc;
    }

    table#view-more-table td:hover {
        cursor: pointer;
    }

    select {
        border-radius: 0.375rem !important;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
<!-- Content Wrapper. Contains page content -->
<link href="{{asset('public/admin_assets/plugins/dataTables/jquery.dataTables.min.css')}}" rel="stylesheet">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Travel Report Form
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-solid">
                    <div class="box-header" style="border-bottom: 1px solid #f4f4f4">
                        <h3 class="box-title" style="color: #1976d2">
                            FILTER
                        </h3>
                    </div>
                    <form>
                        <div class="box-body form-sidechange form-decor" style="padding-bottom: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="year">Year</label>
                                        <select class="form-control" id="year">
                                            <option value="" disabled selected> Select Year </option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-6" style="padding-left: 0; padding-right: 7px;">
                                            <label for="employee">Month</label>
                                            <select class="form-control" id="employee">
                                                <option value="" disabled selected> To </option>
                                                <option value="January"> January </option>
                                                <option value="February"> February </option>
                                                <option value="March"> March </option>
                                                <option value="April"> April </option>
                                                <option value="May">May</option>
                                                <option value="June"> June </option>
                                                <option value="July"> July </option>
                                                <option value="August"> August </option>
                                                <option value="September"> September </option>
                                                <option value="October"> October </option>
                                                <option value="November"> November </option>
                                                <option value="December"> December </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" style="padding-right: 0; padding-left: 7px;">
                                            <label for="" style="padding-bottom: 14px;"></label>
                                            <select class="form-control" id="employee">
                                                <option value="" disabled selected> To </option>
                                                <option value="January"> January </option>
                                                <option value="February"> February </option>
                                                <option value="March"> March </option>
                                                <option value="April"> April </option>
                                                <option value="May">May</option>
                                                <option value="June"> June </option>
                                                <option value="July"> July </option>
                                                <option value="August"> August </option>
                                                <option value="September"> September </option>
                                                <option value="October"> October </option>
                                                <option value="November"> November </option>
                                                <option value="December"> December </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        <select class="form-control" id="department">
                                            <option value="" disabled selected>Select Department</option>
                                            <option value="IT">IT</option>
                                            <option value="HR">HR</option>
                                            <option value="Sales">Sales</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="employee">Employee</label>
                                        <select class="form-control" id="employee">
                                            <option value="" disabled selected>Select Employee</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="preStatus">Pre approval Status</label>
                                        <select class="form-control" id="preStatus">
                                            <option value="" disabled selected>Select Employee</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="employee">Claim Status</label>
                                        <select class="form-control" id="employee">
                                            <option value="" disabled selected>Select Employee</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box box-solid" style="padding-bottom: 5px">
                    <div class="box-header" style="border-bottom: 1px solid #f4f4f4; justify-content: space-between;">
                        <h3 class="box-title" style="color: #1976d2; flex: 1">
                            NUMBER OF TRAVEL REQUESTED
                        </h3>
                        <div style="flex: 1">
                            <div class="info-amount" style="margin: 0 5px">
                                <span style="vertical-align: middle; padding: 0 5px;">
                                    Total pre approval amount
                                </span>
                                <span style=" background-color: #1976d2; color: white; padding: 4px; vertical-align: middle;">
                                    12
                                </span>
                            </div>
                            <div class="info-amount" style="margin: 0 5px">
                                <span style="vertical-align: middle; padding: 0 5px;">
                                    Total claim amount
                                </span>
                                <span style=" background-color: #1976d2; color: white; padding: 4px; vertical-align: middle;">
                                    12
                                </span>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary" id="view-graph" data-fancybox="dialog" data-src="#graphs" data-preload="true" style=" background-color: #1976d2; margin: 0 5px;">
                                View Graph
                            </button>
                            <button type="submit" class="btn btn-primary" style="background-color: #1976d2; margin: 0 5px;">
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="box-body" style="padding-bottom: 0;">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="view-more-table" class="table table-bordered table-striped">
                                    <thead class="table-heading-style">
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Travel Code</th>
                                            <th>Claim Code</th>
                                            <th>Preapproval Amount</th>
                                            <th>Rejected By</th>
                                            <th>Requested By</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>21321</td>
                                            <td>51421</td>
                                            <td>5040</td>
                                            <td>Anil Verma</td>
                                            <td>Deepak</td>
                                            <td>Approved</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>21322</td>
                                            <td>51422</td>
                                            <td>6040</td>
                                            <td>Anil Verma</td>
                                            <td>Deepak</td>
                                            <td>Pending</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>21323</td>
                                            <td>51423</td>
                                            <td>7040</td>
                                            <td>Anil Verma</td>
                                            <td>Deepak</td>
                                            <td>Pending</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer form-sidechange apply-leave-btn text-center" style="border: none; padding-top: 0; padding-bottom: 20px;">
                        <p class="view-more">
                            <span class="view-more-btn">View More</span>
                        </p>
                    </div>
                    <div class="box box-solid border-custom" id="travel-status" style=" border: 1px solid #1976d2; margin: 0px 10px 20px; width: auto; display: none;">
                        <div class="box-header" style="border-bottom: 1px solid #f4f4f4">
                            <h3 class="box-title" id="travel-code" style="flex: 1; font-weight: 600">
                                Travel Purpose Here (21321)
                            </h3>
                            <button type="button" class="btn btn-default" style=" background-color: #4e4e4e; color: white; height: 30px; width: 30px; border-radius: 50%; padding: 0; margin: 0; display: flex; justify-content: center; align-items: center;" aria-label="center;">
                                <span class="glyphicon glyphicon-remove" id="travel-status-close" style="font-size: medium"></span>
                            </button>
                        </div>
                        <div class="box-header" style=" padding-top: 20px; padding-bottom: 0;">
                            <h3 class="box-title">
                                Itenary Details
                            </h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="" class="table table-bordered table-striped" style="table-layout: fixed">
                                        <thead class="table-heading-style">
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Date</th>
                                                <th>City (From)</th>
                                                <th>City (To)</th>
                                                <th>Conveyance</th>
                                                <th>Distance (in KM)</th>
                                                <th>Expected Cost (Pre Approval)</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="travel-status-date">01/01/2023</td>
                                                <td class="travel-status-city-from">Mohali</td>
                                                <td class="travel-status-city-to">Jalandhar</td>
                                                <td>Bus</td>
                                                <td>15</td>
                                                <td>1234</td>
                                                <td>1234</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="travel-status-date">01/01/2023</td>
                                                <td class="travel-status-city-from">Mohali</td>
                                                <td class="travel-status-city-to">Jalandhar</td>
                                                <td>Bus</td>
                                                <td>15</td>
                                                <td>1234</td>
                                                <td>1234</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="table-heading-style">
                                            <tr>
                                                <th colspan="6"></th>
                                                <th>Total Approved Amount</th>
                                                <th>2468</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="box-header" style=" padding-top: 20px; padding-bottom: 0; ">
                            <h3 class="box-title" style="flex: 1">
                                Approval Recommendation Status
                            </h3>
                            <h3 class="box-title" style="font-style: italic">
                                Travel Created on: 01/01/2023
                            </h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="" class="table table-bordered table-striped" style="table-layout: fixed">
                                        <thead class="table-heading-style">
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>Remarks</th>
                                                <th>Status</th>
                                                <th>Received On</th>
                                                <th>Updated On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Navdeep</td>
                                                <td>EPFO Visit</td>
                                                <td>Approved</td>
                                                <td>01/01/2023</td>
                                                <td>01/01/2023</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-solid border-custom" id="claim-status" style=" border: 1px solid #1976d2; margin: 0px 10px 20px; width: auto; display: none;">
                        <div class="box-header" style="border-bottom: 1px solid #f4f4f4">
                            <h3 class="box-title"  id="claim-code" style="flex: 1; font-weight: 600">
                                Claim Code - 51421
                            </h3>
                            <button type="button" class="btn btn-default" style=" background-color: #4e4e4e; color: white; height: 30px; width: 30px; border-radius: 50%; padding: 0; margin: 0; display: flex; justify-content: center; align-items: center; " aria-label="center;">
                                <span class="glyphicon glyphicon-remove" id="claim-status-close" style="font-size: medium"></span>
                            </button>
                        </div>
                        <div class="box box-solid border-custom" style=" border: 1px solid #f4f4f4; margin: 15px 10px 20px; width: auto; ">
                            <div class="box-header" style=" border-bottom: 1px solid #f4f4f4; ">
                                <h3 class="box-title" style=" flex: 1; font-weight: 600; ">
                                    View Basic And Account Details
                                </h3>
                                <span class="glyphicon glyphicon-chevron-up" id="view_account" aria-hidden="true"></span>
                            </div>
                            <div class="box-body view-account">
                                <div class="col-md-9">
                                    <div class="view-account-heading">
                                        Basic Details
                                    </div>
                                    <div class="col-md-3">
                                        <div>Name</div>
                                        <div>Employee Code</div>
                                        <div>Designation</div>
                                        <div>Bank Name</div>
                                        <div>Account No</div>
                                        <div>IFSC Code</div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>Mr Deepak Kumar</div>
                                        <div>50403</div>
                                        <div>Executive</div>
                                        <div>State Bank of India</div>
                                        <div>20500458112</div>
                                        <div>SBIN0017918</div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>Travel Category</div>
                                        <div>Approved By</div>
                                        <div>Payment Status</div>
                                        <div>UTR No.</div>
                                        <div>Payment Date</div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>Compliance</div>
                                        <div>Mr Navdeep Singh</div>
                                        <div>New</div>
                                        <div>--</div>
                                        <div>--</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="view-account-heading">
                                        Account Details
                                    </div>
                                    <div class="col-md-6">
                                        <div>Travel Amount</div>
                                        <div>
                                            Travel Stay Amount
                                        </div>
                                        <div>Imprest Amount</div>
                                    </div>
                                    <div class="col-md-6" style="text-align: right">
                                        <div>Rs. 78.00</div>
                                        <div>Rs. 0.00</div>
                                        <div>--</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-header" style="padding-top: 20px; padding-bottom: 0;">
                            <h3 class="box-title">
                                Itenary Details
                            </h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="" class="table table-bordered table-striped" style="table-layout: fixed">
                                        <thead class="table-heading-style">
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Date</th>
                                                <th>City (From)</th>
                                                <th>City (To)</th>
                                                <th>Expense Type</th>
                                                <th>Distance (in KM)</th>
                                                <th>Description</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="travel-status-date">01/01/2023</td>
                                                <td class="travel-status-city-from">Mohali</td>
                                                <td class="travel-status-city-to">Jalandhar</td>
                                                <td>Two Wheeler (Rs 3/km)</td>
                                                <td>15</td>
                                                <td>Description here</td>
                                                <td>1234</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="travel-status-date">01/01/2023</td>
                                                <td class="travel-status-city-from">Mohali</td>
                                                <td class="travel-status-city-to">Jalandhar</td>
                                                <td>Bus</td>
                                                <td>15</td>
                                                <td>Description here</td>
                                                <td>1234</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="table-heading-style">
                                            <tr>
                                                <th colspan="6"></th>
                                                <th>Total Amount</th>
                                                <th>2468</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <h4 class="total-amount">
                                        Total Claimed Amount: Rs
                                        2468.00
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="box-header" style=" align-items: initial; flex-direction: column;">
                            <div class="levels-parent" style="margin-bottom: 20px">
                                <div class="col-md-3 levels" style="margin: 0 5px 0 0">
                                    <h3 title="box-title">
                                        Level: HOD
                                    </h3>
                                    <span class="approved">Approved</span>
                                    <span style="margin: 10px">
                                        <span>Created At:</span>
                                        <br />
                                        <span>11/01/2023 11:45am</span>
                                    </span>
                                </div>
                                <div class="col-md-3 levels" style="margin: 0 5px">
                                    <h3 title="box-title">
                                        Level: Audit
                                    </h3>
                                    <span class="pending">Pending</span>
                                    <span style="margin: 10px">
                                        --
                                    </span>
                                </div>
                                <div class="col-md-3 levels" style="margin: 0 5px">
                                    <h3 title="box-title">
                                        Level: Authority
                                    </h3>
                                    <span class="rejected">Rejected</span>
                                    <span style="margin: 10px">
                                        --
                                    </span>
                                </div>
                                <div class="col-md-3 levels" style="margin: 0 0 0 5px">
                                    <h3 title="box-title">
                                        Level: Payee
                                    </h3>
                                    <span class="pending">Pending</span>
                                    <span style="margin: 10px">
                                        <span>Created At:</span>
                                        <br />
                                        <span>11/01/2023 11:45am</span>
                                    </span>
                                </div>
                            </div>
                            <div class="levels-parent">
                                <div class="col-md-6 levels" style=" margin: 0 5px 0 0; min-height: 145px; justify-content: center;">
                                    <h3>Comments</h3>
                                </div>
                                <div class="col-md-6 levels" style="margin: 0 0 0 5px; min-height: 145px; justify-content: center;">
                                    <h3>Travel Logs</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="graphs" style="display: none; grid-gap: 50px; flex-direction: row;">
                <div style="width: 600px;">
                    <canvas id="myfirstchart"></canvas>
                </div>
                <div style="width: 600px;">
                    <canvas id="mysecondchart"></canvas>
                </div>
            </div>
        </div>
        <!-- /.box -->
        <!-- /.row -->
        <!-- Main row -->
    </section>
    <!-- /.content -->
    <!-- /.modal -->
</div>
<!-- /.content-wrapper -->
<script src="{{ asset('public/admin_assets/bower_components/chartjs/chart.js') }}"></script>
<script src="{{asset('public/admin_assets/plugins/validations/jquery.validate.js')}}"></script>
<script src="{{asset('public/admin_assets/plugins/validations/additional-methods.js')}}"></script>
<script src="{{asset('public/admin_assets/plugins/dataTables/jquery.dataTables.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#basic-datatable').DataTable({
            scrollX: "100%"
        });

        $("#travelReportForm").validate({
            ignore: ':hidden,input[type=hidden],.select2-search__field', //  [type="search"]
            errorElement: 'span',
            errorPlacement: function(error, element) {
                if (element.attr("name") == "isclient") {
                    error.appendTo(".travel-input-box-client");
                } else if (element.hasClass('select2')) {
                    error.insertAfter(element.next('span.select2'));
                } else if (element.is(":radio")) {
                    error.insertAfter(element.parent().next());
                } else {
                    error.appendTo(element.parent()); // error.insertAfter(element);
                }
            },
            rules: {
                "year": {
                    required: true,
                },
                "month": {
                    required: true,
                },
                "pre_approval_status": {
                    required: true,
                }
            },
            messages: {
                "year": {
                    required: 'Select year',
                },
                "month": {
                    required: 'Select month',
                },
                "pre_approval_status": {
                    required: 'Select status',
                }
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script type="text/javascript">
    var originalLength = 3;

    $('table#view-more-table tr:lt(' + originalLength + ')').addClass(
        'visible-row'
    );
    var rowCount = $('table tr').length;

    var hidden = true;
    var $table = $('table').find('tbody');
    $('.view-more-btn').on('click', function(e) {
        e.preventDefault();
        if (hidden) {
            // first on click, it is hidden, so expand
            $table.find('tr:lt(' + rowCount + ')').hide();
            $table.find('tr:lt(' + rowCount + ')').show();
            $(this).html('View less'); //change html
        } else {
            $table.find('tr:lt(' + rowCount + ')').hide();
            $table.find('tr:lt(' + (originalLength - 1) + ')').show();
            $(this).html('View More'); //change html
        }
        hidden = !hidden;
    });

    $('#view_account').click(() => {
        $('.view-account').slideToggle(() => {
            console.log($('#view_account').is(':visible'));
            if ($('.view-account').is(':visible')) {
                $('#view_account').addClass('glyphicon-chevron-up');
                $('#view_account').removeClass('glyphicon-chevron-down');
            } else {
                $('#view_account').addClass('glyphicon-chevron-down');
                $('#view_account').removeClass('glyphicon-chevron-up');
            }
        });
    });

    (async function() {
        const data = [{
                month: 'Jan',
                value: 280
            },
            {
                month: 'Feb',
                value: 170
            },
            {
                month: 'Mar',
                value: 650
            },
            {
                month: 'Apr',
                value: 850
            },
            {
                month: 'May',
                value: 650
            },
            {
                month: 'Jun',
                value: 280
            },
            {
                month: 'Jul',
                value: 100
            },
            {
                month: 'Aug',
                value: 230
            },
            {
                month: 'Sep',
                value: 950
            },
            {
                month: 'Oct',
                value: 250
            },
            {
                month: 'Nov',
                value: 450
            },
            {
                month: 'Dec',
                value: 300
            },
        ];

        new Chart(document.getElementById('myfirstchart'), {
            type: 'bar',
            data: {
                labels: data.map((row) => row.month),
                datasets: [{
                    label: 'Months',
                    data: data.map((row) => row.value),
                    backgroundColor: '#1976d2',
                    borderColor: '#1976d2',
                }, ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: (value, index, values) => {
                                return `${value}`;
                            },
                        },
                    }],
                },
                title: {
                    display: true,
                    text: 'Pre Approval Amount',
                    position: 'left',
                },
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 0,
                        fontStyle: 'bold',
                    },
                },
            },
        });
    })();

    (async function() {
        const data = [{
                month: 'Jan',
                value: 280
            },
            {
                month: 'Feb',
                value: 170
            },
            {
                month: 'Mar',
                value: 650
            },
            {
                month: 'Apr',
                value: 850
            },
            {
                month: 'May',
                value: 650
            },
            {
                month: 'Jun',
                value: 280
            },
            {
                month: 'Jul',
                value: 100
            },
            {
                month: 'Aug',
                value: 230
            },
            {
                month: 'Sep',
                value: 950
            },
            {
                month: 'Oct',
                value: 250
            },
            {
                month: 'Nov',
                value: 450
            },
            {
                month: 'Dec',
                value: 300
            },
        ];

        new Chart(document.getElementById('mysecondchart'), {
            type: 'bar',
            data: {
                labels: data.map((row) => row.month),
                datasets: [{
                    label: 'Months',
                    data: data.map((row) => row.value),
                    backgroundColor: '#1976d2',
                    borderColor: '#1976d2',
                }, ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: (value, index, values) => {
                                return `${value}`;
                            },
                        },
                    }],
                },
                title: {
                    display: true,
                    text: 'Claim Amount',
                    position: 'left',
                },
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 0,
                        fontStyle: 'bold',
                    },
                },
            },
        });
    })();

    $('table#view-more-table').find('td').click(function() {
        var currentRow = $(this).closest('tr');
        var col1 = currentRow.find('td:eq(0)').html();
        var col2 = currentRow.find('td:eq(1)').html();
        var col3 = currentRow.find('td:eq(2)').html();
        console.log(col1, col2, col3);
        $('#travel-code').text(`Travel Purpose Here (${col2})`);
        $('#claim-code').text(`Claim Code - ${col3}`);
        $('#travel-status').css('display', 'block');
        $('#claim-status').css('display', 'block');
        if (col1 === '1') {
            $('.travel-status-date').text('01/01/2023');
            $('.travel-status-city-from').text('Mohali');
            $('.travel-status-city-to').text('Jalandhar');
        } else if (col1 === '2') {
            $('.travel-status-date').text('06/01/2023');
            $('.travel-status-city-from').text('Chandigarh');
            $('.travel-status-city-to').text('Delhi');
        } else {
            $('.travel-status-date').text('10/01/2023');
            $('.travel-status-city-from').text('Ludhiana');
            $('.travel-status-city-to').text('Amritsar');
        }
    });

    $('#travel-status-close').click(function() {
        $('#travel-status').css('display', 'none');
    })
    $('#claim-status-close').click(function() {
        $('#claim-status').css('display', 'none');
    })
</script>
@endsection