@extends('layouts.frontend.app')
@section('title','Posts')

@section('containt')
<section class="single">
    <div class="container">
        <div class="row">
            <div class="col-md-4 sidebar" id="sidebar">
                <aside>

                </aside>
                <aside>
                    <h1 class="aside-title">Recent Post</h1>
                    <div class="aside-body">
                     @foreach ($randomposts as $item)
                        
                        <article class=" @if($loop->first)article-fw @endif article-mini ">
                                <div class="inner">
                                    <figure>
                                        <a href="{{ route('post.details',$post->slug) }}">
                                            <img src="/storage/post/{{$item->image}}">
<br>
                                        </a>
                                        <div class="time">{{$item->created_at}}</div>
                                    </figure>
                                    <div class="padding">
                                    <h1><a href="{{ route('post.details',$post->slug) }}">{{$item->title}}</a></h1>
                                        <div class="detail">
                                        <div class="category"><a href="category.html">{{$item->user->name}}</a></div>
                                            <div class="time">{{$item->created_at}}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="line"></div>
                            </article>
                            
                        @endforeach
                </aside>

            </div>
            <div class="col-md-8">
                <ol class="breadcrumb">
                  <li class="active">{{ $post->slug }}</li>
                
                </ol>
                <article class="article main-article">
                    <header>
                        <h1>{{ $post->title }}</h1>
                        <ul class="details">
                            <li>{{$post->created_at}}</li>
                            <li>By <a href="#">{{$post->user->name}}</a></li>
                        </ul>
                    </header>
                    <div class="main">
                        <div class="featured">
                            <figure>
                                <img src="/storage/post/{{$post->image}}" style="max-height:400px;">
                                <figcaption>Image by pexels.com</figcaption>
                            </figure>
                        </div>
                        <p>{!! $post->body !!}</p>
                    </div>
                    <footer>
                        <div class="col">
                            <ul class="tags">
                                @foreach ($post->tags as $item)
                                
                            <li><a href="#">{{$item->name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="col">
                                @guest
                                <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                    closeButton: true,
                                    progressBar: true,
                                })"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>
                            @else
                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"
                                   class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>

                                <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('post.favorite',$post->id) }}" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                            <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>{{ $post->favorite_to_users->count() }}</div></a>
                        </div>
                    </footer>
                </article>
                <div class="sharing">
                <div class="title"><i class="ion-android-share-alt"></i> Sharing is caring</div>
                    <ul class="social">
                        <li>
                            <a href="#" class="facebook">
                                <i class="ion-social-facebook"></i> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter">
                                <i class="ion-social-twitter"></i> Twitter
                            </a>
                        </li>
                        <li>
                            <a href="#" class="googleplus">
                                <i class="ion-social-googleplus"></i> Google+
                            </a>
                        </li>
                        <li>
                            <a href="#" class="linkedin">
                                <i class="ion-social-linkedin"></i> Linkedin
                            </a>
                        </li>
                        <li>
                            <a href="#" class="skype">
                                <i class="ion-ios-email-outline"></i> Email
                            </a>
                        </li>
                        <li class="count">
                            0
                            <div>Shares</div>
                        </li>
                    </ul>
                </div>
                <div class="line">
                    <div>Author</div>
                </div>
                <div class="author">
                    <figure>
                        <img src="/storage/profile/{{$post->user->image}}">
                    </figure>
                    <div class="details">
                        <div class="job">{{$post->user->about_job}}</div>
                        <h3 class="name">{{$post->user->name}}</h3>
                        <p>{{$post->user->about_job}}</p>
                        <ul class="social trp sm">
                            <li>
                                <a href="#" class="facebook">
                                    <svg><rect/></svg>
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter">
                                    <svg><rect/></svg>
                                    <i class="ion-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="youtube">
                                    <svg><rect/></svg>
                                    <i class="ion-social-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="googleplus">
                                    <svg><rect/></svg>
                                    <i class="ion-social-googleplus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="line thin"></div>
                
            </div>
        </div>
    </div>
</section>

@endsection
@push('custom-js')
    
@endpush