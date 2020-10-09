<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div>
    category : <select id="category" name="category">
        <option value="0" selected disabled>Select</option>
        @foreach($category as $key => $mycategory)
            <option value="{{$key}}"> {{$mycategory}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    sub : <select id="sub"
                  name="sub"
                  class="form-control selection">
        <option value="0" selected>select sub</option>
    </select>
</div>
<div class="form-group">
    subsub : <select id="subsub"
                     name="subsub"
                     class="form-control selection">
        <option value="0" selected>select subsub</option>
    </select>
</div>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript">
    $("#category").change(function () {
        console.log(1);
        var category = $(this).val();
        if (category) {
            $.ajax({
                type: "GET",
                url: "{{url('get-sub-list')}}?category=" + category,
                success: function (res) {
                    if (res) {
                        $("#sub").empty();
                        $("#sub").append('<option> select sub</option>');
                        $.each(res, function (key, value) {
                            if (value == "null") {
                            } else {
                                $("#sub").append('<option value="' + key + '">' + value + '</option>');
                            }
                        });
                    } else {
                        $("#sub").empty();
                    }
                }
            });
        } else {
            $("#sub").empty();
        }
    });
    $('#sub').change(function () {
        var subID = $(this).val();
        if (subID) {
            $.ajax({
                type: "GET",
                url: "{{url('get-subsub-list')}}?sub=" + subID,
                success: function (res) {
                    if (res) {
                        $("#subsub").empty();
                        $("#subsub").append('<option> select subsub</option>');
                        $.each(res, function (key, value) {
                            if (value == "null") {
                            } else {
                                $("#subsub").append('<option value="' + key + '">' + value + '</option>');
                            }
                        });
                    } else {
                        $("#subsub").empty();
                    }
                }
            });
        } else {
            $("#subsub").empty();
        }
    });
</script>
</body>

</html>
