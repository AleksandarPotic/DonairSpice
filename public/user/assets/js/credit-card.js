$(".place_button").click(function () {

		    $("#form_information").submit();

        });
        $(document).ready(function () {

            $("#cvv").keyup(function () {
                var cvv = $("#cvv").val();
                if (cvv.length >= 4) {
                    $("#cvv").attr('type', 'text');
                    $("#cvv").attr('maxlength', '4');
                } else {
                    $("#cvv").attr('type', 'number');
                }
            });
            $(".input-card").keyup(function () {

                var card = $("#card_number_valid").val();
                var cvv = $("#cvv").val();
                if (card.length >= 19) {
                    $("#card_number_valid").attr('type', 'text');
                    $("#card_number_valid").attr('maxlength', '19');
                } else {
                    $("#card_number_valid").attr('type', 'number');
                }

                if (card.charAt(0) == '4') {
                    $("#fa-ico").attr('class', 'fa fa-cc-visa');
                    $(".payment-color").css({'background-color': '#000', 'border-color': '#000'});
                    if (card.length >= 19) {
                        $("#card_number_valid").attr('type', 'text');
                        $("#card_number_valid").attr('maxlength', '19');
                    } else {
                        $(".submit-payment").prop('disabled', true);
                        $("#card_number_valid").attr('type', 'number');
                    }

                    if (card.length == 13 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled', false);
                    } else if (card.length == 16 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled', false);
                    } else if (card.length == 19 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled', false);
                    } else if (cvv.length < 3) {
                        $(".submit-payment").prop('disabled', true);
                    }

                } else if (card.substr(0, 2) == '51' || card.substr(0, 2) == '52' || card.substr(0, 2) == '53' || card.substr(0, 2) == '54' || card.substr(0, 2) == '55') {
                    $("#fa-ico").attr('class', 'fa fa-cc-mastercard');
                    $(".payment-color").css({'background-color': '#000', 'border-color': '#000'});
                    if (card.length >= 16) {
                        $("#card_number_valid").attr('type', 'text');
                        $("#card_number_valid").attr('maxlength', '16');
                    } else {
                        $(".submit-payment").prop('disabled', true);
                        $("#card_number_valid").attr('type', 'number');
                    }

                    if (card.length == 16 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled', false);
                    } else if (cvv.length < 3) {
                        $(".submit-payment").prop('disabled', true);
                    }

                } else if (card.substr(0, 2) == '22' || card.substr(0, 2) == '23' || card.substr(0, 2) == '24' || card.substr(0, 2) == '25' || card.substr(0, 2) == '26' || card.substr(0, 2) == '27') {
                    $("#fa-ico").attr('class', 'fa fa-cc-mastercard');
                    $(".payment-color").css({'background-color': '#000', 'border-color': '#000'});
                    if (card.length >= 16) {
                        $("#card_number_valid").attr('type', 'text');
                        $("#card_number_valid").attr('maxlength', '16');
                    } else {
                        $(".submit-payment").prop('disabled', true);
                        $("#card_number_valid").attr('type', 'number');
                    }

                    if (card.length == 16 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled', false);
                    } else if (cvv.length < 3) {
                        $(".submit-payment").prop('disabled', true);
                    }

                } else if (card.substr(0, 4) == '6011' || card.substr(0, 2) == '64' || card.substr(0, 2) == '65') {
                    $("#fa-ico").attr('class', 'fa fa-cc-discover');
                    $(".payment-color").css({'background-color': '#000', 'border-color': '#000'});
                    if (card.length >= 16) {
                        $("#card_number_valid").attr('type', 'text');
                        $("#card_number_valid").attr('maxlength', '16');
                    } else {
                        $(".submit-payment").prop('disabled', true);
                        $("#card_number_valid").attr('type', 'number');
                    }

                    if (card.length == 16 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled', false);
                    } else if (cvv.length < 3) {
                        $(".submit-payment").prop('disabled', true);
                    }

                } else if (card.substr(0, 2) == '34' || card.substr(0, 2) == '37') {
                    $("#fa-ico").attr('class', 'fa fa-cc-amex');
                    $(".payment-color").css({'background-color': '#000', 'border-color': '#000'});
                    if (card.length >= 15) {
                        $("#card_number_valid").attr('type', 'text');
                        $("#card_number_valid").attr('maxlength', '15');
                    } else {
                        $(".submit-payment").prop('disabled', true);
                        $("#card_number_valid").attr('type', 'number');
                    }

                    if (card.length == 15 && cvv.length >= 3) {
                        $(".submit-payment").prop('disabled', false);
                    } else if (cvv.length < 3) {
                        $(".submit-payment").prop('disabled', true);
                    }

                } else {
                    $(".submit-payment").prop('disabled', true);
                    $("#fa-ico").attr('class', 'fa fa-credit-card');
                    $(".payment-color").css({'background-color': '#d3a713', 'border-color': '#d3a713'});
                    if (card.length >= 19) {
                        $("#card_number_valid").attr('type', 'text');
                        $("#card_number_valid").attr('maxlength', '19');
                    } else {
                        $("#card_number_valid").attr('type', 'number');
                    }
                }
            });
        });