@extends('backendtemplate')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
      <p>Start a beautiful journey here</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h2>Deliver Edit Form</h2>
        <form method="" action="" enctype="multipart/form-data">
          
          <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="">
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
            <!-- <div class="form-group ">
              <label for="email" >Email:</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              
            </div>

            <div class="form-group">
              <label for="password" >Password:</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              
              </div> -->

              <div class="form-group">
                <label>Profile: (<small class="text-danger">* jpeg|bmp|png</small>)</label>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#old" role="tab" aria-controls="home" aria-selected="true">Old</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new" role="tab" aria-controls="profile" aria-selected="false">New</a>
                  </li>
                </ul>
                <div class="tab-content mt-3" id="myTabContent">
                  <div class="tab-pane fade show active" id="old" role="tabpanel" aria-labelledby="home-tab">
                    <img src="" class="img-fluid" alt="">
                    <input type="hidden" name="oldphoto" value="">
                  </div>
                  <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="profile-tab">
                    <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
                    @error('photo')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Date of Birth:</label>
                <input type="date" name="form" class="form-control" id="fromDate" value="">
              </div>

              <div class="form-group">
               <label>Gender:</label>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                 <label class="form-check-label" for="inlineRadio1">Male</label>
               </div>
               <div class="form-check form-check-inline">
                 <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                 <label class="form-check-label" for="inlineRadio2">Female</label>
               </div>
               
             </div>

             <div class="form-group">
              <label>Phone no:</label>
              <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="">
              @error('phone')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label>Address:</label>
              <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Item Detail Address..."></textarea>
              @error('address')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
            	<legend>Job_type:</legend>
            	<div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="fulltime" name="job">
               <label class="form-check-label" for="inlineCheckbox1">Full Time</label>
             </div>
             <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="parttime" name="job">
               <label class="form-check-label" for="inlineCheckbox2">Part Time</label>
             </div>
           </div>

           <div class="form-group">
             <legend>Job_day:</legend>
             <div class="form-check form-check-inline">  					
               <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="monday" name="day">
               <label class="form-check-label" for="inlineCheckbox1">Monday</label>
             </div>
             <div class="form-check form-check-inline"> 					
               <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="tuesday" name="day">
               <label class="form-check-label" for="inlineCheckbox2">Tuesday</label>
             </div>
             <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="wednesday" name="day">
               <label class="form-check-label" for="inlineCheckbox3">Wednesday</label>
             </div>
             <div class="form-check form-check-inline">  					
               <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="thursday" name="day">
               <label class="form-check-label" for="inlineCheckbox1">Thursday</label>
             </div>
             <div class="form-check form-check-inline">  					
               <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="friday" name="day">
               <label class="form-check-label" for="inlineCheckbox2">Friday</label>
             </div>
             <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="saturday" name="day">
               <label class="form-check-label" for="inlineCheckbox3">Saturday</label>
             </div>
             <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="sunday" name="day">
               <label class="form-check-label" for="inlineCheckbox3">Sunday</label>
             </div>
           </div>

           <div class="form-group">
             <legend>Transport_type:</legend>
             <div class="form-check form-check-inline">  					
               <input class="form-check-input" type="radio" name="transport" id="inlineRadio1" value="car">
               <label class="form-check-label" for="inlineRadio1">Car</label>
             </div>
             <div class="form-check form-check-inline"> 					
               <input class="form-check-input" type="radio" name="transport" id="inlineRadio2" value="bicycle">
               <label class="form-check-label" for="inlineRadio2">Bicycle</label>
             </div>
           </div>

           <div class="form-group">
             <legend>Payment_type:</legend>
             <div class="form-check form-check-inline"> 				
               <input class="form-check-input" type="radio" name="payment" id="inlineRadio1" value="kbz">
               <label class="form-check-label" for="inlineRadio1">KBZpay</label>
             </div>
             <div class="form-check form-check-inline">  				
               <input class="form-check-input" type="radio" name="payment" id="inlineRadio2" value="wave">
               <label class="form-check-label" for="inlineRadio2">WaveMoney</label>
             </div>
             <div class="form-check form-check-inline">  				
               <input class="form-check-input" type="radio" name="payment" id="inlineRadio3" value="okdoller">
               <label class="form-check-label" for="inlineRadio3">OKdoller</label>
             </div>
           </div>
           <div class="form-group">
             <textarea class="form-control" name="remark"></textarea>
           </div>
           <div class="form-group">
            <input type="submit" name="btnsubmit" value="Update" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection