<template>
    <div class="multi-range-container">
        <div class="multi-range">
            <input name="minAmount" @input="sliderMoved('lower')" class="range" type="range" :min="minimum" :max="maximum" v-model="formData.lower" :step="step" id="lower">
            <span id="range-color" class="range-color"></span>
            <input name="maxAmount" @input="sliderMoved('upper')" class="range" type="range" :min="minimum" :max="maximum" v-model="formData.upper" :step="step" id="upper">
        </div>
        <span>{{ 'Nrs ' + this.formData.lower + ' -  Nrs ' + this.formData.upper}}</span>
    </div>
</template>

<script>
    export default  {
        mounted() {
            let self = this;
            setTimeout(function() {
                self.formData = {
                    upper: self.upper,
                    lower: self.lower
                }
            }, 1000);
        },
        props: {
              lower: {
                  type: Number,
                  default() {
                      return 0;
                  }
              },
              upper: {
                type: Number,
                default() {
                    return 10;
                }
              }
        },
        data() {
            return {
                formData : {
                    lower: 0,
                    upper: 10,
                },
                minimum: 0,
                maximum: 100000,
                step:1000,
            }
        },
        methods: {
            sliderMoved(value) {
                if(value == 'upper') {
                    if (parseInt(this.formData.upper) < parseInt(this.formData.lower) + 1000) {
                        if(parseInt(this.formData.lower) == this.minimum) {
                            this.formData.lower = parseInt(this.formData.upper);
                            this.formData.upper = parseInt(this.formData.lower) + 1000
                        }
                        else {
                            this.formData.lower = parseInt(this.formData.lower) - 1000;
                        }
                    }
                }
                if(value == 'lower') {
                    if (parseInt(this.formData.lower) > parseInt(this.formData.upper) - 1000) {
                        if(parseInt(this.formData.upper) == this.maximum) {
                            this.formData.upper = parseInt(this.formData.upper);
                            this.formData.lower = parseInt(this.formData.upper) - 1000
                        }
                        else {
                            this.formData.upper = parseInt(this.formData.upper) + 1000;
                        }
                    }
                }

                this.$emit('setSliderValue', this.formData);
            },
        },
        watch: {
            formData: {
                deep: true,
                handler() {
                    this.sliderMoved('upper');
                    this.sliderMoved('lower');
                }
            }
        }
    }
</script>

<style scoped>
    body {
        padding: 4em;
        background-color: #333;
    }

    input[type=range] {
        box-sizing: border-box;
        appearance: none;
        width: 100%;
        height: 10px;
        background-color: #b2b2b2;
        border-radius: 50px;
        margin: 0;
        border: 0;
        outline: none;
        background-size: 100% 2px;
        pointer-events: none;
        box-shadow: inset 0 0 4px #000000;
    }
    input[type=range] :active, input[type=range] :focus {
         outline: none;
     }

    input[type=range] {
        -webkit-appearance: none; /* Hides the slider so that custom slider can be made */
        width: 100%; /* Specific width is required for Firefox. */
    }

    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
    }

    input[type=range]:focus {
        outline: none; /* Removes the blue border. You should probably do some kind of focus styling for accessibility reasons though. */
    }

    input[type=range]::-ms-track {
        width: 100%;
        cursor: pointer;

        /* Hides the slider so custom styles can be added */
        background: transparent;
        border-color: transparent;
        color: transparent;
    }



    /* Special styling for WebKit/Blink */
    input[type=range]::-webkit-slider-thumb {
        height: 18px;
        width: 18px;
        border-radius: 18px;
        border: solid 1px #b2b2b2;
        background-color: #fff;
        position: relative;
        z-index: 50;
        cursor: pointer;
        appearance: none;
        pointer-events: all;
        box-shadow: 0 1px 4px 0.5px rgba(0, 0, 0, 0.25);
    }

    /* All the same stuff for Firefox */
    input[type=range]::-moz-range-thumb {
        height: 18px;
        width: 18px;
        border-radius: 18px;
        border: solid 1px #b2b2b2;
        background-color: #fff;
        position: relative;
        z-index: 50;
        cursor: pointer;
        appearance: none;
        pointer-events: all;
        box-shadow: 0 1px 4px 0.5px rgba(0, 0, 0, 0.25);
    }

    /* All the same stuff for IE */
    input[type=range]::-ms-thumb {
        height: 18px;
        width: 18px;
        border-radius: 18px;
        border: solid 1px #b2b2b2;
        background-color: #fff;
        position: relative;
        z-index: 10000;
        cursor: pointer;
        appearance: none;
        pointer-events: all;
        box-shadow: 0 1px 4px 0.5px rgba(0, 0, 0, 0.25);
    }


    .multi-range-container {
        max-width: 400px;
    }

    .multi-range {
        position: relative;
        height: 50px;
        display: block;
        width: 100%;
    }

    .multi-range input[type=range] {
        position: absolute;
    }

    .range-color {
        background-color: #f28e1c;
        border-radius: 50px;
        width: 100%;
        display: block;
        height: 10px;
        position: absolute;
        z-index: 10;
    }


    input[type=range]::-ms-track {
        width: 100%;
        height: 8.4px;
        cursor: pointer;
        background: transparent;
        border-color: transparent;
        border-width: 16px 0;
        color: transparent;
    }
    input[type=range]::-ms-fill-lower {
        background: #2a6495;
        border: 0.2px solid #010101;
        border-radius: 2.6px;
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
    }
    input[type=range]:focus::-ms-fill-lower {
        background: #3071a9;
    }
    input[type=range]::-ms-fill-upper {
        background: #3071a9;
        border: 0.2px solid #010101;
        border-radius: 2.6px;
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
    }
    input[type=range]:focus::-ms-fill-upper {
        background: #367ebd;
    }

</style>
