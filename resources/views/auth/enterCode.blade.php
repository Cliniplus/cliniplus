@extends('front.layouts.layout')
@section('title', 'Enter Code')
@section('color','white')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    
                    <!-- Account Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{asset('front/img/about/Forgot password.png')}}" class="img-fluid" alt="Login Banner">	
                            </div>
                            
                            <form method="POST" action="{{route('postEnterCode')}}">
                            @csrf
                            <div class="form-controll login-right">
                                
                                <div class="login-header">
                                    <h3>Enter Code</h3>
                                    <p class="small text-muted">An 4 digit code has been sent to
                                        email</p>
                                </div>
                                <div class="all-code" >

                                    <input type="text" class="code-faild" maxlength="1" oninput="moveToNextInput(event, 1);mergeCode()" onkeydown="moveToPreviousInput(event, 1)">
                                    <input type="text" class="code-faild" maxlength="1" oninput="moveToNextInput(event, 2);mergeCode()" onkeydown="moveToPreviousInput(event, 2)">
                                    <input type="text" class="code-faild" maxlength="1" oninput="moveToNextInput(event, 3);mergeCode()" onkeydown="moveToPreviousInput(event, 3)">
                                    <input type="text" class="code-faild" maxlength="1" oninput="moveToNextInput(event, 4);mergeCode()" onkeydown="moveToPreviousInput(event, 4)">
                                </div>

                                <input name="code" type="hidden" id="mergedCode" name="mergedCode">
                                <span>@error('code')<div class="text-danger">{{ $message }}</div>@enderror</span>
                                <span>@if(session('error'))<div class="text-danger">{{ session('error') }}</div>@endif</span>
                                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Submit</button>
                                </form>
                                <!-- /Forgot Password Form -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- /Account Content -->
                    
                </div>
            </div>

        </div>

    </div>	
    <script>
        function moveToNextInput(event, nextIndex) {
            var currentInput = document.querySelector('.code-faild:nth-child(' + nextIndex + ')');
            var nextInput = document.querySelector('.code-faild:nth-child(' + (nextIndex + 1) + ')');
    
            currentInput.value = currentInput.value.replace(/[^0-9]/g, ''); // Remove non-digit characters
    
            if (currentInput.value.length >= currentInput.maxLength) {
                if (nextInput) {
                    nextInput.focus();
                }
            }
        }
    
        function moveToPreviousInput(event, previousIndex) {
            if (event.key === 'Backspace') {
                var currentInput = document.querySelector('.code-faild:nth-child(' + previousIndex + ')');
                var previousInput = document.querySelector('.code-faild:nth-child(' + (previousIndex - 1) + ')');
    
                if (currentInput.value.length === 0 && previousInput) {
                    previousInput.focus();
                }
            }
        }
        function mergeCode() {
        var inputValues = Array.from(document.querySelectorAll('.code-faild')).map(input => input.value);
        var mergedCodeInput = document.getElementById('mergedCode');
        mergedCodeInput.value = inputValues.join('');
         }
    </script>	
    <!-- /Page Content -->
@endsection