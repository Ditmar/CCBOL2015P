{!! app('captcha')->display(); !!}
<div class="bg-danger" id="catch">{{$errors->first('g-recaptcha-response')}}</div>