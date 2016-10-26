
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Swimmer</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Swimmer</h1>
            <form method = 'get' action = '{{url("swimmer")}}'>
                <button class = 'btn blue'>Swimmer Index</button>
            </form>
            <table class = 'highlight bordered'>
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                </thead>
                <tbody>

                    
                    <tr>
                        <td>
                            <b><i>FirstName : </i></b>
                        </td>
                        <td>{{$swimmer->FirstName}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>LastName : </i></b>
                        </td>
                        <td>{{$swimmer->LastName}}</td>
                    </tr>
                    

                        
                </tbody>
            </table>
        </div>
    </body>
    <script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</html>
