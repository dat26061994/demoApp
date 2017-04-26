@extends('layouts.admin')
@section('content')
        <!-- Page Content -->
<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <h1 class="page-header">Admin
                    <small>List</small>
                </h1>

            @if(Session::has('flash_message'))
                <div class="alert alert-{!! Session::get('flash_level') !!}">
                    {!! Session::get('flash_message') !!}
                </div>
                @endif
                        <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Delete</th>
                        <th>Edit</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 0; ?>
                    @foreach($admin as $item)
                        <?php $stt++ ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{ $stt }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>


                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                        href="{!! URL::route('admin.getDelete',$item->id) !!}"
                                        onclick="return deleteConfirm('Do you want tho delete ??')"> Delete</a></td>

                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="{!! URL::route('admin.getEdit',$item->id) !!}">Edit</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection