<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Template</title>
</head>
<body>
    <h2>Brisbane grocery order details</h2>
    <p>
        Username: {{ $data['name'] }} <br>
        Country: {{ $data['country'] }} <br>
        Address: {{ $data['address'] }} <br>
        Apartment: {{ $data['apartment'] }} <br>
        State: {{ $data['state'] }} <br>
        Postal code: {{ $data['postal_code'] }} <br>
        Email: {{ $data['email'] }} <br>
        Phone: {{ $data['phone'] }} <br>
        <!--Product: {{ $carts[0]->product->name }}-->
    </p>
    <!--<table class="table table-borderless table-striped table-earning">-->
    <!--    <thead>-->
    <!--        <tr>-->
    <!--            <th>Country</th>-->
    <!--            <th>Username</th>-->
    <!--            <th>Address</th>-->
    <!--            <th>Apartment</th>-->
    <!--            <th>State</th>-->
    <!--            <th>Postal Code</th>-->
    <!--            <th>Email</th>-->
    <!--            <th>Phone</th>-->
    <!--        </tr>-->
    <!--    </thead>-->
    <!--    <tbody>-->
    <!--        <tr>-->
    <!--            <td> {{ $data['country'] }} </td>-->
    <!--            <td> {{ $data['name'] }} </td>-->
    <!--            <td> {{ $data['address'] }} </td>-->
    <!--            <td> {{ $data['apartment'] }} </td>-->
    <!--            <td> {{ $data['state'] }} </td>-->
    <!--            <td> {{ $data['postal_code'] }} </td>-->
    <!--            <td> {{ $data['email'] }} </td>-->
    <!--            <td> {{ $data['phone'] }} </td>-->
    <!--        </tr>-->
    <!--    </tbody>-->
    <!--</table>-->
    <h1>
        Thank you for shopping with us!
    </h1>
</body>
</html>
