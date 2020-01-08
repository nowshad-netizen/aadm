@extends('layouts.frontend.app')
@section('title')

@push('custom-css')
    <style>
        .tales {
        width: 100%;
      }
      .carousel-inner{
        width:100%;
        max-height: 400px !important;
}
    </style>
@endpush
   
@endsection


@section('containt')

<section class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
          <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
            <li class="active">Contact Us</li>
          </ol>
                    <h1 class="page-title">Contact Us</h1>
                    <p class="page-subtitle">We hear you</p>
                    <div class="line thin"></div>
                    <div class="page-description">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                @foreach ($about_card as $item)
                                <h3>Contact</h3>
                                    {!!$item->body !!}
                                @endforeach
                                
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <form class="row contact" id="contact-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name <span class="required"></span></label>
                                            <input type="text" class="form-control" name="name" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email <span class="required"></span></label>
                                            <input type="text" class="form-control" name="email" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" class="form-control" name="subject">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Your message <span class="required"></span></label>
                                            <textarea class="form-control" name="message" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@push('custom-js')
    
@endpush