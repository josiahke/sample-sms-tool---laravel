@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Send SMS</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'send.sms','method' => 'post']) !!}

                    {!! Form::token(); !!}

                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone number</label>
                        <input type="tel" class="form-control" id="phone" maxlength="14" minlength="12" placeholder="Enter phone number">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">SMS (<span class="pull-right" id="countchars">0</span>) </label>
                        {{--<input type="tel" class="form-control" id="phone" placeholder="Enter phone number">--}}
                        <textarea name="sms" id="sms" class="form-control" maxlength="160" minlength="1" > </textarea>
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
        var textarea = document.querySelector("textarea");
        textarea.addEventListener("input", function(){
            var maxlength = this.getAttribute("maxlength");
            var currentLength = this.value.length;
            if( currentLength >= maxlength ){
                document.getElementById('countchars').innerHTML("You have reached the maximum number of characters.");
            }else{
                document.getElementById('countchars').innerHTML(maxlength - currentLength + " chars left");
            }
        });
    </script>
@endsection
