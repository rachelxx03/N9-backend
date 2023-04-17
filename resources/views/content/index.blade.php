
@extends('master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 align="center">Student Data</h3>
            <br />
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
            @endif
            <div align="right">
                <br />
                <br />
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>

                </tr>
                @foreach($contents as $row)
                    <tr>
                        <td>{{$row['title']}}</td>
                        <td>{{$row['subtitle']}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
