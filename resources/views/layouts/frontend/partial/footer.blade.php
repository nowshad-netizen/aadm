		<!-- Start footer -->
		<footer class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="block">
                <h1 class="block-title">Company Info</h1>
                <div class="block-body">
                  <figure class="foot-logo">
                    
                  </figure>
                  <p class="brand-description">
                      Dept of Mathematics - AADM
                  </p>
                  <a href="page.html" class="btn btn-magz white">About Us <i class="ion-ios-arrow-thin-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="block">
                <h1 class="block-title">Popular Tags <div class="right"></div></h1>
                <div class="block-body">
                  <ul class="tags">
                    @foreach ($tag as $item)
                    
                    <li><a href="">{{$item->name}}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-6">
              <div class="block">
                <h1 class="block-title">Follow Us</h1>
                <div class="block-body">
                  <p>Follow us and stay in touch to get the latest news</p>
                  <ul class="social trp">
                    <li>
                      <a href="#" class="facebook">
                        <svg><rect width="0" height="0"/></svg>
                        <i class="ion-social-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="twitter">
                        <svg><rect width="0" height="0"/></svg>
                        <i class="ion-social-twitter-outline"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="youtube">
                        <svg><rect width="0" height="0"/></svg>
                        <i class="ion-social-youtube-outline"></i>
                      </a>

                  </ul>
                </div>
              </div>
              <div class="line"></div>
              <div class="block">
                <div class="block-body no-margin">
                  <ul class="footer-nav-horizontal">
                    <li><a href="{{ route('home')}} ">Home</a></li>
                    <li><a href="#">Partner</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="{{ url('category') }}/About-Us">About</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="copyright">
                COPYRIGHT &copy; 2019.
                <div>
                  Made with <i class="ion-heart"></i> by <a href="http://facebook.com/nowshad247">Nowshad</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>