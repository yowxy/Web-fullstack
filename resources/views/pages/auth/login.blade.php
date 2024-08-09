@extends('layouts.auth')

@section('body')
    <section class="bg-gray vh-100" >
        <div class="container h-100 pt-5 ">
                <div class="row justify-content-center ">
                    <div class="col-12 col-lg-3">
                        <a href="#" class="nav-link  mb-5  text-center" >
                            <img src="{{ url('assets/images/image 3.png') }}" alt="laracus logo" class="h-32px" >
                        </a>
                        <div class="card mb-5 mx-auto ">
                            <form action=" {{ route('auth.login.login') }} " method="POST">
                                @csrf
                                <div class="mb-3" >
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror   @error('credentials') is-invalid @enderror  "    id="email" name="email"  placeholder="name@example.com" autocomplete="off"  value="{{ old('email') }}"  autofocus >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('credentials')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3" >
                                    <label for="password" class="form-label">password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control  border-end-0  pe-0 rounded-0  rounded-start  @error('password')  is-invalid @enderror   "
                                        id="password" name="password">
                                        <span class="input-group-text  bg-white border-start-0 pe-auto @error('password')   border-danger  rounded-end  @enderror ">
                                            <a href="javascript:;" id="password-toogle" >
                                                <img src="{{ url('assets/images/eye-slash.png') }}" alt="passworf-toogle" id="password-toogle-img" >
                                            </a>
                                        </span>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                      </div>
                                </div>
                                <div class="mb-3  d-grid" >
                                    <button type="submit" class="btn-primary  rounded-2 fs-4 " >Log in</button>
                                </div>
                            </form>
                        </div>

                        <div class="text-center">
                            Dont have a accout  ? <a href=" {{ route('auth.sign-up.show') }} "class="text-underline  text-black" >Singn Up</a>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection


{{-- unhide  code jquerrry --}}
@section('after-script')
    <script>
        var isPasswordRevealed = false;


        $('#password-toogle').on('click',function(){
            isPasswordRevealed = !isPasswordRevealed;

            if(isPasswordRevealed){
                $('#password-toogle-img').attr('src', "{{ url('assets/images/Group.png') }}");
                $('#password').attr('type', 'text');
            }else{
                $('#password-toogle-img').attr('src', "{{ url('assets/images/eye-slash.png') }}");
                $('#password').attr('type', 'password');
            }
        })
    </script>
@endsection
