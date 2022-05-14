<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Do this form</h1>
    <form action="/tinker">
      <input type="text" name="searchfor">
      <input type="submit" name="searchbtn" id="searchbtn">
    </form>
  @foreach(Cart::content() as $value)
    {{-- {{ $value->id }} --}}
  @endforeach
</body>
</html>