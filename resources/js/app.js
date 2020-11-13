/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import VueSweetalert2 from 'vue-sweetalert2';
import "sweetalert2/dist/sweetalert2.min.css";
import IMask from 'imask';

const sweetOptions = {
    width: '64rem',
    padding: '2.25rem',
    customClass: {
        confirmButton: 'text-center content-center btn text-white font-bold text-18 py-4 w-1/2 bg-blue-00849c',
        cancelButton: 'text-center content-center btn text-white font-bold text-18 py-4 w-1/2 bg-red-ce1400',
        title: 'text-18',
        content: 'text-16',
    },
    showClass: {
        popup: 'swal2-show',
        backdrop: 'swal2-backdrop-show',
        icon: 'swal2-icon-show'
    },
    hideClass: {
        popup: 'swal2-hide',
        backdrop: 'swal2-backdrop-hide',
        icon: 'swal2-icon-hide'
    },
    buttonsStyling: false
};

// open dropdown with account info in header section
var ado = document.getElementById('account-drop-opener'),
    adh = document.getElementById('account-drop-holder');
if (ado && adh) {
    ado.onclick = () => {
        adh.classList.contains('opened')
            ? adh.classList.remove('opened')
            : adh.classList.add('opened');
    };
    document.addEventListener('click', (evt) => {
        if (!evt.target.matches('#account-drop-holder *')) {
            adh.classList.contains('opened')
                ? adh.classList.remove('opened')
                : '';
        }
    });
}

import Vue from 'vue';
import { flare } from "@flareapp/flare-client";
import { flareVue } from "@flareapp/flare-vue";
import Vue2TouchEvents from 'vue2-touch-events'


// only launch in production, we don't want to waste your quota while you're developing.
if (process.env.NODE_ENV !== 'local') {
    flare.light(process.env.MIX_FLARE_JS_KEY);
    Vue.use(flareVue);
}


Vue.component('modal', { template: '#modal-template' });

Vue.use(VueSweetalert2, sweetOptions);
Vue.use(Vue2TouchEvents);


const componentList = {
    "dash-app": {
        DataCharts: () => import(/* webpackChunkName:"datacharts-component" */ './components/DataCharts.vue'),
        SalesDash: () => import(/* webpackChunkName:"salesdash-component" */ './components/SalesDash.vue'),
        AdminDash: () => import(/* webpackChunkName:"admindash-component" */ './components/AdminDash.vue'),
        DispositionModal: () => import(/* webpackChunkName:"dispositionmodal-component" */ './components/DispositionModal.vue'),
    },
    "analysis-app": {
        QuestionsSection: () => import(/* webpackChunkName:"questionssection-component" */ './components/QuestionsSection.vue'),
        MultipleChoice: () => import(/* webpackChunkName:"multiplechoice-component" */ './components/question-forms/MultipleChoice.vue'),
        AdditionalComments: () => import(/* webpackChunkName:"additionalcomments-component" */ './components/question-forms/AdditionalComments.vue'),
        YesnoChoice: () => import(/* webpackChunkName:"yesnochoice-component" */ './components/question-forms/YesNoChoice.vue'),
        TextField: () => import(/* webpackChunkName:"textfield-component" */ './components/question-forms/TextField.vue'),
        LongTextField: () => import(/* webpackChunkName:"longtextfield-component" */ './components/question-forms/LongTextField.vue'),
        DispositionModal: () => import(/* webpackChunkName:"dispositionmodal-component" */ './components/DispositionModal.vue'),
    },
    "measurements-app": {
        MeasurementSection: () => import(/* webpackChunkName:"measurementsection-component" */ './components/MeasurementSection.vue'),
        DispositionModal: () => import(/* webpackChunkName:"dispositionmodal-component" */ './components/DispositionModal.vue'),
    },
    "buildestimate-app": {
        ShowerPans: () => import(/* webpackChunkName:"showerpans-component" */ './components/build-estimate/ShowerPans.vue'),
        BathTubs: () => import(/* webpackChunkName:"bathtubs-component" */ './components/build-estimate/BathTubs.vue'),
        WalkInBaths: () => import(/* webpackChunkName:"bathtubs-component" */ './components/build-estimate/WalkInBaths.vue'),
        WallsJointsTrim: () => import(/* webpackChunkName:"wallsjointstrim-component" */ './components/build-estimate/WallsJointsTrim.vue'),
        FixturesAccessories: () => import(/* webpackChunkName:"fixturesaccessories-component" */ './components/build-estimate/FixturesAccessories.vue'),
        ShowerDoors: () => import(/* webpackChunkName:"showerdoors-component" */ './components/build-estimate/ShowerDoors.vue'),
        BathTubDoors: () => import(/* webpackChunkName:"bathtubdoors-component" */ './components/build-estimate/BathTubDoors.vue'),
        ConstructionAddition: () => import(/* webpackChunkName:"constructionaddition-component" */ './components/build-estimate/ConstructionAddition.vue'),
        DispositionModal: () => import(/* webpackChunkName:"dispositionmodal-component" */ './components/DispositionModal.vue'),
    },
    "rollsheet-app": {
        ProductInfo: () => import(/* webpackChunkName:"productinfo-component" */ './components/ProductInfo'),
        DispositionModal: () => import(/* webpackChunkName:"dispositionmodal-component" */ './components/DispositionModal.vue'),
    },
    "salesdoc-app": {
        HomeownersContact: () => import('./components/HomeownersContact'),
        Payment: () => import(/* webpackChunkName:"deposit-component" */ './components/Payment'),
        SaleDocumentSigner: () => import(/* webpackChunkName:"sale-document-signer-component" */ './components/SaleDocumentSigner'),
        DispositionModal: () => import(/* webpackChunkName:"dispositionmodal-component" */ './components/DispositionModal.vue'),
    }

}

