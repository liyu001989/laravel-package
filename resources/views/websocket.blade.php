<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        <div>WebSocket 测试页面，打开调试工具查看</div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
        <script type="text/javascript">

            const socket = io('ws://package.test', {
                transports: ['websocket'],
            });

            socket.on('connect', function(){
                socket.emit('test', 'test message');

                // 接受普通消息
                socket.on('message', function (res) {
                    console.log(res);
                });
            });
        </script>
    </body>
</html>