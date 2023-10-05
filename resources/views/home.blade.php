<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{asset('assets/stepper/stepper.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
</head>
<body>

    <div class="container">
        <div class="progress-container">
          <div class="progress" id="progress"></div>
          <div class="circle active">1</div>
          <div class="circle">2</div>
          <div class="circle">3</div>
          <div class="circle">4</div>
        </div>
        <form id="form-step-1">
            <input type="text" placeholder="Step 1 Input">
          </form>
        
          <form id="form-step-2" style="display: none;">
            <input type="text" placeholder="Step 2 Input">
          </form>
        
          <form id="form-step-3" style="display: none;">
            <input type="text" placeholder="Step 3 Input">
          </form>
        
          <form id="form-step-4" style="display: none;">
            <input type="text" placeholder="Step 4 Input">
          </form>
        <button class="btn" id="prev" style="display: none;">Prev</button>
        <button class="btn" id="next" style="display: none;">Next</button>
        <button class="btn" id="submit" style="display: none;">Submit</button>
    </div>
    
    
 <script src="{{asset('assets/stepper/stepper.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>