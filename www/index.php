<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <img src="http://192.168.60.160/cgi-bin/img-0.cgi?0.802751887136807" />
    <img src="http://192.168.60.160/cgi-bin/img-1.cgi?0.802751887136807" />
    <img src="http://192.168.60.160/cgi-bin/img-2.cgi?0.802751887136807" />
    <script>
        setInterval(() => {
            var checkURLs = [];
            $('img').each(function() {
                $(this).attr('src', $(this).attr('src').split('?')[0] + '?' + Math.random());
            });
            checkURLs.push('cgi-bin/v1/servers/snapshot/0' + '?' + Math.random());
            checkURLs.push('cgi-bin/v1/system/settings/produce' + '?' + Math.random());
            checkURLs.push('cgi-bin/v1/servers/snapshot/99' + '?' + Math.random());
            var address = 'http://192.168.60.160/';
            for (let i = 0; i < checkURLs.length; i++) {
                $.ajax({
                    url: 'proxy.php?address=' + address+'&path='+JSON.stringify([checkURLs[i]]),
                    method: 'GET',
                    success: function(response) {
                        // Handle the response here
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle the error here
                        console.log(error);
                    }
                });
            }
        }, 1000);
    </script>
</body>

</html>