
@component('mail::message')

	<div class="banner-wrapper">
        <img class="hero-image" src="{{ asset('images/600x276_EmailKv.png') }}" alt="">
    </div>
    <div class="energizer-email-template-wrapper">
        <h4>Hello {{$user->first_name}} {{$user->surname}}</h4>
        <h1>YOUR ARE IN FOR THE WIN</h1>
        <p>Woo-hoo! you now get a shot at spin</p>
        <p>Go ahead and click the link below to spin the wheel for your chance to win some amazing prizes.</p>
        <a class="energizer-email-link" href="{{route('frontend.spin-and-win.index',['eut' => $user->hash])}}">{{route('frontend.spin-and-win.index',['eut' => $user->hash])}}</a>
        <p>This link for Spin & Win is valid for one time only. This link will not be valid for a second attempt. To get another chance, purchase another Energizer product* from participating UAE Carrefour outlets and register for a new attempt at www.winwithenergizer.com</p>
        <h4>The Energizer Team</h4>
    </div>


@endcomponent
