<?php
/**
 * Created by PhpStorm.
 * User: josiah
 * Date: 17/09/2018
 * Time: 16:21
 */


@if (session('message'))
    <script>
        $(document).ready(function () {
            //toastr.info('{{Session::get('message')}}');
            swal( {
                    text:'{{Session::get('message')}}',
                    type: 'info',
                    timer: 5000,
                    background: '#ffffff',
                    customClass:'white-text',
                    showCancelButton: false,
                    showConfirmButton: false
                }
            )
        });
    </script>
@endif

@if (session('error'))
    <script>
        $(document).ready(function () {
            //toastr.error('{{Session::get('error')}}');
            swal({
                    text:'{{Session::get('error')}}',
                    type: 'error',
                    timer: 5000,
                    background: '#ffffff',
                    customClass:'white-text',
                    showCancelButton: false,
                    showConfirmButton: false
                }
            )
        });
    </script>
@endif

@if (session('success'))
    <script>
        $(document).ready(function () {
            //toastr.success('{{Session::get('success')}}');
            swal( {
                    text:'{{Session::get('success')}}',
                    type:'success',
                    timer: 5000,
                    background: '#ffffff',
                    customClass:'white-text',
                    showCancelButton: false,
                    showConfirmButton: false
                }
            )
        });
    </script>
@endif

@if (session('warning'))
    <script>
        $(document).ready(function () {
            //toastr.warning('{{Session::get('warning')}}');
            swal( {
                    text:'{{Session::get('warning')}}',
                    type:'warning',
                    timer: 5000,
                    background: '#ffffff',
                    customClass:'white-text',
                    showCancelButton: false,
                    showConfirmButton: false
                }
            )
        });
    </script>
@endif

@if (session('info'))
    <script>
        $(document).ready(function () {
            //toastr.info('{{Session::get('info')}}');
            swal( {
                    text:'{{Session::get('info')}}',
                    type: 'success',
                    timer: 5000,
                    background: '#ffffff',
                    customClass:'white-text',
                    showCancelButton: false,
                    showConfirmButton: false
                }
            )
        });
    </script>
@endif

{{--@if($errors)--}}
{{--@foreach($errors->get('default') as $list)--}}
{{----}}
{{--@endforeach--}}
{{--@endif--}}
