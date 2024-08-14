<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raph's Asistant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="height: 598px;">
            <div class="col-md-2" style="background-color: #575550;">
                <div class="row" style="height: 50px;">
                    <div class="col-md-6">
                        <div class="col-md-6 d-flex justify-content-center align-items-center" style="height: 100%;">
                            <button type="button" class="btn btn-outline-secondary"
                                style="border: none; box-shadow: none;">
                                <img src="{{ asset('images/back.png') }}" alt="" width="30px" height="30px"
                                    style="border-radius: 100px; -moz-border-radius: 300px;">
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6 d-flex justify-content-center align-items-center" style="height: 100%;">
                            <p style="font-size:20px; color:#cfcdcd">Raph's Assistant</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 d-flex flex-column" style="background-color: #201f1e;">
                <br>
                <div id="content-box">

                </div>
                <div class="container w-100 px-3 py-2 d-flex mt-auto" style="background:#cfcdcd; height:62px;">
                    <div class="mr-2 pl-2"
                        style="background:#7d7b7b; width: calc(100% -  55px); border-radius: 5px; display: inline-flex; align-items: center;">
                        <input type="text" id="input" class="text-white" name="input"
                            style="background: none; width: 100%; height: 100%; border: 0; outline: none;">
                    </div>
                    <div id="button-submit" class="text-center d-flex justify-content-center align-items-center"
                        style="background: #ffffff; height: 100%; width: 50px; border-radius: 5px; margin-left: 5px;">
                        <img src="{{ asset('images/send.png') }}" alt="" width="15px" height="15px">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('#button-submit').on('click', function() {
        $value = $('#input').val();
        $('#content-box').append(`
            <div class="mb-2">
                        <div class="float-right px-3 py-2" style="width: 270px; background:#cfcdcd; border-radius : 10px; float:right; font-size: 85%;">
                            ` + $value + `
                        </div>
                        <div style="clear:both;"></div>
                    </div>
        `);
        

        $.ajax({
            type: 'post',
            url:'{{ url('send') }}',
            data:{
                'input': $value
            },
            success: function(data){
                $('#content-box').append(`
                <div class="d-flex mb-2">
                    <div class="text-white px-3 py-2"
                        style="width:270px; background-color: #575550; border-radius:10px; font-size:85%;">
                        `+data+`
                    </div>
                </div>
                `)
                $value = $('#input').val('');
            }
        })
    })
</script>
