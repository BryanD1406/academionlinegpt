<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>El curso <strong>{{ $curso->title }}</strong> ha sido rechazado</p>
    <p>{!!$curso->observation->body!!}</p>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio aperiam quae unde at voluptatem nisi ipsa
        consectetur commodi dolore rem id magni perferendis consequuntur quia autem natus blanditiis, debitis facere!
    </p>
</body>

</html>
