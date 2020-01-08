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
<section class="home">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="customslidecss">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" >
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      @foreach ($slider->take(4) as $item)
                        <div class="item @if($loop->first) active @endif">
                        <img src="/storage/slider/{{$item->image}}" alt="Los Angeles" style="width:100%;">
                        <div class="carousel-caption">
                        {{$item->title}}
                          </div>  
                          </div>
                        @endforeach
                    </div>
                
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>   
                
        </div>
      </div>
    </div>
</section> 
<section class="home">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                  <h4 class="font-italic">About</h4>
                </div>
                <div class="card-body">
                  @foreach ($about_card as $item)
                  
                  <h3 class="card-title">{{$item->title}}</h3>
                  <p class="card-text text-justify">{!!$item->body!!}</p>
                  
                  <a href="{{ url('category') }}/About-Us" class="btn btn-primary"> Know More</a>
                  @endforeach
                </div>
              </div>
        </div>
    </div>
  </section>
<section class="">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            @foreach ($post as $key=>$post)
                    <article class="article col-md-6">
                        <div class="inner">
                          <figure>
                            <a href="{{ route('post.details',$post->slug) }}">
                              <img src="/storage/post/{{$post->image}}" alt="{{$post->slug}}">
                            </a>
                          </figure>
                          <div class="padding">
                            <div class="detail">
                              <div class="time">{{$post->created_at}}</div>
                              <div class="category"><a href="category.html">{{$post->user->name}}</a></div>
                            </div>
                            <h2><a href="{{ route('post.details',$post->slug) }}">{{ Str::limit($post->title, 30) }}</a></h2>
                            {{-- <p>{!! Str::limit($post->body, 15) !!}</p> --}}
                            <footer>

                            {{-- <a href="" class="love">
                              <i class="ion-android-favorite-outline"></i>
                               <div>{{ $post->favorite_to_users->count() }}
                                </div>
                              </a> --}}
                              @guest
                              <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                  closeButton: true,
                                  progressBar: true,
                              })"><i class="ion-android-favorite-outline"></i>{{ $post->favorite_to_users->count() }}</a>
                          @else
                              <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"
                                 class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="ion-android-favorite-outline"></i>{{ $post->favorite_to_users->count() }}</a>

                              <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('post.favorite',$post->id) }}" style="display: none;">
                                  @csrf
                              </form>
                          @endguest
                              <a class="btn btn-primary more" href="{{ route('post.details',$post->slug) }}">
                                <div>More</div>
                                <div><i class="ion-ios-arrow-thin-right"></i></div>
                              </a>
                            </footer>
                          </div>
                        </div>
                      </article>
                      @if ($key+1 == 16 )
                  
                      @break
                    
                    @endif
                  @endforeach
        </div>
        <div class="col-xs-6 col-md-4 sidebar" id="sidebar">
            <div class="tab-content">
								<div class="tab-pane active" id="recomended">
									<article class="article-fw">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="/storage/aboutsite/{{$about_bm->image}}" alt="{{$about_bm->title}}">
												</a>
											</figure>
											<div class="details">
												<div class="detail">
													<div class="time"></div>
													<div class="category"><a href="category.html">{{$about_bm->title}}</a></div>
												</div>
												<h1><a href="single.html">{{$about_bm->title}}</a></h1>
									
                            {!! Str::limit($about_bm->body, 250) !!}
												
											</div>
										</div>
                  </article>
                  <article class="article-fw">
                      <div class="inner">
                        <figure>
                          <a href="single.html">
                            <img src="/storage/aboutsite/{{$president->image}}" alt="{{$president->title}}">
                          </a>
                        </figure>
                        <div class="details">
                          <div class="detail">
                            <div class="time"></div>
                            <div class="category"><a href="category.html">{{$president->title}}</a></div>
                          </div>
                          <h1><a href="single.html">{{$president->title}}</a></h1>
                    
                              {!! Str::limit($president->body, 250) !!}
                          
                        </div>
                      </div>
                    </article>

									<div class="line"></div>
									

								
								</div>
								
							</div>
        </div>
      </div>
    </div>
  </section> 



@endsection
@push('custom-js')
    
@endpush