@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">account status : pending </div>

                <div class="card-body">
                    
                    <ul>
                        <li>Name : {{Auth::user()->name}} </li>
                        <li>Profile picture : <img src="/storage/profile/{{Auth::user()->image}}" alt="Profile image" style="height:100px; width:100px;"> </li>
                    </ul>   
                    
                   
                    
                    @if ( Auth::user()->fee_number == '')
                    <img src="/storage/slider/Screenshot_14.jpg" style=" max-width:100%;" alt="Payment">
                    <ul>
                        <li>  Bkash Account Number : </li>
                        <li>  DBBL Account Number : </li>
                        <li>  Nogod Account Number : </li>
                        <li>  Other Account Number : </li>
                        <li>  Fee Amound: 500 + cash out charge </li>
                        
                    </ul>
                    <h1>How to Make Payment with bKash / বিকাশ দিয়ে কিভাবে পেমেন্ট করবেন</h1>
                    <ol type="01" style="color:#0939B4; margin-left:30px;">
                            <li>Go to your bKash Mobile Menu by dialing *247#</li>
                            <li>Choose “Payment”</li>
                            <li>Enter the Merchant bKash Wallet No </li>
                            <li>Enter the Amount</li>
                            <li>Enter a Reference <b>APEALUMNI</b> </li>
                            <li>Enter the Counter Number 1</li>
                            <li>Now enter your bKash Menu PIN to confirm</li>
                            <li>Done! You will receive a confirmation message from bKash</li>
                            <li>Put the Transaction ID in the upper box and press "Submit"</li>
                    </ol>
                    <form action="{{ route('pending.store'),$data->id }}" method="post" >
                        @csrf
  <label for="fee_type"> Membership Fee received in</label>
                    
  
                       <select name="fee_type" type="text">
                          <option value="Bkash">Bkash</option>
                          <option value="DBBL">DBBL</option>
                          <option value="Nogod">Nagod</option>
                          <option value="Other">other</option>
                        </select>
  <br>
                      <label for="bank_number">Type your account Number</label>
  
                      <input type="tel" name="bank_number" placeholder="Type your account Number" required>
                      <br>
                      <label for="Bank_trxid">Yor Transaction ID / TRXID </label>
  
                      <input type="text" name="bank_trxid" placeholder="Yor Transaction ID / TRXID " required>
                      <br>
                      
                      <button type="submit">submit</button>
                  
                    </form>
                        
                    @else
                        <p>admin will verify your payment status .After then you can get approval</p>
                        <ul>
                            <li>Contract Number : </li>
                            <li></li>
                        </ul>
                        <p>Thank You</p>
                    
                    @endif


                  
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
