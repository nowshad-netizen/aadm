@extends('layouts.frontend.app')
@section('title')
   
@endsection


@section('containt')
  <section class="home">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">

            <div>Latest News</div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="row">
                  @foreach ($post as $key=>$post)
                    <article class="article col-md-6">
                        <div class="inner">
                          <figure>
                            <a href="{{ route('post.details',$post->slug) }}">
                              <img src="/storage/post/{{$post->image}}" alt="Sample Article">
                            </a>
                          </figure>
                          <div class="padding">
                            <div class="detail">
                              <div class="time">{{$post->created_at}}</div>
                              <div class="category"><a href="category.html">{{$post->user->name}}</a></div>
                            </div>
                            <h2><a href="{{ route('post.details',$post->slug) }}">{{ Str::limit($post->title, 30) }}</a></h2>
                            <p>{{ Str::limit($post->body, 45) }}</p>
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
                      @if ($key+1 == 6 )
                  
                      @break
                    
                    @endif
                  @endforeach
              </div>
            </div>
          </div>
          <div class="line top">
            <div>all Another News</div>
          </div>
          <div class="row">
            <article class="col-md-12 article-list">
              <div class="inner">
                <figure>
                  <a href="single.html">
                    <img src="images/news/img11.jpg" alt="Sample Article">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                      <a href="#">Film</a>
                    </div>
                    <div class="time">December 19, 2016</div>
                  </div>
                  <h1><a href="single.html">Donec consequat arcu at ultrices sodales quam erat aliquet diam</a></h1>
                  <p>
                  Donec consequat, arcu at ultrices sodales, quam erat aliquet diam, sit amet interdum libero nunc accumsan nisi.
                  </p>
                  <footer>
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>273</div></a>
                    <a class="btn btn-primary more" href="single.html">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
            <article class="col-md-12 article-list">
              <div class="inner">
                <div class="badge">
                  Sponsored
                </div>
                <figure>
                  <a href="single.html">
                    <img src="images/news/img02.jpg" alt="Sample Article">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                      <a href="#">Travel</a>
                    </div>
                    <div class="time">December 18, 2016</div>
                  </div>
                  <h1><a href="single.html">Maecenas accumsan tortor ut velit pharetra mollis</a></h1>
                  <p>
                    Maecenas accumsan tortor ut velit pharetra mollis. Proin eu nisl et arcu iaculis placerat sollicitudin ut est. In fringilla dui.
                  </p>
                  <footer>
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>4209</div></a>
                    <a class="btn btn-primary more" href="single.html">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
            <article class="col-md-12 article-list">
              <div class="inner">
                <figure>
                  <a href="single.html">
                    <img src="images/news/img03.jpg" alt="Sample Article">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                    <a href="#">Travel</a>
                    </div>
                    <div class="time">December 16, 2016</div>
                  </div>
                  <h1><a href="single.html">Nulla facilisis odio quis gravida vestibulum Proin venenatis pellentesque arcu</a></h1>
                  <p>
                    Nulla facilisis odio quis gravida vestibulum. Proin venenatis pellentesque arcu, ut mattis nulla placerat et.
                  </p>
                  <footer>
                    <a href="#" class="love active"><i class="ion-android-favorite"></i> <div>302</div></a>
                    <a class="btn btn-primary more" href="single.html">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
            <article class="col-md-12 article-list">
              <div class="inner">
                <figure>
                  <a href="single.html">
                    <img src="images/news/img09.jpg" alt="Sample Article">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                      <a href="#">Healthy</a>
                    </div>
                    <div class="time">December 16, 2016</div>
                  </div>
                  <h1><a href="single.html">Maecenas blandit ultricies lorem id tempor enim pulvinar at</a></h1>
                  <p>
                    Maecenas blandit ultricies lorem, id tempor enim pulvinar at. Curabitur sit amet tortor eu ipsum lacinia malesuada.
                  </p>
                  <footer>
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>783</div></a>
                    <a class="btn btn-primary more" href="single.html">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
          </div>
        </div>
        <div class="col-xs-6 col-md-4 sidebar" id="sidebar">
          <div class="sidebar-title for-tablet">Sidebar</div>

          <aside>
            <h1 class="aside-title">Pages <a href="#" class="all">See All <i class="ion-ios-arrow-right"></i></a></h1>
            <div class="aside-body">
                @foreach ($category as $key=>$category)
              <article class="article-mini">
                <div class="inner">
                  <figure>
                    <a href="single.html">
                      <img src="/storage/images/{{$category->image}}" alt="Sample Article">
                    </a>
                  </figure>
                  <div class="padding">
                  <h1><a href="single.html">{{$category->name}}</a></h1>
                  </div>
                </div>
              </article>
              @if ($key+1 == 10 )
              @break
            @endif
            @endforeach
            </div>
          </aside>
          {{-- <aside>
            <div class="aside-body">
              <form class="newsletter">
                <div class="icon">
                  <i class="ion-ios-email-outline"></i>
                  <h1>Newsletter</h1>
                </div>
                <div class="input-group">
                  <input type="email" class="form-control email" placeholder="Your mail">
                  <div class="input-group-btn">
                    <button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
                  </div>
                </div>
                <p>By subscribing you will receive new articles in your email.</p>
              </form>
            </div>
          </aside>
          <aside>
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active">
                <a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab">
                  <i class="ion-android-star-outline"></i> Recomended
                </a>
              </li>
              <li>
                <a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
                  <i class="ion-ios-chatboxes-outline"></i> Comments
                </a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="recomended">
                <article class="article-fw">
                  <div class="inner">
                    <figure>
                      <a href="single.html">
                        <img src="images/news/img16.jpg" alt="Sample Article">
                      </a>
                    </figure>
                    <div class="details">
                      <div class="detail">
                        <div class="time">December 31, 2016</div>
                        <div class="category"><a href="category.html">Sport</a></div>
                      </div>
                      <h1><a href="single.html">Donec congue turpis vitae mauris</a></h1>
                      <p>
                        Donec congue turpis vitae mauris condimentum luctus. Ut dictum neque at egestas convallis. 
                      </p>
                    </div>
                  </div>
                </article>
                <div class="line"></div>
                <article class="article-mini">
                  <div class="inner">
                    <figure>
                      <a href="single.html">
                        <img src="images/news/img05.jpg" alt="Sample Article">
                      </a>
                    </figure>
                    <div class="padding">
                      <h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
                      <div class="detail">
                        <div class="category"><a href="category.html">Lifestyle</a></div>
                        <div class="time">December 22, 2016</div>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="article-mini">
                  <div class="inner">
                    <figure>
                      <a href="single.html">
                        <img src="images/news/img02.jpg" alt="Sample Article">
                      </a>
                    </figure>
                    <div class="padding">
                      <h1><a href="single.html">Fusce ullamcorper elit at felis cursus suscipit</a></h1>
                      <div class="detail">
                        <div class="category"><a href="category.html">Travel</a></div>
                        <div class="time">December 21, 2016</div>
                      </div>
                    </div>
                  </div>
                </article>
                <article class="article-mini">
                  <div class="inner">
                    <figure>
                      <a href="single.html">
                        <img src="images/news/img10.jpg" alt="Sample Article">
                      </a>
                    </figure>
                    <div class="padding">
                      <h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
                      <div class="detail">
                        <div class="category"><a href="category.html">Healthy</a></div>
                        <div class="time">December 20, 2016</div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
              <div class="tab-pane comments" id="comments">
                <div class="comment-list sm">
                  <div class="item">
                    <div class="user">                                
                      <figure>
                        <img src="images/img01.jpg" alt="User Picture">
                      </figure>
                      <div class="details">
                        <h5 class="name">Mark Otto</h5>
                        <div class="time">24 Hours</div>
                        <div class="description">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="user">                                
                      <figure>
                        <img src="images/img01.jpg" alt="User Picture">
                      </figure>
                      <div class="details">
                        <h5 class="name">Mark Otto</h5>
                        <div class="time">24 Hours</div>
                        <div class="description">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="user">                                
                      <figure>
                        <img src="images/img01.jpg" alt="User Picture">
                      </figure>
                      <div class="details">
                        <h5 class="name">Mark Otto</h5>
                        <div class="time">24 Hours</div>
                        <div class="description">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </aside>
          <aside>
            <h1 class="aside-title">Videos
              <div class="carousel-nav" id="video-list-nav">
                <div class="prev"><i class="ion-ios-arrow-left"></i></div>
                <div class="next"><i class="ion-ios-arrow-right"></i></div>
              </div>
            </h1>
            <div class="aside-body">
              <ul class="video-list" data-youtube='"carousel":true, "nav": "#video-list-nav"'>
                <li><a data-youtube-id="SBjQ9tuuTJQ" data-action="magnific"></a></li>
                <li><a data-youtube-id="9cVJr3eQfXc" data-action="magnific"></a></li>
                <li><a data-youtube-id="DnGdoEa1tPg" data-action="magnific"></a></li>
              </ul>
            </div>
          </aside>
          <aside id="sponsored">
            <h1 class="aside-title">Sponsored</h1>
            <div class="aside-body">
              <ul class="sponsored">
                <li>
                  <a href="#">
                    <img src="images/sponsored.png" alt="Sponsored">
                  </a>
                </li> 
                <li>
                  <a href="#">
                    <img src="images/sponsored.png" alt="Sponsored">
                  </a>
                </li> 
                <li>
                  <a href="#">
                    <img src="images/sponsored.png" alt="Sponsored">
                  </a>
                </li> 
                <li>
                  <a href="#">
                    <img src="images/sponsored.png" alt="Sponsored">
                  </a>
                </li> 
              </ul>
            </div>
          </aside>  --}}
        </div>
      </div>
    </div>
  </section>

@endsection
@push('custom-js')
    
@endpush