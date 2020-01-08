@extends('layouts.frontend.app')
@section('title')
   
@endsection


@section('containt')

<section class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
          <ol class="breadcrumb">
          <li><a href="">{{ url('category') }}/{{$category->slug}}</a></li>
            <li class="active">{{$category->name}}</li>
          </ol>
                    <h1 class="page-title">{{$category->name}}</h1>
                    <p class="page-subtitle"></p>
                    <div class="line thin"></div>
                    <div class="page-description">
                        @if($posts->count()>0 )
                        @foreach ($posts as $item)

                        <h4>{{$item->title}}</h4>
                        {{$item->body}}
                        
                            
                        @endforeach
                        @else
                            <p>No post Found</p>
                        @endif
                        <div class="question">
                            Have a question? <a href="#" class="btn btn-primary">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('custom-js')
    
@endpush