@extends('frontend.layouts.app')

@section('css')

@endsection

@section('before-content')
{{--    <div>--}}
{{--        <div class="text-right">--}}
{{--            <label class="my-0 py-2">--}}
{{--                <select name="language" id="languageSelectBox" style="height:30px">--}}
{{--                    <option value="en" class="py-1" @if(request()->query('lang')!=='ar') selected @endif>English</option>--}}
{{--                    <option value="ar" class="py-1" @if(request()->query('lang')==='ar') selected @endif>العربية</option>--}}
{{--                </select>--}}
{{--            </label>--}}

{{--        </div>--}}
{{--    </div>--}}
    @include('frontend.layouts.partials.banner')
@endsection

@section('content')
    <div class="register-wrapper padding-top-bottom-30">
        <register>

        </register>

    </div>


@endsection

@section('js')

    <!-- <script type="text/javascript">
        document.getElementById('languageSelectBox').addEventListener('change',function (e) {
            window.location.href = '?lang='+e.target.value;
        });

    </script> -->

@endsection
