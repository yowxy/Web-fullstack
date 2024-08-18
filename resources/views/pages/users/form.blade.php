@extends('layouts.app')

@section('body')
    <section class="bg-gray pt-4  pb-5" >
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <form action="{{ route('users.update', $user->username ) }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-column flex-md-row mb-4 " >
                            <div class="edit-avatar-wrapper mb-3 mb-md-0 mx-auto mx-md-0 ">
                                <div class="avatar-wrapper rounded-circle  overflow-hidden  flex-shrink-0 me-4">
                                    <img  id="avatar" src="{{ $picture }}" alt="" class="avatar" >
                                </div>
                                <label for="picture" class="btn p-0 edit-avatar-show">
                                    <img src="{{ url('assets/images/edit-circle.png') }}" alt="edit circle">
                                </label>
                                <input type="file" id="picture" class="d-none" name="picture" accept="image/*" >
                            </div>
                            <div>
                                <div class="mb-3">


                            @error('picture')
                                <div class="invalid-feedback d-block ">
                                    {{ $message }}
                                </div>
                            @enderror

                                    <label for="username" class="form-label" >Username</label>
                                    <input type="text" class="form-control  @error('username') is-invalid  @enderror " id="username"  name="username" autofocus  value="{{ old('username', $user->username) }}" >
                                    @error('username')
                                        <div class="invalid-feedback" >
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label" >Password</label>
                                    <input type="password" class="form-control  @error('password') is-invalid  @enderror " id="password"  name="password">
                                    <div class="fs-12px color-gray ">
                                        Empty this if you don't want to change your password
                                    </div>

                                @error('password')
                                    <div class="invalid-feedback" >
                                        {{ $message }}
                                    </div>
                                @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="confirm-pw" class="form-label" >Confirm Password</label>
                                    <input type="password" class="form-control   @error('confirm-pw') is-invalid  @enderror " id="confirm-pw"  name="confirm-pw">
                                    <div class="fs-12px color-gray ">
                                        Empty this if you don't want to change your password
                                    </div>

                                @error('confirm-pw')
                                    <div class="invalid-feedback" >
                                        {{ $message }}
                                    </div>
                                @enderror


                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn-primary me-2" type="submit" >Save</button>
                            <a href="{{ route('users.show', $user->username) }}" class="text-decoration-none text-black" >Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


{{-- code untuk mengubah profile jika klik ke tombol edit di sebelah profile  --}}
@section('after-script')
    <script>
        $('#picture').on('change', function(event){
            var output = $('#avatar');
            output.attr('src',URL.createObjectURL(event.target.files[0]))
            output.onload = function (){
                     URL.createObjectURL(output.attr('src'))
            }
        })
    </script>
@endsection
