const { result } = require("lodash");

var generate = $('.generate-button');

generate.on('click', (event) => {
    event.preventDefault();
    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    
    function getPasswordString() {
        var min_length = 8;
        var max_length = 12;
        var result = "";
        var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        var symbols = "!£$%^&*@#";
        var digits = "0123456789"
        var pool = [letters, symbols, digits];

        for (let index = 1; index < getRandomInt(min_length, max_length); index++) {
            source = pool[Math.floor(Math.random() * pool.length)];
            item = source[Math.floor(Math.random() * source.length)];
            result += item;
        }
        return result;
    }

    var result = getPasswordString();

    $('#password').val(result);
    $('#password-confirm').val(result);
    $('#password').attr('type', 'text');
    $('#password-confirm').attr('type', 'text');
    $('.generated-message').text('Make sure you save the password in a secure location.');

});