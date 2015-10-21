<div class="col-md-6 col-md-offset-4">
                    {!! app('captcha')->display(); !!}
                    <div class="bg-danger" id="catch">{{$errors->first('g-recaptcha-response')}}</div>
                  </div>