@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Send SMS</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'send.sms','method' => 'post']) !!}

                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone number</label>
                        <input type="tel" class="form-control" id="phone" maxlength="14" minlength="10" placeholder="Enter phone number">
                        <span id="valid-msg" class="hide">✓ Valid</span>
                        <span id="error-msg" class="hide">Invalid number</span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">SMS (<span class="pull-right" id="countchars">0</span>) </label>
                        <textarea name="sms" id="sms" class="form-control" maxlength="160" minlength="5" > </textarea>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sms Sent</div>
                <div class="card-body">

                    <table class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sms</th>
                                <th>Status</th>
                                <th>Sent by</th>
                                <th>Sent at</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection


@section('js')
    <script >
        $('#sms').on("input", function(){
            var maxlength = $(this).attr("maxlength");
            var currentLength = $(this).val().length;

            if( currentLength >= maxlength ){
                $('#countchars').html("You have reached the maximum number of characters.");
                //console.log("You have reached the maximum number of characters.");
            }else{
                $('#countchars').html(maxlength - currentLength + " chars left");
                //console.log(maxlength - currentLength + " chars left");
            }
        });

        $("#phone").intlTelInput({
            initialCountry: "auto",
            hiddenInput: "full_phone",
            geoIpLookup: function(callback) {
                //$.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                    var countryCode = "KE"
                    callback(countryCode);
                //});
            },
            utilsScript: "{{asset("js/utils.js")}}" // just for formatting/placeholders etc
        });

        var telInput = $("#phone"),
            errorMsg = $("#error-msg"),
            validMsg = $("#valid-msg");

        // initialise plugin
        telInput.intlTelInput({
            utilsScript: "{{asset("js/utils.js")}}"
        });

        var reset = function() {
            telInput.removeClass("error");
            errorMsg.addClass("hide");
            validMsg.addClass("hide");
        };

        // on blur: validate
        telInput.blur(function() {
            reset();
            if ($.trim(telInput.val())) {
                if (telInput.intlTelInput("isValidNumber")) {
                    validMsg.removeClass("hide");
                } else {
                    telInput.addClass("error");
                    errorMsg.removeClass("hide");
                }
            }
        });
        // on keyup / change flag: reset
        telInput.on("keyup change", reset);

    </script>
@endsection
