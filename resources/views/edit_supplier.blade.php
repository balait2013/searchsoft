@extends('layouts.top')
@section('title','Edit Supplier')
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
                                <li class="breadcrumb-item active">Edit Supplier</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                              @if($errors->first()=='success')
                              <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> Supplier added successfully.
                              </div>
                              @endif
                              @if($errors->first()=='failed')
                              <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                <h3 class="text-danger"><i class="fa fa-cross-circle"></i> Success</h3> Supplier added successfully.
                              </div>
                              @endif
                                <!-- <h4 class="card-title">Sample Horizontal Form with Icons</h4>
                                <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form</h6> -->
                                <form class="form-horizontal p-t-20" method="post" action="{{url('edit-supplier')}}/{{ $data->sup_id }}">
                                  @csrf
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Supplier Name*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                                <input type="text" name="sup_name" class="form-control @error('sup_name') is-invalid @enderror" value="{{ $data->sup_name }}" required id="exampleInputuname3" placeholder="Enter Name">
                                                @error('sup_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Supplier Address*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-map-alt"></i></span></div>
                                                <textarea name="sup_address" class="form-control @error('sup_address') is-invalid @enderror" required placeholder="Enter Address">{{ $data->sup_address }}</textarea>
                                                @error('sup_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Supplier Mobile*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-mobile"></i></span></div>
                                                <input name="sup_mobile" type="text" class="form-control @error('sup_mobile') is-invalid @enderror" value="{{ $data->sup_mobile }}" required id="exampleInputEmail3" placeholder="Enter mobile">
                                                @error('sup_mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Supplier Email*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-email"></i></span></div>
                                                <input name="sup_email" type="email" class="form-control @error('sup_email') is-invalid @enderror" value="{{ $data->sup_email }}" required id="exampleInputEmail3" placeholder="Enter email">
                                                @error('sup_email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Supplier GST*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-shopping-cart"></i></span></div>
                                                <input name="sup_gst" type="text" class="form-control @error('sup_gst') is-invalid @enderror" value="{{ $data->sup_gst }}" required id="exampleInputEmail3" placeholder="Enter GST">
                                                @error('sup_gst')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Supplier Details</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-comment-alt"></i></span></div>
                                                <textarea name="sup_details" class="form-control @error('sup_details') is-invalid @enderror"  placeholder="Enter Details">{{ $data->sup_details }}</textarea>
                                                @error('sup_details')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-0">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
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
