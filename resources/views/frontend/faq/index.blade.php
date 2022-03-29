@extends('frontend.layouts.app')

@section('css')

@endsection


@section('before-content')
    @include('frontend.layouts.partials.banner')
@endsection

@section('content')
<div class="faqs-wrapper padding-top-bottom-30">
    <div class="container">
        <h2 class="font-weight-bold text-center mb-5">Frequently asked questions</h2>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading active" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            How old do I need to be to enter?
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse show collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        This promotion is only open to people aged 18 years or older.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How do I enter the promotion?
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        Buy an Energizer product (batteries, battery chargers or flashlights) during the promotion period (please refer to the promotional period for your country in the campaign terms). Go to winwithenergizer.com, enter the pack’s barcode (on the reverse of the product packaging) alongside your details (name, surname and email address and mobile number). Successfully registered entry will recieved an email with an unique URL for a spin of the prize wheel online.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Can I enter the promotion if I order Energizer batteries online?
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        Yes, you can. When you receive your pack of Energizer batteries, you will then be able to go to winwithenergizer.com, select your country of residence and enter the pack’s barcode alongside your details (name, surname, email address and mobile number). Successfully registered entry will recieved an email with an unique URL for a spin of the prize wheel online.
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-4" aria-expanded="false" aria-controls="#collapse-4">
                            How long does this promotion last?
                        </a>
                    </h4>
                </div>
                <div id="collapse-4" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">
                        Please refer to the campaign terms for the promotion period.
                        Once the promotion has ended you will not be able to enter into the promotion.
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-5" aria-expanded="false" aria-controls="#collapse-5">
                            Where can I find my barcode?
                        </a>
                    </h4>
                </div>
                <div id="collapse-5" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">The barcode is printed at the back of Energizer batteries, flashlights or battery chargers pack.</div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-6" aria-expanded="false" aria-controls="#collapse-6">
                            What happens if my barcode doesn’t work?
                        </a>
                    </h4>
                </div>
                <div id="collapse-6" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">If the barcode does not work on the website, try re-entering it to make sure it is entered correctly. If you are still having problems, please contact Energizer customer services at support@winwithenergizer.com</div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-7" aria-expanded="false" aria-controls="#collapse-7">
                            Can I use a barcode more than once?
                        </a>
                    </h4>
                </div>
                <div id="collapse-7" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">No, you can only use your barcode once. You can enter the promotion a maximum of three times.</div>
                </div>
            </div>



            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-8" aria-expanded="false" aria-controls="#collapse-8">
                            I’ve input my barcode, name, surname, email address and mobile number, but I haven’t received a confirmation email.
                        </a>
                    </h4>
                </div>
                <div id="collapse-8" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">If you have entered an email address, please check your junk mail. If you still cannot find the confirmation email please contact Energizer customer services at support@winwithenergizer.com who will be able to assist you further.</div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-9" aria-expanded="false" aria-controls="#collapse-9">
                            I am experiencing issues with the Energizer promotional website, what do I do?
                        </a>
                    </h4>
                </div>
                <div id="collapse-9" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">Please try rebooting your device and refreshing the page. If you are still experiencing issues please contact Energizer customer services on support@winwithenergizer.com</div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-10" aria-expanded="false" aria-controls="#collapse-10">
                            Which Energizer products are included in this promotion?
                        </a>
                    </h4>
                </div>
                <div id="collapse-10" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">All Energizer batteries, battery chargers and flashlights. See campaign terms </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-11" aria-expanded="false" aria-controls="#collapse-11">
                            How many times can I spin the wheels?
                        </a>
                    </h4>
                </div>
                <div id="collapse-11" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">Every puchase entitle 1 spin upon registration on winwithenergizer.com.</div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-12" aria-expanded="false" aria-controls="#collapse-12">
                            How many winners will there be?
                        </a>
                    </h4>
                </div>
                <div id="collapse-12" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">A total 341 lucky winners</div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-13" aria-expanded="false" aria-controls="#collapse-13">
                            How do I know if I won?
                        </a>
                    </h4>
                </div>
                <div id="collapse-13" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">You will know it instantly after you have spinned the wheel online. If the wheel stopped spinning and landed on a prize, a winning message will be displayed in your device screen  you will also receive an email notifying you of your win.</div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-14" aria-expanded="false" aria-controls="#collapse-14">
                            How do I collect my prize if I won?
                        </a>
                    </h4>
                </div>
                <div id="collapse-14" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">
                        Upon winning, you will received a email with collection details. </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-15" aria-expanded="false" aria-controls="#collapse-15">
                            Do I need to keep my receipt showing proof of purchase?
                        </a>
                    </h4>
                </div>
                <div id="collapse-15" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">Yes, keep hold of your receipt. If you are a lucky winner you will be asked to show your receipt before you can be awarded your wish.</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-16" aria-expanded="false" aria-controls="#collapse-16">
                            Can’t find the answer you are looking for?
                        </a>
                    </h4>
                </div>
                <div id="collapse-16" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">Please contact Energizer customer services on support@winwithenergizer.com</div>
                </div>
            </div>
{{--            --}}
        </div>
    </div>
</div>


@endsection

@section('js')
<script>
    $('.panel-collapse').on('show.bs.collapse', function () {
        $(this).siblings('.panel-heading').addClass('active');
    });

    $('.panel-collapse').on('hide.bs.collapse', function () {
        $(this).siblings('.panel-heading').removeClass('active');
    });
</script>
@endsection

