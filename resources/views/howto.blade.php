@extends('master')
@section('content')
    <div id="content" style="width:320px;margin:0 auto;padding:20px 0;">
        <h1>{{ trans('custom.title.howto') }}</h1>
        <p class="desc">{{ trans('custom.howto-message') }}</p>
        
        <div class="sliders">
            <ul class="bxslider">
                <li>
                    <h4>{{ trans('custom.howto-1-title') }}</h4>
                    <p>{{ trans('custom.howto-1-description') }}</p>
                    <br />
                    <div class="ip6">
                        <img src="{{URL::asset('/images/pick_up.jpg?v=2')}}" />
                    </div>
                </li>
                <li>
                    <h4>{{ trans('custom.howto-2-title') }}</h4>
                    <p>{{ trans('custom.howto-2-description') }}</p>
                    <br />
                    <div class="ip6">
                        <img src="{{URL::asset('/images/drop_off.jpg?v=2')}}" />
                    </div>
                </li>
                <li>
                    <h4>{{ trans('custom.howto-3-title') }}</h4>
                    <p>{{ trans('custom.howto-3-description') }}</p>
                    <br />
                    <div class="ip6">
                        <img src="{{URL::asset('/images/confirmation.jpg?v=2')}}" />
                    </div>
                </li>
                <li>
                    <h4>{{ trans('custom.howto-4-title') }}</h4>
                    <p>{{ trans('custom.howto-4-description') }}</p>
                    <div class="ip6">
                        <img src="{{URL::asset('/images/arrived.jpg?v=2')}}" />
                    </div>
                </li>
            </ul>
            <script>
                $('.bxslider').bxSlider({
                    auto: true,
                    infiniteLoop: true,
                    autoControls: true
                });
            </script>
        </div>
    </div>    
@endsection
