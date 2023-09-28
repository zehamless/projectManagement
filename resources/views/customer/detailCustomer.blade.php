@extends('template.index')

@section('content')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8">

                    {{-- card table milestones --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row table-title">
                                <div class="col-sm-8">
                                    <h4 class="mt-0 header-title">Customer Contacts</h4>
                                </div>
                                <div class="col-sm-4 text-end">
                                    <a href="" class="btn btn-addItems w-md waves-effect waves-light mb-3"><i
                                            class="mdi mdi-plus" title="Menambahkan milestone"></i>Add Customer
                                        Contact</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Number</th>
                                            <th class="text-center" width="100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="4" align="center">Belum ada data customer contact</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- card table production cost --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row table-title">
                                <div class="col-12">
                                    <h4 class="mt-0 header-title">Related Projects</h4>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>SO Number</th>
                                            <th>Project Name</th>
                                            <th>Location</th>
                                            <th class="text-center" width="100">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="5" align="center">Belum ada project</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div><!-- end col-->

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <h4 class="mt-0 header-title">PT. ABC DEF</h4>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <p class="title-text">Customer Contacts Total</p>
                                                <p class="details-text">5</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <p class="title-text">Related Projects Total</p>
                                                <p class="details-text">14</p>
                                            </th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div><!-- end col-->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>
@endsection

{{-- script js halaman detail project --}}
@section('pageScript')
@endsection