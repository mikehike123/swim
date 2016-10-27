
@extends('layouts.bootstrap')
@section('pageTitle', 'Skill Cards')
@section('content')
        <div class = 'container'>
            <h1>Card Index</h1>
            <div class="row">
            <form class = 'col s3' method = 'get' action = '{{url("card")}}/create'>
                <button class = 'btn red' type = 'submit'>Create New Card</button>
            </form>
                        </div>
            <table>
                <thead>
                    
                    <th>Card Name</th>       
                    <th>actions</th>
                </thead>
                <tbody>
                    @foreach($cards as $Card)

                    <tr>
                        
                        <td>{{$Card->card_name}}</td>
                        
                        <td>
                            <div class = 'row'>
                                <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/card/{{$Card->id}}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                                <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/card/{{$Card->id}}/edit'><i class = 'material-icons'>edit</i></a>
                                <a href = '#' class = 'viewShow btn-floating orange' data-link = '/skill/{{$Card->id}}/show'><i class = 'material-icons'>info</i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="modal1" class="modal">
            <div class = "row AjaxisModal">
            </div>
        </div>
    
@endsection
