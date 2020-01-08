@extends('layouts.backend.app')
@section('title','post')
@push('custom-css')
<link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@endpush
@section('content')
    
<div class="container-fluid">
    <div class="block-header">
    <a class="btn btn-primary waves-effect" href="{{ route('author.post.create') }}">
        <i class="material-icon">add</i>
        <span>New Post</span>
    </a>
    </div>
    <!-- Basic Examples -->
 
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Post List 
                    </h2>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <ul class="header-dropdown m-r--5">
                        Total Post : {{$post->count()}}
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>title</th>
                                    <th>Aurhor</th>
                                    <th>View</th>
                                    <th>Is Approve</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Update at</th>
                                    {{-- <th>Category</th> --}}
                                    <th>show</th>
                                    <th>Edit</th>
                                    <th>post</th>
                                </tr>

                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>title</th>
                                    <th>Aurhor</th>
                                    <th>View</th>
                                    <th>Is Approve</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Update at</th>
                                    {{-- <th>Category</th> --}}
                                    <th>show</th>
                                    <th>Edit</th>
                                    <th>post</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($post as $key=>$post) 
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ Str::limit($post->title, 30) }}</td>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{$post->View_vount}}</td>
                                        <td>
                                            @if($post->is_approved== true)
                                                <span class="badge bg-blue">Approved</span>
                                            
                                            @else
                                                <span class="badge bg-pink">Pending</span>
                                            
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->status== true)
                                                <span class="badge bg-blue">Approved</span>
                                            
                                            @else
                                                <span class="badge bg-pink">Pending</span>
                                            
                                            @endif 
                                        </td>
                                        <td>{{$post->created_at}}</td>
                                        <td>{{$post->updated_at}}</td>
                                         {{-- <td>{{$post->categories->image}}</td> --}}
                                        
                                        <td>
                                                <a href="{{ route('author.post.show',$post->id) }}" class="btn btn-info waves-effect">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                        </td>
                                        <td>
                                                
                                            <a class=" btn btn-info waves-effect" href="{{ route('author.post.edit' , $post->id) }}">
                                            <i class="material-icons"> edit</i>
                                           </a>
                                        </td>
                                        <td>
                                        <form action="{{ route('author.post.destroy' , $post->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="myFunction()">
                                                <i class="material-icons">delete</i>
        
                                            </button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->

</div>
@endsection
@push('js')
       <!-- Jquery DataTable Plugin Js -->
       <script>
            function myFunction() {
              confirm("are you sure you want to delete it !");
            }
            </script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
       <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
@endpush

