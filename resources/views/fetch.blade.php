<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content=" {{csrf_token()}}">
    <meta name="url-base" content="{{url('')}}">
    <title>Document</title>
</head>

<body>
    <button id="POST">POST</button>
    <button id="DELETE">DELETE</button>
</body>
<script>
    let csrf_token = document.querySelector('meta[name="csrf-token"]').content;
    let url_base = document.querySelector('meta[name="url-base"]').content;

    document.getElementById("POST").addEventListener('click', (event) => {
        fetch(url_base + '/product', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf_token
            },
            body: JSON.stringify({
                'name': 'pepino',
                'price': 0.7
            })
        }).
        then(response => response.json()).
        then(data =>{
            console.log(data);
        });
    });

    document.getElementById('DELETE').addEventListener('click', (event)=>{
        fetch(url_base + '/product/1', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf_token
            }
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error(error.message));
    });
</script>

</html>
