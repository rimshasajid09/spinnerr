@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
    <table class="footer-links">
        <tr>
            <td style="padding:15px;"><a href="#">Energizer T&Cs</a></td>
            <td style="padding:15px;"><a href="#">FAQs</a></td>
            <td style="padding:15px;"><a href="#">Privacy Policy</a></td>
            <td style="padding:15px;"><a href="#">Energizer</a></td>
        </tr>
    </table>
    <p class="text-center mt-4">Promotion is valid from 23rd March to 21st April, 2020. Purchase Energizer• batteries, battery chargers and/or flashlights.—Enter barcode and details at energizercelebrations.com for a chance to
        win MAF entertainment in the UAE. Every registration gets ONE spin per entry. Only valid with purchase from participating Carrefour branches in the UAE (Dubai, Sharjah, Abu Dhabi and Al Ain).
        <br>
        *See website for full terms and prize details.
    </p>
    <p class="text-center">&copy; 2020 Energizer and certain graphics are trademark of Energizer Brand, LLC and related subsidiaries</p>
@endcomponent
@endslot
@endcomponent
