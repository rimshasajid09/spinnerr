<template>
    <div class="spin-wheel-wrapper container">
        <div class="logo-wrapper">
            <img alt="" src="/images/energizer-logo.png">
        </div>
        <div class="spin-and-win-wrapper">
            <p class="spin-and-win"><i>Spin and Win</i></p>
        </div>

        <div class="content-wrapper">
            <div>
                <div class="wheel-wrapper" id="wheel-wrapper">
                    <div class="wheel-inner-wrapper" id="wheel-inner-wrapper">
                        <v-stage :config="canvasConfig" id="wheel" ref="wheel">
                        </v-stage>
                    </div>
                    <div class="wheel-shadow"></div>
                    <img alt="" class="character" src="/images/character.png">

                </div>
            </div>
            <div class="content" v-if="api.user">
                <p class="greeting epr">Hello, <br> <strong>{{ api.user.name }}</strong></p>
                <p class="info ep"><em> <strong>You have one spin</strong></em></p>

                <button :disabled="spinAlreadyUsed" @click="spin" class="btn btn-gradient btn-spin ep">Spin Now</button>
            </div>


            <div class="tag-line-wrapper">
                <h2 class="tag-line">
                    <em>For a <br> <strong class="epu text-uppercase ll">Longer Lasting</strong> <br> Adventure</em>
                </h2>
            </div>
        </div>
        <div aria-hidden="true" aria-labelledby="exampleModalCenterTitle" class="modal fade" id="outcome-modal" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content energizer-modal">

                    <div class="modal-body text-center padding-top-bottom-30">
                        <h2 class="font-weight-bold font-italic ">{{ modalContent.title }}</h2>
                        <p class="mb-0 font-20">{{ modalContent.detail }}</p>
                        <a :href="modalContent.link+'?eut='+eut" class="btn submit-btn btn-gradient text-uppercase">{{ modalContent.button }}</a>
                    </div>

                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {

        created() {
        },
        mounted() {
            this.api._n = Math.ceil(Math.random() * this.wedgeCount);
            this.createWheel();
            let scale = 1;


            if (document.body.clientWidth < 350) {
                scale = document.body.clientWidth / 700;
                document.getElementById('wheel-wrapper').style.transform = `translateX(-50%) scale(${scale}) translateY(${scale*(-(document.body.clientWidth*2.5))}px)`;

            }

            else if (document.body.clientWidth < 400) {
                scale = document.body.clientWidth / 700;
                document.getElementById('wheel-wrapper').style.transform = `translateX(-50%) scale(${scale}) translateY(${scale*(-(document.body.clientWidth*1.5))}px)`;

            }


            else if (document.body.clientWidth < 500) {
                scale = document.body.clientWidth / 650;
                document.getElementById('wheel-wrapper').style.transform = `translateX(-50%) scale(${scale}) translateY(${scale*(-(document.body.clientWidth*0.7))}px)`;

            }
            else if (document.body.clientWidth < 767) {
                scale = document.body.clientWidth / 767;
                document.getElementById('wheel-wrapper').style.transform = `translateX(-50%) scale(${scale}) translateY(${scale*(-50)}px)`;

            } else {
                scale = document.body.clientWidth / 1600;
                document.getElementById('wheel-wrapper').style.transform = `translateX(-50%) scale(${scale})`;
            }

            this.eut = (new URL(window.location.href)).searchParams.get('eut');
            this.get();
            // document.body.onresize = () => {
            //     let s = document.body.clientWidth / 1585;
            //     document.getElementById('wheel-wrapper').style.transform = `translateX(-50%) scale(${s})`;
            // };
        },

        data() {
            return {
                canvasConfig: {
                    width: 500,
                    height: 500
                },

                modalContent: {},
                eut: null,

                spinAlreadyUsed: null,


                stage: null,
                layer: null,
                wheel: null,
                anim: null,
                wedges: [],
                angularVelocity: 0,
                angularVelocities: [],
                angularFriction: 0.2,
                lastRotation: 0,
                target: null,
                finished: true,
                initialVelocity: null,
                wedgeCount: 10,
                api: {
                    user: null,
                    _n: null,
                    wedges: [
                        {
                            image: {
                                src: '/images/wedges/try-again.png',
                                x: 140,
                                y: 45,
                                rotation: 108,
                                offset: {
                                    x: 29,
                                    y: 22
                                }
                            }
                        },
                        {
                            image: {
                                src: '/images/wedges/ski-voucher.png',
                                x: 130,
                                y: 42,
                                rotation: 109,
                                offset: {
                                    x: 30,
                                    y: 50
                                }
                            }
                        },
                        {
                            image: {
                                src: '/images/wedges/try-again.png',
                                x: 140,
                                y: 45,
                                rotation: 108,
                                offset: {
                                    x: 29,
                                    y: 22
                                }
                            }
                        },
                        {
                            image: {
                                src: '/images/wedges/game-points.png',
                                x: 135,
                                y: 40,
                                rotation: 108,
                                offset: {
                                    x: 39,
                                    y: 45
                                }
                            }
                        },
                        {
                            image: {
                                src: '/images/wedges/try-again.png',
                                x: 140,
                                y: 45,
                                rotation: 108,
                                offset: {
                                    x: 29,
                                    y: 22
                                }
                            }
                        },
                        {
                            image: {
                                src: '/images/wedges/vr-vouchers.png',
                                x: 140,
                                y: 46,
                                rotation: 107,
                                offset: {
                                    x: 31,
                                    y: 40
                                }
                            }
                        },
                        {
                            image: {
                                src: '/images/wedges/try-again.png',
                                x: 140,
                                y: 45,
                                rotation: 108,
                                offset: {
                                    x: 29,
                                    y: 22
                                }
                            }
                        },
                        {
                            image: {
                                src: '/images/wedges/ifly-voucher.png',
                                x: 130,
                                y: 40,
                                rotation: 108,
                                offset: {
                                    x: 29,
                                    y: 48
                                }
                            }
                        },
                        {
                            image: {
                                src: '/images/wedges/try-again.png',
                                x: 140,
                                y: 45,
                                rotation: 108,
                                offset: {
                                    x: 29,
                                    y: 22
                                }
                            }
                        },
                        {
                            image: {
                                src: '/images/wedges/Cinema-ticket.png',
                                x: 140,
                                y: 45,
                                rotation: 108,
                                offset: {
                                    x: 50,
                                    y: 43
                                }
                            }
                        },
                    ],
                    outcomes: {
                        content: {
                            won: {
                                title: 'Yay!',
                                detail: 'You\'ve won!',
                                button: 'claim your prize',
                                link: '/winner',
                            },
                            lost: {
                                title: 'oh no!',
                                detail: 'No luck this time!',
                                button: 'try again',
                                link: '/try-again',
                            }
                        }
                    }
                }
            }
        },

        computed: {},


        methods: {
            get() {
                this.$axios.get('/api/spin-and-win', {
                    params: {
                        eut: this.eut
                    }
                })
                    .then((response) => {
                        this.api._n = parseInt(response.data._user_identifier[0]);
                        this.api.user = response.data.user;
                    })
                    .catch((error) => {
                    })
                ;
            },
            createWheel() {
                this.stage = this.$refs.wheel.getStage();
                this.layer = new Konva.Layer();
                this.wheel = new Konva.Group({});


                this.wheel.setOffset({x: this.stage.width() / 2, y: this.stage.width() / 2});
                this.wheel.setPosition({x: this.stage.width() / 2, y: this.stage.width() / 2});

                let group = new Konva.Group({
                    x: this.stage.width() / 2,
                    y: this.stage.height() / 2,
                });


                Konva.Image.fromURL('/images/snip-circle.gif', function (darthNode) {
                    darthNode.setAttrs({
                        x: 0,
                        y: 0,
                        width: 500,
                        height: 500,
                        offset: {
                            x: 250,
                            y: 250
                        }
                    });
                    group.add(darthNode);
                });


                Konva.Image.fromURL('/images/center-circle.png', (darthNode) => {
                    darthNode.setAttrs({
                        x: this.stage.width() / 2,
                        y: this.stage.height() / 2,
                        width: 120,
                        height: 120,
                        offset: {
                            x: 60,
                            y: 60
                        }
                    });
                    this.layer.add(darthNode);
                });

                this.layer.add(group);


                this.addWedges();

                this.layer.add(this.wheel);


                let g = new Konva.Group({
                    x: (this.stage.width() / 2) - 18,
                    y: 0,
                });
                let pointer = new Konva.Line({
                    points: [
                        0, 0,
                        36, 0,
                        18, 70
                    ],
                    fill: '#f8af40',
                    strokeWidth: 1,
                    closed: true,
                    shadowColor: 'black',
                    shadowBlur: 10,
                    shadowOffset: {x: -5, y: 10},
                    shadowOpacity: 0.7
                });
                g.add(pointer);
                this.layer.add(g);
                this.stage.add(this.layer);


                this.anim = new Konva.Animation(this.onFrameUpdate, this.layer);


                this.anim.start();

            },

            onFrameUpdate() {

                let angularVelocityChange =
                    (this.angularVelocity * 15 * (1 - this.angularFriction)) / 1000;
                this.angularVelocity -= angularVelocityChange;


                let diff = (15 * this.angularVelocity) / 1000;
                if (diff > 0.001) {
                    if (!this.initialVelocity) {
                        this.initialVelocity = this.angularVelocity;
                        this.calculateEndRotation({
                            velocity: this.initialVelocity,
                            rotation: this.wheel.rotation()
                        });
                    }
                    this.wheel.rotate(diff);
                } else if (!this.finished) {

                    this.onOutcome();
                    this.finished = true;
                    this.initialVelocity = null;
                }
                this.lastRotation = this.wheel.rotation();
            },

            addWedges() {

                for (let i = 0; i < this.wedgeCount; i++) {
                    let group = new Konva.Group({
                        rotation: (360 / this.wedgeCount) * i,
                        x: this.stage.width() / 2,
                        y: this.stage.height() / 2,
                    });
                    let wedge = new Konva.Wedge({
                        radius: (this.stage.width() / 2) - 35,
                        angle: 360 / this.wedgeCount,
                        fill: ['#e7232e', '#f7f7f7'][i % 2],
                        stroke: 'black',
                        strokeWidth: 0,
                    });
                    group.startRotation = group.rotation();
                    group.add(wedge);


                    // alternative API:
                    if (true) {
                        Konva.Image.fromURL(this.api.wedges[i].image.src, (darthNode) => {
                            darthNode.setAttrs({
                                x: this.api.wedges[i].image.x,
                                y: this.api.wedges[i].image.y,

                                scaleX: 1.1,
                                scaleY: 1.1,
                                rotation: this.api.wedges[i].image.rotation,
                                offset: this.api.wedges[i].image.offset
                            });
                            group.add(darthNode);
                        });
                    }

                    if (false) {
                        let text = new Konva.Text({
                            text: i,
                            fontFamily: 'Calibri',
                            fontSize: 50,
                            fill: 'green',
                            align: 'center',
                            x: wedge.radius() / 2,
                            y: 0,
                            rotation: 108,
                            listening: false,
                        });

                        text.setOffset({
                            x: (text.getWidth() / 2),
                            y: (text.getHeight() / 2)
                        });
                        text.setY(
                            Math.sin(this.degreesToRadians(180 / this.wedgeCount)) * (text.getX())
                        );

                        group.add(text);
                    }

                    this.wedges.push(group);
                    this.wheel.add(group);
                }


                window.w = this.wedges;

                // add the shape to the layer
            },

            onOutcome() {
                this.modalContent = this.api._n % 2 ? this.api.outcomes.content.won : this.api.outcomes.content.lost;
                $('#outcome-modal').modal('show');

                this.$axios.post('/api/spin-and-win', {
                    rotation: this.wheel.rotation(),
                    eut: this.eut,
                    outcome: this.api._n
                })
                    .then((response) => {

                    })
                    .catch((error) => {
                    })
                ;
            },


            getAverageAngularVelocity() {
                let total = 0;
                let len = this.angularVelocities.length;


                if (len === 0) {
                    return 0;
                }

                for (let n = 0; n < len; n++) {
                    total += this.angularVelocities[n];
                }

                return total / len;
            },

            degreesToRadians(degrees) {
                return degrees * Math.PI / 180;
            },

            radiansToDegrees(degrees) {
                return degrees * 180 / Math.PI;
            },

            calculateEndRotation(data) {
                let velocity = data.velocity;
                let rotation = data.rotation;

                let angularVelocityChange =
                    (velocity * 15 * (1 - this.angularFriction)) / 1000;


                for (let diff = 1; diff > 0.001;) {
                    angularVelocityChange =
                        (velocity * 15 * (1 - this.angularFriction)) / 1000;
                    diff = (15 * velocity) / 1000;
                    rotation += diff;
                    velocity -= angularVelocityChange;

                }
                const random = (Math.random() * ((360 / this.wedgeCount)));
                this.wedges.forEach((wedge, i) => {
                    let multiplier = i - this.api._n;
                    if (multiplier < 0)
                        multiplier += this.wedgeCount;
                    let ini = (360 / this.wedgeCount) * (multiplier);
                    wedge.setRotation(ini);

                    wedge.rotate((270 - (rotation) - random) % 360);
                });

                return {
                    velocity,
                    rotation: (rotation % 360) + 22.5
                };

            },

            spin() {
                if (!this.spinAlreadyUsed) {
                    this.spinAlreadyUsed = true;
                    this.angularVelocity = 2000;
                    this.finished = false;
                }
            }

        }

    }
</script>


<style lang="scss">


</style>
