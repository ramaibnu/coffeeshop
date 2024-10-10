@extends('app')
@section('content')
<div class="page-title">
    <div class="row mb-4">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data {{ $data['title'] }}</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Supplier</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header"><span class="fw-bold">List {{ $data['title'] }}</span>
                    <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#add-data">
                        Add Data
                    </button>
                </div>
                <section class="section">
                    <div class="card-body">

                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">Supplier Name</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Phone Number</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['suppliers'] as $supplier)
                                <tr>
                                    <td class="text-center">{{$supplier->supplier_name}}</td>
                                    <td class="text-center">{{$supplier->address}}</td>
                                    <td class="text-center">{{$supplier->phone_number}}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#edit-data{{$supplier->supplier_id}}">Edit</button>
                                        <form action="{{ route('supplier.delete', $supplier->supplier_id) }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="modal fade text-left" id="add-data" tabindex="-1"
                            role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Supplier Form</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form action="{{route('supplier.store')}}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <label>Supplier Name: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="supplier name"
                                                    class="form-control" name="supplier_name">
                                            </div>
                                            <label>Address: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="address"
                                                    class="form-control" name="address">
                                            </div>
                                            <label>Phone Number: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="phone number"
                                                    class="form-control" name="phone_number">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                            <button class="btn btn-primary ml-1" type="submit">Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @foreach($data['suppliers'] as $supplier)
                        <div class="modal fade text-left" id="edit-data{{$supplier->supplier_id}}" tabindex="-1"
                            role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Supplier Form</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form action="{{route('supplier.update',$supplier->supplier_id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <label>Supplier Name: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="supplier name"
                                                    class="form-control" value="{{ old('supplier_name') ? old('supplier_name') : $supplier->supplier_name }}" name="supplier_name">
                                            </div>
                                            <label>Address: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="address"
                                                    class="form-control" value="{{ old('address') ? old('address') : $supplier->address }}" name="address">
                                            </div>
                                            <label>Phone Number: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="phone number"
                                                    class="form-control" value="{{ old('phone_number') ? old('phone_number') : $supplier->phone_number }}" name="phone_number">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                            <button class="btn btn-primary ml-1" type="submit">Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
@endsection

@section('addon-script')
<script type="text/javascript">
    $(document).ready(function() {
        new DataTable("#table1");

    });

    $('.show_confirm').click(function(event) {

        var form = $(this).closest("form");

        var name = $(this).data("name");

        event.preventDefault();

        swal({

                title: `Are you sure to delete this data ?`,

                icon: "warning",

                buttons: true,

                dangerMode: true,

            })

            .then((willDelete) => {

                if (willDelete) {

                    form.submit();

                }

            });

    });
</script>
@endsection