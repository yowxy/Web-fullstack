@extends('layouts.auth')

@section('body')
    <section class="bg-gray  vh-100" >
        <div class="container h-100">
            <div class="row pt-5  justify-content-center">
                <div class="col-12 col-lg-6 my-auto mb-5 mb-lg-auto me-0 ">
                    <div class="d-none d-lg-block ">
                        <h2 class="fw-bold" >The Laracus community</h2>
                        <p>
                            <ul>
                                <li>Stuck? Ask in the Discussions</li>
                                <li>Get answers from experienced developers from around the world</li>
                                <li>Contribute by answering questions</li>
                            </ul>
                        </p>
                    </div>
                    <div class="d-block d-lg-none fs-4 text-center" >
                        create your accout in a minute
                    </div>
                </div>
                <div class="col-12 col-lg-3 h-100">
                    <a href="#" class="nav-link mb-5 text-center">
                        <img src="{{ url('assets/images/image 3.png') }}" alt="laracus logo" class="h-32px">
                    </a>
                    <div class="card mb-5 mx-auto ">
                        <form action="{{ route('auth.sign-up.sign-up') }}" method="POST" >
                            @csrf
                            <div class="mb-3" >
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control  @error ('email') is-invalid  @enderror "  id="email" placeholder="name@example.com" autocomplete="off"  autofocus
                                name="email"  value="{{ old('email') }}"  >
                                @error('email')
                                    <div class="invalid-feedback" >
                                           {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3" >
                                <label for="password" class="form-label">password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control  border-end-0  pe-0 rounded-0  rounded-start   @error('password')  is-invalid  @enderror "
                                    id="password" name="password">
                                    <span class="input-group-text  bg-white border-start-0 pe-auto
                                     @error('email')  border-danger rounded-end   @enderror ">
                                        <a href="javascript:;" id="password-toogle" >
                                            <img src="{{ url('assets/images/eye-slash.png') }}" alt="passworf-toogle" id="password-toogle-img" >
                                        </a>
                                    </span>
                                    @error('password')
                                        <div class="invalid-feedback" >
                                            {{ $message }}
                                        </div>
                                   @enderror
                                  </div>
                            </div>
                            <div class="mb-3" >
                                <label for="username" class="form-label">username</label>
                                <input type="text" class="form-control @error ('username') is-invalid  @enderror " id="username"  autocomplete="off"
                                name="username" value="{{ old('username') }}"  >
                                @error('username')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div>
                           @enderror
                            </div>
                            <div class="mb-3  d-grid" >
                                <button type="submit" class="btn-primary  rounded-2 fs-5 " >Sign up</button>
                            </div>
                        </form>
                    </div>
                    <div  class="text-center foot " >
                        Already have an account ? <a href="{{ route('auth.login.show') }}" class="text-underline text-black" ><u>Log in</u></a>
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
