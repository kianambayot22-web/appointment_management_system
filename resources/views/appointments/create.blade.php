<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Appointment</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Segoe UI", Arial, sans-serif; background: #f3f4f6; color: #1f2937; }
        .navbar { background: #2563eb; color: #fff; padding: 16px 32px; font-size: 20px; font-weight: 600; }
        .container { max-width: 560px; margin: 32px auto; padding: 0 16px; }
        .card { background: #fff; border-radius: 10px; padding: 24px; box-shadow: 0 1px 4px rgba(0,0,0,0.08); }
        h1 { margin: 0 0 20px; font-size: 22px; }
        .btn { display: inline-block; padding: 9px 16px; border: none; border-radius: 6px; font-size: 14px; cursor: pointer; text-decoration: none; color: #fff; background: #2563eb; }
        .btn:hover { opacity: 0.9; }
        .btn-gray { background: #6b7280; }
        .alert-error { background: #fee2e2; color: #991b1b; padding: 12px 16px; border-radius: 6px; margin-bottom: 16px; }
        .alert-error ul { margin: 0; padding-left: 18px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 6px; font-size: 14px; font-weight: 600; }
        input, select { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; }
        input:focus, select:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.15); }
        .form-actions { display: flex; gap: 10px; margin-top: 8px; }
    </style>
</head>
<body>
    <div class="navbar">Appointment System</div>

    <div class="container">
        <div class="card">
            <h1>New Appointment</h1>

            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>User</label>
                    <input type="text" name="user" value="{{ old('user') }}">
                </div>
                <div class="form-group">
                    <label>Client Name</label>
                    <input type="text" name="client_name" value="{{ old('client_name') }}">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" value="{{ old('date') }}">
                </div>
                <div class="form-group">
                    <label>Time</label>
                    <input type="time" name="time" value="{{ old('time') }}">
                </div>
                <div class="form-group">
                    <label>Appointment Status</label>
                    <select name="appointment_status">
                        @foreach (['Pending', 'Confirmed', 'Completed', 'Cancelled'] as $status)
                            <option value="{{ $status }}" {{ old('appointment_status', 'Pending') === $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Save</button>
                    <a href="{{ route('appointments.index') }}" class="btn btn-gray">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>