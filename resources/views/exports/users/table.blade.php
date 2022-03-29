<table class="table table-striped">
    <thead>
    <tr>
        <th>Entry ID</th>
        <th>Entry Date</th>
        <th>Spin Date</th>
        <th>Barcode</th>
        <th>Invoice Number</th>
        <th>IP address</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Mobile Number</th>
        <th>Outcome</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->outcome ? $user->outcome->created_at : null }}</td>
            <td>{{ $user->barcode }}</td>
            <td>{{ $user->invoice }}</td>
            <td>{{ $user->ip_address }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->status_text }}</td>
        </tr>
    @endforeach
    </tbody>
</table>