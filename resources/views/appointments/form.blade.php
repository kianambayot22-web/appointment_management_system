@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<p>
    <label>User</label><br>
    <input type="text" name="user" value="{{ old('user', $appointment->user ?? '') }}">
</p>
<p>
    <label>Client Name</label><br>
    <input type="text" name="client_name" value="{{ old('client_name', $appointment->client_name ?? '') }}">
</p>
<p>
    <label>Date</label><br>
    <input type="date" name="date" value="{{ old('date', $appointment->date ?? '') }}">
</p>
<p>
    <label>Time</label><br>
    <input type="time" name="time" value="{{ old('time', isset($appointment) ? substr($appointment->time, 0, 5) : '') }}">
</p>
<p>
    <label>Appointment Status</label><br>
    @php $currentStatus = old('appointment_status', $appointment->appointment_status ?? 'Pending'); @endphp
    <select name="appointment_status">
        @foreach (['Pending', 'Confirmed', 'Completed', 'Cancelled'] as $status)
            <option value="{{ $status }}" {{ $currentStatus === $status ? 'selected' : '' }}>{{ $status }}</option>
        @endforeach
    </select>
</p>