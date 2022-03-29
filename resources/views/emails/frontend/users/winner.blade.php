
@component('mail::message')
<div class="banner-wrapper">
<img class="hero-image" src="{{ asset('/images/winner-banner.png') }}" alt="">
</div>
<div class="energizer-email-template-wrapper">
<h4>Hello {{$user->name }}</h4>
<p>Congratulations you have won</p>
<h1>{{ $user->outcome->prize->name }}</h1>

<p>collection code: {{ str_pad($user->outcome->id,6,0,STR_PAD_LEFT) }}</p>
<p>Where can I collect my prize from?</p>
<p>Please show this email along with the purchase receipt and your Emirates ID to collect your prize at the following lccation:</p>
<p>Samsung Building at Dubai Media City. Come to the reception at the lobby and ask to visit Cheil office on Level 2 from Sun-Thu, 10am-5pm. https://goo.gl/maps/JkvJRveLsZG4Vi287</p>
<p>Please collect your prize within 30 days of receiving this email. Prizes not collected within this period wll be forfeited.</p>
<h4>The Energizer Team</h4>
</div>


@endcomponent
