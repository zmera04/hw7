<html>
    <head> 
        <title> Input for Posts </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script> 
            $(function(){
                $('#submit').click(function(e){
                    e.preventDefault();
                    const name = $('#name').val();
                    const description = $('#description').val();

                    const data = {
                        name: name,
                        description: description
                    }
                    $.ajax({
                        url: "http://localhost:8888/posts",
                        type: "POST",
                        data: data,
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            $('#name').val('');
                            $('#description').val('');

                            $('#display').html(`
                                <p>${data.name}</p>
                                <p>${data.description}</p>
                            `)
                        },
                        error: function(data){
                            $('#display').html('')
                            $.each(data.responseJSON, function(key, value){
                                $('#display').append(`
                                    <p>${value}</p>
                                `)
                            })
                        }
                    })
                })
            })
        </script>
    </head>

    <body>
        <forms id="postForm">
            <label> Name: </label> </br>
            <input type="text" id="name"> </br>
            <label> Description: </label> </br>
            <input type="text" id="description"> </br>
            <input type="submit" id="submit"> </br>
        </forms>
        <div id="display"> </div>
    </body>
</html>