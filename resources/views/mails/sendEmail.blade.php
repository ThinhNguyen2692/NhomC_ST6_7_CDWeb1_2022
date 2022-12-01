<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Email</title>
</head>
<body>
    <h1>{{$data['title']}}</h1>
    <h3>Thân gửi {{$data['customer_name']}}</h3>
    <h5>Xin cảm ơn khách hàng {{$data['customer_name']}} đã phản hồi</h4>
    <p>Nội dung khách hàng: {{$data['data']}}</p>
    <p>Nhà hàng xin phản hồi: {{$data['reply']}}</p>
    <br>
    <br>
    <br>
    <p>Xin cảm ơn {{$data['customer_name']}}</p>

</body>
</html>