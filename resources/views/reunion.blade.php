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
.control:checked ~ .conditional,
			#immigrant:checked ~ .conditional,
			#required-2:checked ~ .conditional
			#option-2:checked ~ .conditional {
				clip: auto;
				height: auto;
				margin: 0;
				overflow: visible;
				position: static;
				width: auto;
			}

			.control:not(:checked) ~ .conditional,
			#immigrant:not(:checked) ~ .conditional,
			#required-2:not(:checked) ~ .conditional,
			#option-2:not(:checked) ~ .conditional {
				border: 0;
				clip: rect(0 0 0 0);
				height: 1px;
				margin: -1px;
				overflow: hidden;
				padding: 0;
				position: absolute;
				width: 1px;
			}
    </style>
@endpush
   
@endsection


@section('containt')
   <section style="display:none"></section>

<section class="login grey">
    <div class="container">
       <div class="row">
           <div class="col-md-2"></div>   
           <div class="col-md-8">
            
            <form action="{{ route('reunion.store')}}" method="POST">
                @csrf
            <ul>
                <li>
                    <label for="type">Type</label>
                    <select fot="type" >
                        <option value="Member"> Member</option>
                        <option value="Stunds"> Student</option>
                        <option value="Alumni"> Alumni</option>
                    </select>
                    @foreach ($errors->all() as $error)
            <ul>
                <li>{{ $error }}</li>
            </ul>    
            @endforeach
                </li>
                <li>
                <label for="name">Name</label>
                <input type="text" name="name" > 
                </li>
                <li>
                    <label for="type">Session</label>
                    <select fot="type" >
                        <option value="1990-1991"> 1990-1991</option>
