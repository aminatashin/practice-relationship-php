<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div>
    <h1>{{$pdf->title}}</h1>
  </div>
  Created By:
  <h1>{{$pdf->users->name}}</h1>  
<iframe height="400" width="400" src="/assets/{{$pdf->title}}" frameborder="0"></iframe>
<p>
   
    
    
    
</p>
 
</body>
</html>