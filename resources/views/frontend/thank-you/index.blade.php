@extends('frontend.layouts.app')

@section('css')

@endsection

@section('before-content')
    @include('frontend.layouts.partials.banner')
@endsection

@section('content')
    <div class="thankyou-page-wrapper padding-top-bottom-30">
        <div class="container text-center">
            <h2 class="epu"><em>Woo-hoo!</em></h2>
            <p class="epr">You now get a shot at spin & win and stand the chance to win amazing prizes</p>
            <p>Your registered email address is <span class="epu">{{$user->email}}</span></p>
            <p>Look out for an email from us with a link to Spin the Wheel. Please check your jumk/spam mail if you do not receive the email in your inbox.</p>
            <p>Remember to retain your receipt to provide as proof of purchase. If you are the winner, you will need to present the receipt to claim your prize.</p>
        </div>
    </div>

@endsection

@section('js')

@endsection

