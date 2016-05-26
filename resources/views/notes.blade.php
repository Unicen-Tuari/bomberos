<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Notes</h2>
    <ul>
      @foreach ($notes as $note)
      <li>
        {{$note->note}}
      </li>
      @endforeach
    </ul>
  </body>
</html>
