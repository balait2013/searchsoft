<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Company Details</title>
    <link href="{{asset('public/assets/node_modules/register-steps/steps.css')}}" rel="stylesheet">
    <link href="{{asset('public/dist/css/pages/register3.css')}}" rel="stylesheet">
    <link href="{{asset('public/dist/css/style.min.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="skin-default card-no-border">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Searchsoft</p>
        </div>
    </div>
    <section id="wrapper" class="step-register">
        <div class="register-box">
            <div class="">
                <a href="{{url('login')}}" class="text-center" style="margin-top: -17px;margin-bottom: -25px;"><img src="{{asset('public/assets/images/logo.png')}}" alt="Home" width="200"/></a>
                <form id="msform" style="margin:0px auto;" method="post" action="{{ url('CompanyDetails') }}">
                    @csrf
                    <ul id="eliteregister" style="margin-bottom:5px;">
                      <li class="active">Account Setup</li>
                      <li class="active">Company Details</li>
                      <li>Personal Details</li>
                    </ul>
                    <fieldset>
                        <h2 class="fs-title">Company Details</h2>
                        <!-- <h3 class="fs-subtitle">Your presence on the social network</h3> -->
                        <input type="text" name="company_name" placeholder="Company Name" value="{{ old('company_name') }}" required class=" @error('company_name') is-invalid @enderror"/>
                        @error('company_name')
                            <span class="invalid-feedback" role="alert" style="display:block;margin-top: -15px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" name="gst_no" placeholder="GST No" value="{{ old('gst_no') }}" required class=" @error('gst_no') is-invalid @enderror"/>
                        @error('gst_no')
                            <span class="invalid-feedback" role="alert" style="display:block;margin-top: -15px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" name="website" placeholder="Website" value="{{ old('website') }}"  required class=" @error('website') is-invalid @enderror"/>
                        @error('website')
                            <span class="invalid-feedback" role="alert" style="display:block;margin-top: -15px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <textarea name="address" placeholder="Address" class=" @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert" style="display:block;margin-top: -15px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <select name="state" required class="form-control @error('state') is-invalid @enderror" style="min-height: 51px;">
                          <option value="">Select State</option>
                          @foreach ($states as $state):
                          <option value="{{$state->st_code}}" <?php if(old('state')==$state->st_code){echo 'selected';}?>>{{$state->state}}</option>
                          @endforeach
                        </select>
                        @error('state')
                            <span class="invalid-feedback" role="alert" style="display:block;margin-top: -15px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="submit" name="next" class="next action-button" value="Next" />
                    </fieldset>

                </form>
                <div class="clear"></div>
            </div>
        </div>
    </section>
    <script src="{{asset('public/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('public/assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('public/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/assets/node_modules/register-steps/jquery.easing.min.js')}}"></script>
    <script src="{{asset('public/assets/node_modules/register-steps/register-init.js')}}"></script>
    <script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    </script>
</body>
</html>
