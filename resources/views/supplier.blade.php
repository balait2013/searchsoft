@extends('layouts.top')
@section('title','Suppliers')
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
                                <li class="breadcrumb-item active">Suppliers</li>
                            </ol>
                            <a href="{{url('add-supplier')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Muted Table</h4>
                                <div class="row p-t-20">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">First Name</label>
            <input type="text" id="firstName" class="form-control" placeholder="John doe">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Last Name</label>
            <input type="text" id="lastName" class="form-control" placeholder="12n">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">&nbsp;</label>
            <button type="submit" class="btn btn-success m-t-30"> <i class="fa fa-search"></i> Search</button>
        </div>
    </div>
    <!--/span-->
</div>
                                <div class="table-responsive">
                                    <table class="table color-table info-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>GST no</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $i=1;?>
                                          @foreach($data as $res)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$res->sup_id}}</td>
                                                <td>{{$res->sup_name}}</td>
                                                <td>{{$res->sup_mobile}}</td>
                                                <td>{{$res->sup_email}}</td>
                                                <td>{{$res->sup_gst}}</td>
                                                <td>
                                                  <a href="{{url('view-supplier')}}/{{$res->sup_id}}" class="text-dark" title="view"><i class="fa fa-eye"></i></a>
                                                  <a href="{{url('edit-supplier')}}/{{$res->sup_id}}" class="text-success" title="edit"><i class="fa fa-edit"></i></a>
                                                  <a href="javascript:void(0)" class="text-danger" data-toggle="modal" data-target=".{{$res->sup_id}}"><i class="fa fa-trash" title="delete"></i></a>
                                                </td>
                                            </tr>
      <div class="modal {{$res->sup_id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="mySmallModalLabel">are you sure delete?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body text-right">
                        <a href="{{url('delete-supplier')}}/{{$res->sup_id}}" class="btn waves-effect waves-light btn-success">Yes</a>
                        <button type="button" class="btn waves-effect waves-light btn-danger" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
                                          <?php $i++;?>
                                         @endforeach
                                        </tbody>
                                        <tfoot>
                                          <tr><td colspan="6">{{ $data->links() }}</td></tr>
                                        </tfoot>
                                    </table>
                                </div>
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
