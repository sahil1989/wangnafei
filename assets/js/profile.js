$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    endDate: new Date()
});

var vm = new Vue({
    el: '#profileEditApp',
    data: {
        model: {
            countries: [],
            states: [],
            cities: [],

            country: 0,
            state: 0,
            city: 0
        }
    },
    methods: {
        loadStates: function() {
            var that = this;
            $.ajax({
                async: false,
                type: 'GET',
                url: '/profile/get_states/' + that.model.country,
            }).success(function (data) {
                that.model.states = $.parseJSON(data);
                that.$emit('data-loaded');

            });
        },
        loadCities: function() {
            var that = this;
            $.ajax({
                async: false,
                type: 'GET',
                url: '/profile/get_cities/' + that.model.state,
            }).success(function (data) {
                that.model.cities = $.parseJSON(data);
                that.$emit('data-loaded');
            });
        }
    },
    ready: function () {
        this.model.countries = document.countries;
        this.model.country = document.country;
        this.loadStates();
        this.model.state= document.state;
        this.loadCities();
        this.model.city= document.city;
    }
});