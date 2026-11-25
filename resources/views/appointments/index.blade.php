<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointments</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Segoe UI", Arial, sans-serif; background: #f3f4f6; color: #1f2937; }
        .navbar { background: #2563eb; color: #fff; padding: 16px 32px; font-size: 20px; font-weight: 600; }
        .container { max-width: 960px; margin: 32px auto; padding: 0 16px; }
        .card { background: #fff; border-radius: 10px; padding: 24px; box-shadow: 0 1px 4px rgba(0,0,0,0.08); }
        .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        h1 { margin: 0; font-size: 22px; }
        .btn { display: inline-block; padding: 9px 16px; border: none; border-radius: 6px; font-size: 14px; cursor: pointer; text-decoration: none; color: #fff; background: #2563eb; }
        .btn:hover { opacity: 0.9; }
        .btn-green { background: #16a34a; }
        .btn-red { background: #dc2626; }
        .btn-sm { padding: 6px 12px; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        th { background: #f9fafb; font-size: 13px; text-transform: uppercase; color: #6b7280; }
        tr:hover td { background: #f9fafb; }
        .badge { padding: 4px 10px; border-radius: 999px; font-size: 12px; font-weight: 600; }
        .badge-Pending { background: #fef3c7; color: #92400e; }
        .badge-Confirmed { background: #dbeafe; color: #1e40af; }
        .badge-Completed { background: #dcfce7; color: #166534; }
        .badge-Cancelled { background: #fee2e2; color: #991b1b; }
        .alert-success { background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 6px; margin-bottom: 16px; }
        .empty { text-align: center; color: #6b7280; padding: 24px; }
        .actions form { display: inline; }
    </style>
</head>
<body>
    <div class="navbar">Appointment System</div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Appointments</h1>
                <a href="{{ route('appointments.create') }}" class="btn">+ New Appointment</a>
            </div>

            @if (session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Client Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $a)
                        <tr>
                            <td>{{ $a->user }}</td>
                            <td>{{ $a->client_name }}</td>
                            <td>{{ $a->date }}</td>
                            <td>{{ substr($a->time, 0, 5) }}</td>
                            <td><span class="badge badge-{{ $a->appointment_status }}">{{ $a->appointment_status }}</span></td>
                            <td class="actions">
                                <a href="{{ route('appointments.edit', $a) }}" class="btn btn-green btn-sm">Edit</a>
                                <form action="{{ route('appointments.destroy', $a) }}" method="POST"
                                      onsubmit="return confirm('Delete this appointment?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-red btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="empty">No appointments yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>