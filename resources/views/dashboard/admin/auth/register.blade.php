<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:54 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Doctor Appointment</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/signup/vendors/iconfonts/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/signup/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/signup/vendors/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/signup/css/style.css')}}">
    <!-- endinject -->

</head>

<body>
<div class="container-scroller align-content-around">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow ">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">

                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
                        <form class="pt-3" action="{{ route('admin.register.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Full Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-user text-primary"></i>
                                      </span>
                                    </div>
                                    <input type="text"
                                           value="{{ old('full_name') }}"
                                           name="full_name" class="form-control form-control-lg border-left-0 @error('full_name') is-invalid @enderror" placeholder="Username">

                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="far fa-envelope-open text-primary"></i>
                                      </span>
                                    </div>
                                    <input type="email"
                                           value="{{ old('email') }}"
                                           name="email" class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror" placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-lock text-primary"></i>
                                      </span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-lock text-primary"></i>
                                      </span>
                                    </div>
                                    <input type="password" name="password_confirmation" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Days </label>
                                <select name="days[]"  class="js-example-basic-multiple w-100 @error('days') is-invalid @enderror" multiple id="exampleFormControlSelect2">
                                    <option value="sunday">Sunday</option>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                    <option value="saturday">Saturday</option>
                                </select>

                                @error('days')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Certificates</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">

                                    </div>
                                    <textarea name="certificates" class="form-control form-control-lg @error('certificates') is-invalid @enderror"  id="exampleInputPassword" >{{ old('certificates') }}</textarea>

                                    @error('certificates')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <div class="input-group">

                                    <input type="text" value="{{ old('phone_number') }}" name="phone_number" class="form-control form-control-lg @error('phone_number') is-invalid @enderror" id="exampleInputPassword" placeholder="009627********">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Start</label>
                                <div class="input-group">

                                    <input type="time" name="start" value="{{ old('start') }}" class="form-control form-control-lg @error('start') is-invalid @enderror" id="exampleInputPassword" placeholder="Password">

                                    @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>End</label>
                                <div class="input-group">

                                    <input type="time" name="end" value="{{ old('end') }}" class="form-control form-control-lg @error('end') is-invalid @enderror" id="exampleInputPassword" placeholder="Password">

                                    @error('end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" name="img" value="{{ old('img') }}" class="file-upload-default  @error('img') is-invalid @enderror">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                      <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                                @error('img')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="{{ route('admin.loginForm') }}" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('admin/signup/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('admin/signup/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{asset('admin/signup/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/signup/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/signup/js/misc.js')}}"></script>
<script src="{{asset('admin/signup/js/settings.js')}}"></script>
<script src="{{asset('admin/signup/js/todolist.js')}}"></script>
<script src="{{asset('admin/signup/js/select2.js')}}"></script>
<script src="{{asset('admin/signup/js/file-upload.js')}}"></script>
<!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:54 GMT -->
</html>
