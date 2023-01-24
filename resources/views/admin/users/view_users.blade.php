@extends('layouts.adminLayouts.admin_design')
@section('content')
<div id="content">
   <div id="content-header">
      <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
      <h1>User Details</h1>
   </div>
   <div class="container-fluid">
      <hr>
      <div class="row-fluid">
         <div class="span12">
            <div class="widget-box">
               <div class="widget-title">
                  <span class="icon"> <i class="icon-th"></i> </span>
                  <h5></h5>
               </div>
               <div class="widget-content nopadding">
                  <table class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>User Id</th>
                           <th>User Name</th>
                           <th>Email</th>
                           <th>Registered on</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($users as $user)
                        <tr class="odd gradeX">
                           <td>{{ $user['id'] }}</td>
                           <td>{{ $user['name']}}</td>
                           <td>{{ $user['email']}}</td>
                           <td class="center">{{ $user['created_at']}}</td>

                           <td>
                              
                              @if(!empty($user['details']['id']))                        
                              <a href="#myModal{{ $user['id'] }}" data-toggle="modal" class="btn btn-info btn-mini">  View Details </a>                                  
                              <!-- Modal details Form -->
                              <div id="myModal{{ $user['id'] }}" class="modal fade ">
                                 <div class="modal-header">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3>User Details</h3>
                                    <input type="checkbox" class="userStatus" rel="{{$user['id']}}" data-toggle="toggle" data-on="Enabled" data-off="Disabled" @if($user['details']['status'] == "1") checked @endif >
                                 </div>
                                 <div class="modal-body">
                                    <div class="widget-box">
                                       <div class="widget-content nopadding">
                                          <table class="table table-bordered table-striped">
                                             <thead>
                                                <tr>
                                                   <th>Date of birth</th>
                                                   <th>Gender</th>
                                                   <th>Height</th>
                                                   <th>Marital Status</th>
                                                   <th>Body Type</th>
                                                   <th>Country</th>
                                                   <th>State</th>
                                                   <th>City</th>
                                                   <th>Language</th>
                                                   <th>Hobbies</th>
                                                   <th>Highest Education</th>
                                                   <th>Occupation</th>
                                                   <th>Income</th>
                                                   <th>About Myself</th>
                                                   <th>About Partner</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr class="odd gradeX">
                                                   <td>{{ $user['details']['dob']}}</td>
                                                   <td>{{ $user['details']['gender']}}</td>
                                                   <td>{{ $user['details']['height']}}</td>
                                                   <td>{{ $user['details']['marital_status']}}</td>
                                                   <td>{{ $user['details']['body_type']}}</td>
                                                   <td>{{ $user['details']['country']}}</td>
                                                   <td>{{ $user['details']['state']}}</td>
                                                   <td>{{ $user['details']['city']}}</td>
                                                   <td>{{ $user['details']['languages']}}</td>
                                                   <td>{{ $user['details']['hobbies']}}</td>
                                                   <td>{{ $user['details']['education']}}</td>
                                                   <td>{{ $user['details']['occupation']}}</td>
                                                   <td>{{ $user['details']['income']}}</td>
                                                   <td>{{ $user['details']['about_myself']}}</td>
                                                   <td>{{ $user['details']['about_partner']}}</td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endif


                              @if(!empty($user['photos'][0]['photo'])) 
                              <a href="#myPhotos{{ $user['id'] }}" data-toggle="modal" class="btn btn-primary btn-mini">  View Photos</a> 
                              
                              <!-- Modal photos form -->
                              <div id="myPhotos{{ $user['id'] }}" class="modal fade ">
                                 <div class="modal-header">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3>User Photos</h3>
                           </div>
                           <div class="modal-body">
                              <div class="widget-box">
                                 <div class="widget-content nopadding">
                                    <table class="table table-bordered table-striped">
                           <tbody>
                              <tr class="odd gradeX">
                                 @foreach($user['photos'] as $photo)
                                 <td>
                                    <table>
                                       <tr>
                                          <td>
                                             <img src="{{ url('img/frontend_images/photos/'.$photo['photo'])}}" style="width: 200px; height:200px;">
                                          </td>
                                          <td valign="top" align="top">
                           <input type="checkbox" class="userPhotoStatus" rel="{{$photo['id']}}" data-toggle="toggle" data-on="Enabled" data-off="Disabled" @if($photo['status'] == "1") checked @endif ></td>
                                       </tr>
                                    </table>
                                    
                                 </td>
                           </tbody>
                                       @endforeach
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endif
                        <a href="#" class="btn btn-success btn-mini"> Edit </a> 
                        <a href="#" class="btn btn-danger btn-mini"> Delete </a> 
                     </td>
                  </tr>
         @endforeach
      </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection