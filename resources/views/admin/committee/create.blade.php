@extends('layouts.backend.app')
@section('title','post create')
@push('custom-css')
<link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush
@section('content')
    
<div class="container-fluid">
    <div class="block-header">
  
<!-- Vertical Layout | With Floating Label -->
<form action="{{ route('admin.committeemember.store')}}" method="POST" enctype="multipart/form-data">
<div class="row clearfix">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <div class="card">
            <div class="header">
                <h2>
                  Add committee members
                   
                </h2>
          
            </div>
            <div class="body">
           
                @csrf
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text"  class="form-control" name="name">
                            <label class="form-label">Name </label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text"  class="form-control" name="title">
                            <label class="form-label">Post title </label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="image">Featured Image</label>
                        <input type="file" name="image">
                    </div>
            
                
            </div>
            
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="card">
            <div class="header">
                <h2>
                   type
                   
                </h2>
          
            </div>
            <div class="body">
           
                @csrf
                   
                    <br>
                    <div class="form-line">
                        <label for="category">Select type</label>
                        <select name="type" class="form-control show-tick">
                            
                                <option value="present">Present Leaders</option>
                                <option value="previous">previous leaders</option>
                                <option value="past">past Leaders</option>
                                <option value="Funding">Funding Leaders</option>
                            
                           
                        </select>
                    </div>
                    <br>

                    <br>
                    <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.committeemember.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
            </div>
            
        </div>
    </div>
    
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                  about members
                   
                </h2>
          
            </div>
            <div class="body">
                <textarea id="tinymce" name="about"></textarea>
            </div>
            
        </div>
    </div>
</div>
<!-- Vertical Layout | With Floating Label -->
</form>
</div>
@endsection
@push('js')
     <!-- Select Plugin Js -->
     <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
     <!-- TinyMCE -->
     <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
     <script>
         $(function () {
             //TinyMCE
             tinymce.init({
                 selector: "textarea#tinymce",
                 theme: "modern",
                 height: 300,
                 plugins: [
                     'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                     'searchreplace wordcount visualblocks visualchars code fullscreen',
                     'insertdatetime media nonbreaking save table contextmenu directionality',
                     'emoticons template paste textcolor colorpicker textpattern imagetools'
                 ],
                 toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                 toolbar2: 'print preview media | forecolor backcolor emoticons',
                 image_advtab: true
             });
             tinymce.suffix = ".min";
             tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
         });
     </script>
@endpush

