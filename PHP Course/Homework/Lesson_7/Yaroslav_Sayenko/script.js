(function ($) {

    'use strict';

    $(document).ready(function() {

        $('#form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                s_name: "required",
                email: {
                    required: true,
                    myEmail: true
                }
            },
            messages: {
                name: {
                    required: "Введите имя",
                    minlength: "Имя слишком короткое"
                },
                s_name: "Введите фамилию",
                email: {
                    required: "Введите email",
                    minlength: "Введите корректный email"
                }
            },
            submitHandler: function() {
                $.ajax({
                    url: "registration_form.php",
                    type: "POST",
                    data: $("#form").serialize(),
                    success: function (result) {
                        if(result == '') {
                            $('#form')[0].reset()
                            $("#errors").empty();
                        }
                        else {
                            $("#errors").text(result);
                        }
                    }
                });
            }
        });

        jQuery.validator.addMethod("myEmail", function(value, element) {
            return this.optional( element ) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test( value );
        }, 'Введите корректный email');

    });

}(jQuery));