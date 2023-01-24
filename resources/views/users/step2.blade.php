@php
use App\User;
$datingCount = User::datingProfileExist(Auth::User()['id']);
if($datingCount == 1){
$datingCountText1  = "My Persnol Profile";
$datingCountText2  = "Update Your Profile if you want so ! ";
}
else{
$datingCountText1  = "Add Dating Profile";
$datingCountText2  = "Add Your Dating Profile ";
}
$datingProfile = User::datingProfileDetails(Auth::User()['id']);
@endphp
 

@extends('layouts.frontLayouts.front_design')
@extends('layouts.frontLayouts.user_dashboard_sidebar')
@section('sidebar')

     <!-- MultiStep Form -->
     
    <div class="main-form " id="grad1">
      <div class="row">
        <div class="col-12 col-sm-12  text-center p-0 ">
          <div class="card">
            <h2>
              <strong>{{ $datingCountText1 }}
              </strong>
            </h2>
            <p>{{ $datingCountText2 }}-
            </p>
            <div class="row">
              <div class="col-md-12 mx-0">
                <form id="msform" method="post" action="{{ url('/step/2')}}">
                  @csrf
                  @if(!empty($datingProfile['user_id']))
                <input type="hidden" name="user_id" value="{{ $datingProfile->user_id}}">
                @endif
                  <!-- progressbar -->
                  <ul id="progressbar">
                    <li class="active" id="account">
                      <strong>Personal
                      </strong>
                    </li>
                    <li id="personal">
                      <strong>Education / Carrier
                      </strong>
                    </li>
                    <li id="payment">
                      <strong>About For !
                      </strong>
                    </li>
                    {{-- 
                    <li id="confirm">
                      <strong>Finish
                      </strong>
                    </li> --}}
                  </ul> 
                  <!-- fieldsets -->
                  <fieldset>
                    <div class="form-card">
                      <h2 class="fs-title">Personal Information
                      </h2>
                       
                      <div class="row">
                        <div class="col-3"> 
                          <label class="pay">Select Gender*
                          </label> 
                        </div>
                        <div class="col-3"> 
                          <select class="list-dt" name="gender">
                            <option selected>Select
                            </option>
                            <option value="Male" @if(!empty($datingProfile['gender']) && $datingProfile['gender'] == "Male") selected="" @endif>Male
                            </option>
                            <option value="Female" @if(!empty($datingProfile['gender']) && $datingProfile['gender'] == "Female") selected="" @endif>Female
                            </option>                  
                          </select>               
                        </div>
                     
                      
                        <div class="col-3"> 
                          <label class="pay">Height*
                          </label> 
                        </div>
                        <div class="col-3"> 
                          <select class="list-dt" name="height">
                            <option value="">Select
                            </option>
                            <option value="4'2'" @if(!empty($datingProfile['height']) && $datingProfile['height'] == "4'0'") selected="" @endif>4'0"
                            </option>
                           
                            <option value="4'2'" @if(!empty($datingProfile['height']) && $datingProfile['height'] == "4'2'") selected="" @endif>4'2"
                            </option>
                            <option value="4'4'" @if(!empty($datingProfile['height']) && $datingProfile['height'] == "4'4'") selected="" @endif>4'4"
                            </option>
                            <option value="4'5'" @if(!empty($datingProfile['height']) && $datingProfile['height'] == "4'5'") selected="" @endif>4'5"
                            </option>
                            <option value="4'8'" @if(!empty($datingProfile['height']) && $datingProfile['height'] == "4'8'") selected="" @endif>4'8"
                            </option>
                            <option value="5'1'" @if(!empty($datingProfile['height']) && $datingProfile['height'] == "5'1'") selected="" @endif>5'1"
                            </option>
                            <option value="5'4'" @if(!empty($datingProfile['height']) && $datingProfile['height'] == "5'4'") selected="" @endif>5'4"
                            </option>
                            <option value="5'6'" @if(!empty($datingProfile['height']) && $datingProfile['height'] == "5'6'") selected="" @endif>5'6"
                            </option>
                            <option value="6'0'" @if(!empty($datingProfile['height']) && $datingProfile['height'] == "6'0'") selected="" @endif>6'0
                            </option>                 
                          </select>
                         
                        </div>
                      </div>  <!--first col row-->
                      <div class="row">
                        <div class="col-3"> 
                          <label class="pay">Marital Status*
                          </label> 
                        </div>
                        <div class="col-3"> 
                          <select class="list-dt" name="marital_status">
                            <option selected>Select
                            </option>
                            
                            <option value="Married" @if(!empty($datingProfile['marital_status']) && $datingProfile['marital_status'] == "Married") selected="" @endif>Married
                            </option>

                            <option value="Single" @if(!empty($datingProfile['marital_status']) && $datingProfile['marital_status'] == "Single") selected="" @endif>Single
                            </option>

                            <option value="Seprated" @if(!empty($datingProfile['marital_status']) && $datingProfile['marital_status'] == "Seprated") selected="" @endif>Seprated
                            </option>

                            <option value="Divorce" @if(!empty($datingProfile['marital_status']) && $datingProfile['marital_status'] == "Divorce") selected="" @endif>Divorce
                            </option>                  
                          </select>               
                        </div>
                      
                        <div class="col-3"> 
                          <label class="pay">Body Type*
                          </label> 
                        </div>
                        <div class="col-3"> 
                          <select class="list-dt" name="body_type">
                            <option selected>Select
                            </option>           
                            <option value="Slim" @if(!empty($datingProfile['body_type']) && $datingProfile['body_type'] == "Slim") selected="" @endif>Slim
                            </option>

                            <option value="Average" @if(!empty($datingProfile['body_type']) && $datingProfile['body_type'] == "Average") selected="" @endif>Average
                            </option>

                            <option value="Atheletic" @if(!empty($datingProfile['body_type']) && $datingProfile['body_type'] == "Atheletic") selected="" @endif>Atheletic
                            </option>

                            <option value="Heavy" @if(!empty($datingProfile['body_type']) && $datingProfile['body_type'] == "Heavy") selected="" @endif>Heavy
                            </option>                          
                          </select>               
                        </div>
                      </div> <!--second col row-->
                      
                      {{-- country --}}
                      <div class="row">
                        <div class="col-3"> 
                          <label class="pay">Country*
                          </label> 
                        </div>
                        <div class="col-3"> 
                          <select class="list-dt input-lg dynamic" name="country" id="country" >
                            <option value="">select country
                            </option>
                            @foreach( $countries as $country)
                            <option value="{{ $country->name }}" @if(!empty($datingProfile['country']) && $datingProfile['country'] ==  $country->name) selected="" @endif>{{ $country->name }}
                            </option>
                            @endforeach   
                          </select>               
                        </div>
                      
                      {{-- state --}}
                      
                        <div class="col-3"> 
                          <label class="pay">State*
                          </label> 
                        </div>
                        <div class="col-3"> 
                          <select class="list-dt input-lg dynamic" name="state" id="state" >
                            <option value="">select state
                            </option>  
                            <option value="state1" @if(!empty($datingProfile['state']) && $datingProfile['state'] == "state1") selected="" @endif>State1
                            </option>

                            <option value="state2" @if(!empty($datingProfile['state']) && $datingProfile['state'] == "state2") selected="" @endif>State2
                            </option>

                            <option value="state3" @if(!empty($datingProfile['state']) && $datingProfile['state'] == "state3") selected="" @endif>State3
                            </option>
                          </select>               
                        </div>
                      </div>  <!--3rd col row-->
                      {{-- city --}}
                      <div class="row">
                        <div class="col-3"> 
                          <label class="pay">City*
                          </label> 
                        </div>
                        <div class="col-3"> 
                          <select class="list-dt input-lg" name="city" id="city" >
                            <option value="">select city
                            </option>   
                            <option value="city1" @if(!empty($datingProfile['city']) && $datingProfile['city'] == "city1")  selected="" @endif>City1
                            </option>

                            <option value="city2" @if(!empty($datingProfile['city']) && $datingProfile['city'] == "city2") selected="" @endif>City2
                            </option>

                            <option value="city3" @if(!empty($datingProfile['city']) && $datingProfile['city'] == "city3") selected="" @endif>City3
                            </option>                        
                          </select>               
                        </div>
                      
                        <div class="col-3"> 
                          <label class="pay">Language*
                          </label> 
                        </div>
                        <div class="col-3"> 
                          <select class="list-dt" name="languages[]">
                            <option selected>Select
                            </option>           
                            @foreach( $language as $lang)
                            <option value="{{ $lang->name }}" <?php
                            if(!empty($datingProfile->languages) && preg_match('/'.$lang->name.'/i', $datingProfile->languages))
                            { echo "selected" ;}
                             ?>>{{ $lang->name }}
                            </option>
                            @endforeach             
                          </select>               
                        </div>
                      </div> <!--fourth col row-->
                      <div class="row">
                        <div class="col-3"> 
                          <label class="pay">Hobbies*
                          </label> 
                        </div>
                        <div class="col-3"> 
                          <select class="list-dt" name="hobbies[]">
                            <option selected>Select
                            </option>           
                            @foreach( $hobbies as $hobby)
                            <option value="{{ $hobby->title }}" <?php if(!empty($datingProfile->hobbies) &&                                 preg_match('/'.$hobby->title.'/i',$datingProfile->hobbies))
                                { echo "selected"; }
                            ?> >  {{ $hobby->title }}
                            </option>
                            @endforeach            
                          </select>               
                        </div>
                        
                        <div class="col-3"> 
                          <label class="pay">Date of birth*
                          </label> 
                        </div>
                        <div class="col-3"> 
                          <input  type="text"  name="dob" id="dob" placeholder="Date of Birth" @if(!empty($datingProfile['dob'])) value="{{ $datingProfile['dob']}}" @endif />               
                        </div>
                      </div>                       
                    </div>
                    <input type="button" name="next" class="next btn" value="Next Step" />
                  </fieldset>
                  {{-- 2nd card --}}
                  <fieldset>
                    <div class="form-card">
                      <h2 class="fs-title">Education & Carrier
                      </h2>
                      <div class="row">
                        <div class="col-3"> 
                          <label class="pay">Highest Education*
                          </label> 
                        </div>
                        <div class="col-9"> 
                          <select class="list-dt" name="education">
                            <option selected>Select
                            </option>
                            <option value="Under Matric" @if(!empty($datingProfile['education']) && $datingProfile['education'] == "Under Matric") selected="" @endif>Under Matric
                            </option>
                            
                            <option value="Diploma Holder" @if(!empty($datingProfile['education']) && $datingProfile['education'] == "Diploma Holder") selected="" @endif>Diploma Holder
                            </option>

                            <option value="Matriculation" @if(!empty($datingProfile['education']) && $datingProfile['education'] == "Matriculation") selected="" @endif>Matriculation
                            </option>

                            <option value="Intermediate" @if(!empty($datingProfile['education']) && $datingProfile['education'] == "Intermediate") selected="" @endif>Intermediate
                            </option>

                            <option value="Bechlor's/ any field" @if(!empty($datingProfile['education']) && $datingProfile['education'] == "Bechlor's/ any field") selected="" @endif>Bechlor's/ any field
                            </option>

                            <option value="Masters/pHD" @if(!empty($datingProfile['education']) && $datingProfile['education'] == "Masters/pHD") selected="" @endif>Masters/pHD
                            </option>                  
                          </select>               
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-3"> 
                          <label class="pay">Occupation*
                          </label> 
                        </div>
                        <div class="col-9"> 
                          <select class="list-dt" name="occupation">
                            <option value="">Select
                            </option>
                            <option value="Accountant" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation'] == "Accountant") selected="" @endif>Accountant
                            </option>

                            <option value="Engineer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation'] == "Engineer") selected="" @endif>Engineer
                            </option>
                            
                            <option value="Biotechnologist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation'] == "Biotechnologist") selected="" @endif>Biotechnologist
                            </option>

                            <option value="Chemical Engineer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation'] == "Chemical Engineer") selected="" @endif>Chemical Engineer
                            </option>

                            <option value="Dentist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation'] == "Dentist") selected="" @endif>Dentist
                            </option>                 
                          </select>               
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-3"> 
                          <label class="pay">Income*
                          </label> 
                        </div>
                        <div class="col-9"> 
                          <select class="list-dt" name="income">
                            <option value="">Select
                            </option>
                            
                            <option value="Under 25000" @if(!empty($datingProfile['income']) && $datingProfile['income'] == "Under 25000") selected="" @endif>Under 25000
                            </option>

                            <option value="$30000 to $50000" @if(!empty($datingProfile['income']) && $datingProfile['income'] == "$30000 to $50000") selected="" @endif>$30000 to $50000
                            </option>

                            <option value="$60000" @if(!empty($datingProfile['income']) && $datingProfile['income'] == "$60000") selected="" @endif>$60000
                            </option>

                            <option value="other" @if(!empty($datingProfile['income']) && $datingProfile['income'] == "other") selected="" @endif>other
                            </option>          
                          </select>               
                        </div>
                      </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                    <input type="button" name="next" class="next action-button" value="Next Step" />
                  </fieldset>
                  {{-- 3rd card --}}
                  <fieldset>     
                    <div class="form-card">
                      <h2 class="fs-title">About Myself*
                      </h2>
                      {{-- 
                      <div class="radio-group">
                        <div class='radio' data-value="credit">
                          <img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px">
                        </div>
                        <div class='radio' data-value="paypal">
                          <img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px">
                        </div> 
                        <br>
                      </div> --}}                           
                      <div class="row">
                        <div class="col-12"> 
                          <label class="pay">Short intro*
                          </label>  
                          <textarea name="about_myself" rows="6" cols="10">
                            @if(!empty($datingProfile['about_myself'])) {{ $datingProfile['about_myself']}} @endif
                          </textarea>
                        </div>                                
                      </div>
                      <h2 class="fs-title">About My prefered Partner*
                      </h2>
                      <div class="row">
                        <div class="col-12"> 
                          <label class="pay">Partner Details*
                          </label>  
                          <textarea name="about_partner" rows="6" cols="10">
                            @if(!empty($datingProfile['about_partner'])) {{ $datingProfile['about_partner']}} @endif
                          </textarea>
                        </div>                                
                      </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                    <input type="submit" name="submit" class="next action-button" value="Confirm" />
                  </fieldset>                                
                  {{-- 
                  <fieldset>
                    <div class="form-card">
                      <h2 class="fs-title text-center">Your Profile under review !
                      </h2> 
                      <br>
                      <br>
                      <div class="row justify-content-center">
                        <div class="col-3"> 
                          <img src="{{ asset('img/frontend_images/site/thumbsup_girl.png')}}" class="fit-image" style="width: 170px; height: 190px" > 
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="row j ustify-content-center">
                        <div class="col-7 text-center">
                          <h5>As part of the process,we screen every profile to ensure whether it meets our terms and conditions.You will receive a mail from us on your profile Status as soon as screening is complete.
                          </h5>
                        </div>
                      </div>
                    </div>
                  </fieldset>      
                  --}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  @endsection       
         
  
    
    {{--    js section  ============================================ --}}
    <script src="{{ asset('js/frontend_js/jquery-3.2.1.js')}}"></script>
    
    
 