<option value="1991-1992"> 1991-1992</option>
<option value="1992-1993"> 1992-1993</option>
<option value="1993-1994"> 1993-1994</option>
<option value="1994-1995"> 1994-1995</option>
<option value="1995-1996"> 1995-1996</option>
<option value="1996-1997"> 1996-1997</option>
<option value="1997-1998"> 1997-1998</option>
<option value="1998-1999"> 1998-1999</option>
<option value="1999-2000"> 1999-2000</option>
<option value="2000-2001"> 2000-2001</option>
<option value="2001-2002"> 2001-2002</option>
<option value="2002-2003"> 2002-2003</option>
<option value="2003-2004"> 2003-2004</option>
<option value="2004-2005"> 2004-2005</option>
<option value="2005-2006"> 2005-2006</option>
<option value="2006-2007"> 2006-2007</option>
<option value="2007-2008"> 2007-2008</option>
<option value="2008-2009"> 2008-2009</option>
<option value="2009-2010"> 2009-2010</option>
<option value="2010-2011"> 2010-2011</option>
<option value="2011-2012"> 2011-2012</option>
<option value="2012-2013"> 2012-2013</option>
<option value="2013-2014"> 2013-2014</option>
<option value="2014-2015"> 2014-2015</option>
<option value="2015-2016"> 2015-2016</option>
<option value="2016-2017"> 2016-2017</option>
<option value="2017-2018"> 2017-2018</option>
<option value="2018-2019"> 2018-2019</option>
<option value="2019-2020"> 2019-2020</option>
<option value="2020-2021"> 2020-2021</option>
                      
                    </select>
                    
                </li>
                
                <li>
                      <label for="emal">Email </label>
            <input type="email" name="email" >  
                </li>
                <li>
                     <label for="phone">Phone</label>
            <input type="tel" name="phone">
                </li>
                
            
            </ul>
            
          
            
            
            
            
            <fieldset>
				<ol>
                    <p><b>Will Your Spouse Come?</b></p>
					<li>
						<input type="radio" name="spouse_attend" value="no" id="citizen">
						<label for="citizen">No</label>
					</li>
					<li>
						<input type="radio" name="spouse_attend" value="yes" id="immigrant">
						<label for="immigrant">Yes</label>
						<fieldset class="conditional">
							<ol>
								<li>
									<label for="country_citizenship">Name</label>
									<input type="text" id="country_citizenship" name="spouse_name">
								</li>
								<li>
									<label for="visa_type">T-Shirt size</label>
									<select fot="type" >
                                       <option value="spouse_tshirt"> M</option>
                                        <option value="spouse_tshirt"> XL</option>
                                        <option value="spouse_shirt"> XXL</option>
                                    </select>
                                    
                                 </li>
                                
							</ol>
						</fieldset>
					</li>
				</ol>
			</fieldset>
             <fieldset>
				<ol>
                    <p><b>Kids Will Attend With You?</b></p>
					<li>
						<input type="radio" name="Kids" value="no" id="citizen">
						<label for="citizen">No</label>
					</li>
					<li>
						<input type="radio" name="Kids" value="yes" id="immigrant">
						<label for="immigrant">Yes</label>
						<fieldset class="conditional">
							<ol>
								<li>
                                    <label for="country_citizenship">Number</label>
                                    <ul>
                                        <li>
                                            
                                            
                                            <input type="radio" name="number" value="0" > 
                                            <label for="number">0</label>
                                            
                                        </li>    
                                        <li>
                                            <input type="radio" name="number" value="1" value="Immigrant" id="immigrant">
                                            <label for="number">1 Will Attend</label>
                                                <fieldset class="conditional">
                                                    <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                    
                                                </fieldset>    
                                            
                                        </li>
                                        <li>
                                            <input type="radio" name="number" value="2" value="Immigrant" id="immigrant">
                                            <label for="number">2 will attends</label>
                                            <fieldset class="conditional">
                                                    <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                    
                                                </fieldset> 
                                        </li>
                                        <li>
                                            <input type="radio" name="number" value="3" value="Immigrant" id="immigrant">
                                            <label for="number">3 will attends</label>
                                            <fieldset class="conditional">
                                                    <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                    
                                            </fieldset>
                                        </li>
                                        <li>
                                            <input type="radio" name="number" value="4" value="Immigrant" id="immigrant">
                                            <label for="number">4 will attends </label>
                                            <fieldset class="conditional">
                                                    <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                    
                                            </fieldset>
                                        </li>
                                        <li>
                                            <input type="radio" name="number" value="4" value="Immigrant" id="immigrant">
                                            <label for="number">5 will attends </label>
                                            <fieldset class="conditional">
                                                    <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                        <select fot="type" >
                                                            <option value="Member"> M</option>
                                                            <option value="Stunds"> XL</option>
                                                            <option value="Alumni"> XXL</option>
                                                        </select>
                                                    
                                            </fieldset>
                                        </li>
                                    </ul>
								</li>
							</ol>
						</fieldset>
					</li>
				</ol>
			</fieldset>
            <fieldset>
				<ol>
                    <p><b>Guest will attend with you?</b></p>
					<li>
						<input type="radio" name="guest" value="no" id="citizen">
						<label for="citizen">No</label>
					</li>
					<li>
						<input type="radio" name="guest" value="yes" id="immigrant">
						<label for="immigrant">Yes</label>
						<fieldset class="conditional">
							<ol>
								<li>
                                    <label for="country_citizenship">Select the Number of kids will attends</label>
                                    <ul>
                                        <li>
                                            
                                            
                                            <input type="radio" name="number" value="0" > 
                                            <label for="number">0</label>
                                            
                                        </li>    
                                        <li>
                                            <input type="radio" name="number" value="1" value="Immigrant" id="immigrant">
                                            <label for="number">1 Will Attend</label>
                                                <fieldset class="conditional">
                                                    <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                    
                                                </fieldset>    
                                            
                                        </li>
                                        <li>
                                            <input type="radio" name="number" value="2" value="Immigrant" id="immigrant">
                                            <label for="number">2 will attends</label>
                                            <fieldset class="conditional">
                                                    <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                    
                                                </fieldset> 
                                        </li>
                                        <li>
                                            <input type="radio" name="number" value="3" value="Immigrant" id="immigrant">
                                            <label for="number">3 will attends</label>
                                            <fieldset class="conditional">
                                                    <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                    
                                            </fieldset>
                                        </li>
                                        <li>
                                            <input type="radio" name="number" value="4" value="Immigrant" id="immigrant">
                                            <label for="number">4 will attends </label>
                                            <fieldset class="conditional">
                                                    <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                    
                                            </fieldset>
                                        </li>
                                        <li>
                                            <input type="radio" name="number" value="5" value="Immigrant" id="immigrant">
                                            <label for="number">5 will attends </label>
                                            <fieldset class="conditional">
                                                    <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                    <select fot="type" >
                                                        <option value="Member"> M</option>
                                                        <option value="Stunds"> XL</option>
                                                        <option value="Alumni"> XXL</option>
                                                    </select>
                                                <hr>
                                                <label for="visa_type">T-Shirt size</label>
                                                        <select fot="type" >
                                                            <option value="Member"> M</option>
                                                            <option value="Stunds"> XL</option>
                                                            <option value="Alumni"> XXL</option>
                                                        </select>
                                                    
                                            </fieldset>
                                        </li>
                                    </ul>
								</li>
							</ol>
						</fieldset>
					</li>
				</ol>
			</fieldset>
 <button type="submit">Submit</button>
            
            
						
           
                            
        
        </form>
           
                <input type="text" name="member_type" placeholder="member_type">
           <!--        <input type="text" name="name" placeholder="name">-->
           <!--        <input type="text" name="session" placeholder="session">-->
           <!--        <input type="text" name="study" placeholder="study">-->
           <!--        <input type="text" name="mobile" placeholder="mobile">-->
           <!--        <input type="text" name="email" placeholder="email">-->
           <!--        <input type="text" name="payment_type" placeholder="payment_type">-->
           <!--        <input type="text" name="payment_number" placeholder="payment_number">-->
           <!--        <input type="text" name="txid" placeholder="txid">-->
           <!--        <input type="text" name="payment_time" placeholder="payment_time">-->
           <!--        <input type="text" name="payment_Fee" placeholder="payment_Fee">-->
           <!--        <input type="text" name="spouse" placeholder="spouse">-->
           <!--        <input type="text" name="kids" placeholder="kids">-->
                  <button type="submit">Submit</button>
               </form>
              <h3>Reunion form will be available 13-12-2019</h3>  
            </div>   
           <div class="col-md-2"></div>   
       </div>
    </div>
</section>
    
</section> 
@endsection
@push('custom-js')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
@endpush