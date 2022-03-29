@extends('frontend.layouts.app')

@section('css')

@endsection

@section('before-content')
    @include('frontend.layouts.partials.banner')
@endsection

@section('content')
    <div class="winner-page-wrapper padding-top-bottom-30">
        <div class="container text-center">
            <h2 class="font-weight-bold font-italic">Congratulations!</h2>
            <p>You've won:<strong class="font-20">{{ $user->outcome->prize->name }}</strong>.</p>
            <p>Now all you need to do is wait for an email from us to confirm where and when you can pick up your prize. Stay tuned to your inbox for updates.</p>
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="winner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content energizer-modal">

                        <div class="modal-body text-center padding-top-bottom-30">
                            <h2 class="font-weight-bold font-italic ">Yay!</h2>
                            <p class="mb-0 font-20">You've won!</p>
                            <button class="btn btn-gradient submit-btn text-uppercase">Claim your prize</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')

@endsection

