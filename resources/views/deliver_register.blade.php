@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('customer.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        {{-- ======================== --}}

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">profile</label>

                            <div class="col-md-6">
                                <input id="profile" type="text" class="form-control" name="profile" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                            <div class="col-md-6">
                                <input class="form-control col-lg-10" type="date" id="dob" name="date">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class=" form-check form-check-inline">
                                <input type="radio" name="male" class="form-check-input" id="male" required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="female" id="female" class="form-check-input" required="">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"> Job Type</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="fulltime" name="full">
                                <label class="form-check-label" for="fulltime">Full Time</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="parttime" name="part">
                                <label class="form-check-label" for="parttime">Part Time</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Job Day</label>

                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="mon" id="mon" class="form-check-input">
                                <label class="form-check-label" for="mon">Monday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="tues" id="tues" class="form-check-input">
                                <label class="form-check-label" for="tues">Tuesday</label>
                            </div>
                             <div class="form-check form-check-inline">
                                <input type="checkbox" name="wed" id="wed" class="form-check-input">
                                <label class="form-check-label" for="wed">Wednesday</label>
                            </div>
                             <div class="form-check form-check-inline">
                                <input type="checkbox" name="thur" id="thur" class="form-check-input">
                                <label class="form-check-label" for="thur">Thursday</label>
                            </div>
                             <div class="form-check form-check-inline">
                                <input type="checkbox" name="fri" id="fri" class="form-check-input">
                                <label class="form-check-label" for="fri">Friday</label>
                            </div>
                             <div class="form-check form-check-inline">
                                <input type="checkbox" name="sat" id="sat" class="form-check-input">
                                <label class="form-check-label" for="sat">Saturday</label>
                            </div>
                             <div class="form-check form-check-inline">
                                <input type="checkbox" name="sun" id="sun" class="form-check-input">
                                <label class="form-check-label" for="sun">Sunday</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" >Job Time</label>

                            <div class="col-md-3">
                                <div class="form-group date">
                                    <label for="start_time">Start Time</label>
                                    <input type="time" name="start_time" class="form-control" id="start_time">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group date">
                                    <label for="end_time">End Time</label>
                                    <input type="time" name="end_time" class="form-control" id="end_time">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Transport Type</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="car" name="car">
                                <label class="form-check-label" for="car">Car</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="bicycle" name="bicycle">
                                <label class="form-check-label" for="bicycle">Bicycle</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business_type" class="col-md-4 col-form-label text-md-right">Payment Type</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="kbz" name="payment">
                                <label class="form-check-label" for="kbz">KBZpay</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="money" name="payment">
                                <label class="form-check-label" for="money">Wave Money</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="doller" name="payment">
                                <label class="form-check-label" for="doller">
                                Okdoller</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Remark</label>

                            <div class="col-md-6">
                                <textarea name="remark" class="form-control"></textarea>
                            </div>
                        </div>

                        {{-- ============================== --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection