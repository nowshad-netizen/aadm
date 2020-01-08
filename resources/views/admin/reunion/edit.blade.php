@extends('layouts.backend.app')
@section('title','category create')
@push('custom-css')

@endpush
@section('content')
    
<div class="container-fluid">
    <div class="block-header">
  
<!-- Vertical Layout | With Floating Label -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                   active {{$author->name}}
                   
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
          
            </div>
            <div class="body">

                <ul>
                <li>Name : {{$author->name}}</li>
                <li>Bangla Name: {{$author->bname}}</li>
                <li>{{$author->number}}</li>
                <li>Fee Number : {{ Str::limit($author->fee_number, 11) }}</li>
                </ul>
            <form action="{{ route('admin.author.update',$author->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="fee_type"> Membership Fee received in</label>
                    
  
                <select name="fee_type" type="text">
                   <option value="Bkash">Bkash</option>
                   <option value="DBBL">DBBL</option>
                   <option value="Nogod">Nagod</option>
                   <option value="Other">other</option>
                 </select>
<br>
                    <label for="bank_number">Type account Number /number</label>

                    <input type="tel" name="bank_number" placeholder="Type your account Number" required>
                    <br>
                    <label for="Bank_trxid">Yor Transaction ID / TRXID </label>

                    <input type="text" name="bank_trxid" placeholder="Yor Transaction ID / TRXID " required>
                    <br>
                    <label for="role_id"> admin position</label>

                    <select name="role_id" type="text">
                           
                        <option value="2">author</option>
                        <option value="2">author</option>
                        
                          </select>


                        <input type="hidden" value="{{ Auth::user()->name}}" name="authname">
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Vertical Layout | With Floating Label -->

</div>
@endsection
@push('js')
    
@endpush

