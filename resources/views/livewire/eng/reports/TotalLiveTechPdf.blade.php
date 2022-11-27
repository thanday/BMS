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
            background-color: #666;
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
    <h2>Total number of Event Technician Attended</h2>

    <table>
        <tr>
            <th>Technician Name</th>
            <th>Total</th>
        </tr>
        @foreach ($tech_lives as $user)
            <tr>

                <td>{{ $user->name }}</td>
                <td>{{ $user->events_live_tech_count }}</td>

            </tr>
        @endforeach

    </table>

</body>

</html>
