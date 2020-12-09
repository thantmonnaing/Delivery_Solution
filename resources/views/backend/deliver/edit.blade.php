@extends('backend/backend_template')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Deliver Edit Form</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('deliver.index')}}" class="btn btn-primary">Back</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <form method="post" action="{{route('deliver.update',$deliver->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Profile: </label>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#old" role="tab" aria-controls="home" aria-selected="true" value="{{$deliver->profile}}">Old</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new" role="tab" aria-controls="profile" aria-selected="false">New</a>
              </li>
            </ul>
            <div class="tab-content mt-3" id="myTabContent">
              <div class="tab-pane fade show active" id="old" role="tabpanel" aria-labelledby="home-tab">
                <img src="{{asset($deliver->profile)}}" class="img-fluid" alt="">
                <input type="hidden" name="oldphoto" value="{{$deliver->profile}}">
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
            <label>Name:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$deliver->user->name}}">
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group ">
            <label for="email" >Email:</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$deliver->user->email}}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          <div class="form-group">
            <label>Date of Birth:</label>
            <input type="date" name="form" class="form-control" id="fromDate" value="{{$deliver->dob}}">
          </div>

          <div class="form-group">
            <label class="mr-5">Gender:</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="{{$deliver->gender}}" {{ $deliver->gender == "male" ? 'checked' : '' }}>
              <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="{{$deliver->gender}}" {{ $deliver->gender == "female" ? 'checked' : '' }}>
              <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>               
          </div>

          <div class="form-group">
            <label>Phone no:</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$deliver->phone}}">
            @error('phone')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label>Address:</label>
            <textarea class="form-control @error('address') is-invalid @enderror" name="address" >{{$deliver->address}}</textarea>
            @error('address')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <fieldset class="border pl-5 mb-5">
            <legend class="w-auto mb-1">Job Type:</legend>
            <div class="form-group">
              <label class="mr-5 pr-5"></label>
              <div class="form-check form-check-inline">
                <input class="form-check-input job" type="radio" id="radio1" value="fulltime" name="job" {{ $deliver->job_type == "fulltime" ? 'checked' : '' }}>
                <label class="form-check-label" for="radio1">Full Time</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input job" type="radio" id="radio2" value="parttime" name="job" {{ $deliver->job_type == "parttime" ? 'checked' : '' }}>
                <label class="form-check-label" for="radio2">Part Time</label>
              </div>
            </div>
          </fieldset>

          <fieldset class="border pl-5 mb-5">
            <legend class="w-auto mb-1">Job Day:</legend>
            <div class="form-group">
              <label class="mr-5 pr-5"></label>
              <div class="form-check form-check-inline">  					
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="monday" name="day[]" {{ (is_array($deliver->job_day) && in_array('monday', $deliver->job_day)) ? ' checked' : ''}}>
                <label class="form-check-label" for="inlineCheckbox1">Monday</label>
              </div>
              <div class="form-check form-check-inline"> 					
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="tuesday" name="day[]" {{ (is_array($deliver->job_day) && in_array('tuesday', $deliver->job_day)) ? ' checked' : ''}}>
                <label class="form-check-label" for="inlineCheckbox2">Tuesday</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="wednesday" name="day[]" {{ (is_array($deliver->job_day) && in_array('wednesday', $deliver->job_day)) ? ' checked' : ''}}>
                <label class="form-check-label" for="inlineCheckbox3">Wednesday</label>
              </div>
              <div class="form-check form-check-inline">  					
                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="thursday" name="day[]" {{ (is_array($deliver->job_day) && in_array('thursday', $deliver->job_day)) ? ' checked' : ''}}>
                <label class="form-check-label" for="inlineCheckbox4">Thursday</label>
              </div>
              <div class="form-check form-check-inline">  					
                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="friday" name="day[]" {{ (is_array($deliver->job_day) && in_array('friday', $deliver->job_day)) ? ' checked' : ''}}>
                <label class="form-check-label" for="inlineCheckbox5">Friday</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="saturday" name="day[]" {{ (is_array($deliver->job_day) && in_array('saturday', $deliver->job_day)) ? ' checked' : ''}}>
                <label class="form-check-label" for="inlineCheckbox6">Saturday</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="sunday" name="day[]" {{ (is_array($deliver->job_day) && in_array('sunday', $deliver->job_day)) ? ' checked' : ''}}>
                <label class="form-check-label" for="inlineCheckbox7">Sunday</label>
              </div>
            </div>
          </fieldset>

          <fieldset class="time_fieldset border pl-5 mb-5">
            <legend class="w-auto mb-1">Job Time:</legend>
            <div class="form-group row">
              <label class="mr-5 pr-5"></label>
              <div class="col-md-3">
                <div class="form-group date">
                  <label for="start_time">Start Time</label>
                  <input type="time" name="start_time" class="form-control" id="start_time" value="{{ $deliver->start_time}}">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group date">
                  <label for="end_time">End Time</label>
                  <input type="time" name="end_time" class="form-control" id="end_time" value="{{$deliver->end_time}}">
                </div>
              </div>
            </div>
          </fieldset>

          <fieldset class="border pl-5 mb-5">
            <legend class="w-auto mb-1">Townships:</legend>
            <div class="form-group mb-4">           
              <label class="mr-4 mt-4 ml-3 pr-5"></label>
              @php
                $i = 1;
              @endphp
               
                @foreach($deliver->townships as $t_row)     
                @foreach($townships as $row)  
                {{-- {{ $t_row->pivot->township_id}}{{ $row->id}}         --}}
                  <div class="form-check form-check-inline">  
                    <input class="form-check-input" type="checkbox" name="township[]" id="township{{$i}}" value="{{$row->id}}" {{ $t_row->pivot->township_id == $row->id  ? 'checked' : ''}}>
                    <label class="form-check-label" for="township{{$i}}">{{$row->name}}</label>
                  </div>          
                  @php $i++; @endphp        
                @endforeach               
              @endforeach

              @error('township')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror   
            </div>
          </fieldset> 

          <fieldset class="border pl-5 mb-5">
            <legend class="w-auto mb-1">Transport Type:</legend>
            <div class="form-group mb-4">
              <label class="mr-4 mt-4 ml-3 pr-5"></label>
              <div class="form-check form-check-inline">          
                <input class="form-check-input" type="radio" name="transport" id="tranradio1" value="car" {{ $deliver->transport_type == "car" ? 'checked' : '' }}>
                <label class="form-check-label" for="tranradio1">Car</label>
              </div>
              <div class="form-check form-check-inline">          
                <input class="form-check-input" type="radio" name="transport" id="tranradio2" value="motorbike" {{ $deliver->transport_type == "motorbike" ? 'checked' : '' }}>
                <label class="form-check-label" for="tranradio2">Motorbike</label>
              </div>
              <div class="form-check form-check-inline">          
                <input class="form-check-input" type="radio" name="transport" id="tranradio3" value="bicycle" {{ $deliver->transport_type == "bicycle" ? 'checked' : '' }}>
                <label class="form-check-label" for="tranradio3">Bicycle</label>
              </div>
              <div class="form-check form-check-inline">          
                <input class="form-check-input" type="radio" name="transport" id="tranradio4" value="other" {{ $deliver->transport_type == "other" ? 'checked' : '' }}>
                <label class="form-check-label" for="tranradio4">Other</label>
              </div>
              @error('transport')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </fieldset>

          <fieldset class="border pl-5 mb-5">
            <legend class="w-auto mb-1">Payment Type:</legend>
            <div class="form-group mb-4">         
              <label class="mr-4 mt-4 ml-3 pr-5"></label>
              <div class="form-check form-check-inline">  
                <input class="form-check-input" type="checkbox" name="payment[]" id="payment_type1" value="kbz" {{ (is_array($deliver->payment_type) && in_array('kbz', $deliver->payment_type)) ? ' checked' : ''}}>
                <label class="form-check-label" for="payment_type1">KBZpay</label>
              </div>
              <div class="form-check form-check-inline">        
                <input class="form-check-input" type="checkbox" name="payment[]" id="payment_type2" value="wave" {{ (is_array($deliver->payment_type) && in_array('wave', $deliver->payment_type)) ? ' checked' : ''}}>
                <label class="form-check-label" for="payment_type2">WaveMoney</label>
              </div>
              <div class="form-check form-check-inline">        
                <input class="form-check-input" type="checkbox" name="payment[]" id="payment_type3" value="okdoller" {{ (is_array($deliver->payment_type) && in_array('okdoller', $deliver->payment_type)) ? ' checked' : ''}}>
                <label class="form-check-label" for="payment_type3">OKdoller</label>
              </div>
              @error('payment')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </fieldset> 
     
          <div class="form-group">
            <input type="submit" name="btnsubmit" value="Update" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      var start = $('#start_time').val();
      var end = $('#end_time').val();
      jobType();

      $('.job').change(function(){
        jobType();
      });

      function jobType(){
        var job = $("input[name='job']:checked").val();     
        if(job == "parttime"){         
          $('#start_time').val(start);
          $('#end_time').val(end);
          $('.time_fieldset').prop('disabled',false);
        }else{
          $('#start_time').val('');
          $('#end_time').val('');
          $('.time_fieldset').prop('disabled',true);
        }
      }
    })
  </script>
@endsection