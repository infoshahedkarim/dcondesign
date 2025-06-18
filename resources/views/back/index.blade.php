@extends('layouts.master')
@section('title')
Welcome | VaraBikroy | {{Auth::user()->name}}
@endsection
@section('page-title')

@endsection
@section('body')

<body>
    @endsection
    @section('content')

    <div>
        <h1>Welcome to Varabikroy.com Backend</h1>
        <div id="datetime" style="
            font-family: 'Segoe UI', sans-serif;
            background-color: #f3f4f6;
            color: #111827;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            font-size: 18px;
            margin-top: 20px;">
        </div>
    </div>

    <script>
        function updateDateTime() {
            const now = new Date();

            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            };

            const formattedDateTime = now.toLocaleString('en-US', options);
            document.getElementById('datetime').innerHTML = formattedDateTime;
        }

        // Update every second
        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>

    @endsection