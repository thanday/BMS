<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        /* Style the header */
        header {
            background-color: rgb(45, 81, 245);
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: white;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <header>
        <h1>Public Service Media</h1>
        <h2>Broadcast Management System (BMS)</h2>
        
    </header>
    <h2>All Events</h2>

    <table>
        <tr>
            <th>Reference Num</th>
            <th>Date</th>
            <th>Event Name</th>
            <th>Event Type</th>
            <th>Venue</th>
            <th>PSM Channels</th>
            <th>Local Channels</th>
            <th>Duation (Minutes)</th>


        </tr>
        @foreach ($events as $event)
            <tr>
                <td>{{ $event->refnum }}</td>
                <td>{{ $event->event_date }}</td>
                <td>{{ $event->event_name }}</td>
                <td>{{ $event->type }}</td>
                <td>{{ $event->venue }}</td>
                <td>@foreach ($event->psmtvchannel as $psm)
                    {{ $psm->name }}
                    @endforeach             
                </td>
                <td>@foreach ($event->tvchannel as $local)
                    {{ $local->name }}
                    @endforeach             
                </td>
                <td>{{ intval(strtotime(date($event->live_end_time)) - strtotime($event->live_start_time)) / 60 }}</td>


            </tr>
        @endforeach

    </table>

</body>

</html>
