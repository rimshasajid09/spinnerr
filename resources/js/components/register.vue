<template>
    <div class="container">
        <form :action="endpoints.register" method="POST" v-if="loaded">
            <div class="tabs">

                <div class="tab" v-if="tab===0">
                    <h1 class="font-weight-bold text-center font-italic epu font-3em">Enter your barcode</h1>
                    
                    <div class="form-group">
                        <input :class="{'is-invalid':form.errors.has('barcode')}" class="form-control" name="barcode"
                               placeholder="Enter barcode here" type="text" v-model="form.barcode">
                        <has-error :form="form" field="barcode"></has-error>
                    </div>
                    <div class="text-center">
                        <button @click="onBarcodeSubmit" class="btn btn-gradient epu submit-btn text-center font-30" type="button">Submit</button>
                    </div>
                    <div class="barcode-info-wrapper padding-top-30">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <h2>Here is how to find your barcode</h2>
                                    <img alt="" src="/images/barcode-info.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab" v-if="tab===1">
                    <h2 class="font-weight-bold text-center font-italic epu font-3em">
                        <i> Register for your spin</i>
                    </h2>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="text-left text-muted">✝ required fields</div>
                        <div class="d-flex justify-content-between" style="width: 100px;">
                            <a :href="language.url+'?lang=en'" v-if="language.query==='?lang=ar'">English</a>
                            <div v-else>English</div>

                            <div>|</div>
                            <a :href="language.url+'?lang=ar'" v-if="language.query!=='?lang=ar'">عربى</a>
                            <div v-else>عربى</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input :class="{'is-invalid':form.errors.has('first_name')}" class="form-control"
                                       name="first_name" :placeholder="trans.first_name" type="text" v-model="form.first_name">
                                <has-error :form="form" field="first_name"></has-error>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input :class="{'is-invalid':form.errors.has('surname')}" class="form-control"
                                       name="surname" :placeholder="trans.surname" type="text" v-model="form.surname">
                                <has-error :form="form" field="surname"></has-error>

                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input :class="{'is-invalid':form.errors.has('country_code')}" class="form-control"
                                       disabled name="country_code" placeholder="+971" type="text" value="+971">
                                <has-error :form="form" field="country_code"></has-error>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input :class="{'is-invalid':form.errors.has('phone')}" class="form-control"
                                       name="phone" :placeholder="trans.phone" type="number" v-model="form.phone">
                                <has-error :form="form" field="phone"></has-error>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input :class="{'is-invalid':form.errors.has('email')}" class="form-control"
                                       name="email" :placeholder="trans.email" type="email" v-model="form.email">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input :class="{'is-invalid':form.errors.has('email_confirmation')}"
                                       class="form-control" name="email_confirmation" :placeholder="trans.confirm_email"
                                       type="email" v-model="form.email_confirmation">
                                <has-error :form="form" field="email_confirmation"></has-error>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <div :class="{'is-invalid':form.errors.has('promotion')}" class="check-box-group">
                                <input :class="{'is-invalid':form.errors.has('promotion')}" id="promotion"
                                       name="promotion" type="checkbox" v-model="form.promotion">
                                <label for="promotion">{{ trans.field_promotion }}</label>
                                <has-error :form="form" field="promotion"></has-error>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div :class="{'is-invalid':form.errors.has('age')}" class="check-box-group">
                                <input :class="{'is-invalid':form.errors.has('age')}" id="age" name="age"
                                       type="checkbox" v-model="form.age">
                                <label for="age">{{ trans.field_age }}</label>
                                <has-error :form="form" field="age"></has-error>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div :class="{'is-invalid':form.errors.has('privacy')}" class="check-box-group">
                                <input :class="{'is-invalid':form.errors.has('privacy')}" id="privacy" name="privacy"
                                       type="checkbox" v-model="form.privacy">
                                <label for="privacy">{{ trans.field_tnc }}</label>
                                <has-error :form="form" field="privacy"></has-error>
                            </div>

                        </div>
                        <!--                        <div class="g-recaptcha my-4" data-callback="recaptchaCallback" data-sitekey=""></div>-->
                        <!-- <div class="col-sm-12">
                            <vue-recaptcha :loadRecaptchaScript="true" @verify="form.validate=true"
                                           class=""
                                           sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"/>
                        </div> -->
                        <!-- <div class="col-sm-12">
                            <p class="text-danger" v-if="form.errors.has('validate')">Please check recaptcha to
                                proceed</p>

                        </div> -->
                        <div class="col-sm-12 mt-4">
                            <p class="mb-0">A link for the spin will be sent in the registered email, so please make
                                sure the email address you entered is correct.
                            </p>
                            <p><strong>Important:</strong> Remember to keep your receipt with you. If you are the winner,
                                you will need to present the purchase receipt upon claiming the prize.</p>
                            <div class="text-center mt-5">
                                <button :disabled="form.busy" @click.prevent="register" class="btn btn-gradient submit-btn text-center font-30"
                                        id="submitBtn" type="submit">
                                    <template v-if="form.busy"><i class="fas fa-spinner fa-spin"></i></template>
                                    <template v-else>Submit</template>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>
    </div>
</template>

<script>
    import {HasError, Form} from 'vform';
    // import VueRecaptcha from 'vue-recaptcha';

    export default {
        name: "register",
        components: {
            HasError,
            // VueRecaptcha
        },

        created() {
            this.get();
        },
        data() {
            return {
                language:{
                    url:window.location.origin,
                    query:window.location.search
                },
                loaded: false,
                tab: 0,
                form: new Form({
                    // barcode:'7638900257045',
                    // first_name: 'Faran',
                    // surname: 'Ali',
                    // country_code: '+971',
                    // phone: '522633511',
                    // email: 'faran@gmail.com',
                    // email_confirmation: 'faran@gmail.com',
                    // promotion: true,
                    // age: true,
                    // privacy: true,
                    // validate: null

                    barcode: null,
                    first_name: null,
                    surname: null,
                    country_code: '+971',
                    phone: null,
                    email: null,
                    email_confirmation: null,
                    validate: null

                }),

                endpoints: {
                    register: '/register',
                    barcode: '/register?verify=1'
                }
            }
        },

        methods: {
            register() {
                this.form.post(this.endpoints.register)
                    .then((response) => {
                        window.location.href = response.data.redirect;
                    })
                    .catch((error) => {
                        if (error.response.status === 422) {
                            this.tab = this.form.errors.has('barcode') ? 0 : 1;
                        }
                    })
                ;
            },

            onBarcodeSubmit() {
                this.form.post(this.endpoints.barcode)
                    .then((response) => {
                        this.tab = 1;
                    })
                    .catch((error) => {
                    })
                ;
            },

            get() {
                let query = (new URL(window.location.href)).search
                this.$axios.get('api/register' + query)
                    .then((response) => {
                        this.trans = response.data.trans;
                        this.loaded = true;
                    })
                    .catch((error) => {
                    })
                ;
            }

        }
    }
</script>

<style scoped>
    .page-title{
        font-size: 2.4em;
    }
</style>
