<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
    <title>Document</title>
</head>
<body>
    <center>
    <h1>Moonawa</h1>
    <input type="text" id="moonawa">
    <button type="button" id="btnresult">click</button>
    </center>
    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    <script>
        $('#btnresult').on('click', function () {
            console.log("btn click");
            var data = $('#moonawa').val();
            console.log(data);
        
        if(data=='mina'){
            Swal.fire({
                title: 'it\'s mina',
                type: 'success',
                showCloseButton: true             
            })
        }
        else if(data=='raja'){
            Swal.fire({
                title: 'it\'s raja',
                type: 'warning',
                showCloseButton: true
              
                })
        } 
        else{
            Swal.fire({
                title: 'it\'s moon',
                type: 'info',
                showCloseButton: true
              
                })
        }

    })
    </script>
    </body>
</html>