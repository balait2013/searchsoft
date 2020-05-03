@extends('layouts.top')
@section('title','View Supplier')
<body class="skin-megna fixed-layout">
    @extends('layouts.loader')
    <div id="main-wrapper">
      @include('layouts.header')

      @extends('layouts.leftmenu')
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Suppliers</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{url('suppliers')}}">Suppliers</a></li>
                                <li class="breadcrumb-item active">View Supplier</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Sample Horizontal Form with Icons</h4>
                                <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form</h6> -->
                                <form class="form-horizontal p-t-20" method="post" action="javascript:void(0)">
                                  @csrf
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Supplier Name</label>
                                        <label for="exampleInputuname3" class="col-sm-9 control-label">{{ $data->sup_name }}</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Supplier Address</label>
                                        <label for="exampleInputuname3" class="col-sm-9 control-label">{{ $data->sup_address }}</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Supplier Mobile</label>
                                        <label for="exampleInputuname3" class="col-sm-9 control-label">{{ $data->sup_mobile }}</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Supplier Email</label>
                                        <label for="exampleInputuname3" class="col-sm-9 control-label">{{ $data->sup_email }}</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Supplier GST</label>
                                        <label for="exampleInputuname3" class="col-sm-9 control-label">{{ $data->sup_gst }}</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Supplier Details</label>
                                        <label for="exampleInputuname3" class="col-sm-9 control-label">{{ ($data->sup_details!='')?$data->sup_details:'-' }}</label>
                                    </div>


                                    <div class="form-group row m-b-0">
                                        <div class="offset-sm-3 col-sm-9">
                                            <a href="{{url('suppliers')}}" class="btn btn-success waves-effect waves-light">Back</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        @extends('layouts.footer')
    </div>
    @extends('layouts.bottom')
</body>

</html>
