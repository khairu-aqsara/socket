<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Client WS</title>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script>
            $(function(){
                var conn = new WebSocket('ws://localhost:8080');
                conn.onopen = function(e) {
                    console.log(e);
                    $("#status").html("Connection established!");
                };

                conn.onmessage = function(e) {
                    console.log(e.data);
                    msg(e.data);
                };

                $("#send").click(function(){
                    var text = $("#text").val();
                    conn.send(text);
                    msg(text);
                    $("#text").val("").focus();
                });

                function msg(msg){
                    $("#msg").append("<pre>"+msg+"</pre>");
                }
            })

        </script>
    </head>
    <body>
        <pre id="status"></pre>
        <div id="msg">

        </div>
        <input type="text" id="text"/><button id="send">Send</button>
    </body>
</html>