const arrayOfContainers = [
    document.getElementById('dash-app'),
    document.getElementById('analysis-app'),
    document.getElementById('measurements-app'),
    document.getElementById('buildestimate-app'),
    document.getElementById('rollsheet-app'),
    document.getElementById('salesdoc-app'),
]

const vueContainer = arrayOfContainers.find(container => container !== null)

if(vueContainer){
    const vueApp = new Vue({
        el: vueContainer,
        data: {
            dropOpened: false,
            activeSection: null,
            currentLeadId: null,
            dispositionModal: false,
            selectedDisposition: null,
            openedDrop: {
                index: null,
                value: '',
            },
        },
        components: componentList[vueContainer.id],
        methods: {
            componentLoaded(el) {
                let loadingScreen = document.getElementById(el + '-loader');
                if (loadingScreen) {
                    loadingScreen.style.display = 'none';
                }
            },
        },
    });
}



let tabset = document.getElementById('tabset');

if (tabset) {
    let links = tabset.querySelectorAll('a');
    for (let i = 0; i < links.length; i++) {
        links[i].onclick = function (e) {
            e.preventDefault();
            if (!links[i].parentElement.classList.contains('active-tab')) {
                let activeEl = tabset.querySelector('.active-tab');
                activeEl.classList.remove('active-tab');
                document.getElementById(
                    activeEl.querySelector('a').getAttribute('href')).classList.add('hidden');
                links[i].parentElement.classList.add('active-tab');
                activeEl = tabset.querySelector('.active-tab');
                document.getElementById(
                    activeEl.querySelector('a').getAttribute('href')).classList.remove('hidden');
            }
        };
    }
}

let finalPaymentType = document.getElementById('final-payment-type');

if (finalPaymentType) {
    let links = finalPaymentType.querySelectorAll('span');

    for (let i = 0; i < links.length; i++) {
        links[i].onclick = function () {
            if (!links[i].classList.contains('active')) {
                finalPaymentType.querySelector('.active').classList.add('bg-gray-fafafa',
                    'border-gray-e5e5e5');
                finalPaymentType.querySelector('.active').classList.remove('active',
                    'bg-blue-00849c',
                    'text-white',
                    'border-blue-00849c');

                links[i].classList.add('active', 'bg-blue-00849c', 'text-white',
                    'border-blue-00849c');

                if (links[i].classList.contains('credit-card')) {
                    document.getElementById('final-payment-type-form').classList.remove('hidden');
                } else {
                    document.getElementById('final-payment-type-form').classList.add('hidden');
                }
            }
        };
    }
}

let depositPaymentType = document.getElementById('deposit-payment-type');

if (depositPaymentType) {
    let links = depositPaymentType.querySelectorAll('span');

    for (let i = 0; i < links.length; i++) {
        links[i].onclick = function () {
            if (!links[i].classList.contains('active')) {
                depositPaymentType.querySelector('.active').classList.add('bg-gray-fafafa',
                    'border-gray-e5e5e5');
                depositPaymentType.querySelector('.active').classList.remove('active',
                    'bg-blue-00849c',
                    'text-white',
                    'border-blue-00849c');

                links[i].classList.add('active', 'bg-blue-00849c', 'text-white',
                    'border-blue-00849c');

                if (links[i].classList.contains('credit-card')) {
                    document.getElementById('deposit-payment-type-form').classList.remove('hidden');
                } else {
                    document.getElementById('deposit-payment-type-form').classList.add('hidden');
                }
            }
        };
    }
}

let interestRate = document.getElementById('interest-rate');

if (interestRate) {
    let links = interestRate.querySelectorAll('span');

    for (let i = 0; i < links.length; i++) {
        links[i].onclick = function () {
            if (!links[i].classList.contains('active')) {
                interestRate.querySelector('.active').classList.add('bg-gray-fafafa',
                    'border-gray-e5e5e5');
                interestRate.querySelector('.active').classList.remove('active',
                    'bg-blue-00849c',
                    'text-white',
                    'border-blue-00849c');

                links[i].classList.add('active', 'bg-blue-00849c', 'text-white',
                    'border-blue-00849c');
            }
        };
    }
}

let veteransDiscount = document.getElementById('veterans-discount');

if (veteransDiscount) {
    let links = veteransDiscount.querySelectorAll('span');

    for (let i = 0; i < links.length; i++) {
        links[i].onclick = function () {
            if (!links[i].classList.contains('active')) {
                veteransDiscount.querySelector('.active').classList.add('bg-gray-fafafa',
                    'border-gray-e5e5e5');
                veteransDiscount.querySelector('.active').classList.remove('active',
                    'bg-blue-00849c',
                    'text-white',
                    'border-blue-00849c');

                links[i].classList.add('active', 'bg-blue-00849c', 'text-white',
                    'border-blue-00849c');
            }
        };
    }
}


const paymentFields = document.querySelectorAll('.payment-field');

if(paymentFields.length){
    paymentFields.forEach(field => {
        IMask(field,{
            mask: '$num',
            blocks: {
                num: {
                    mask: Number,
                    scale: 2,
                    radix: '.',
                    thousandsSeparator: ',',
                    padFractionalZeros: true
                },
            }
        });
    })
}
