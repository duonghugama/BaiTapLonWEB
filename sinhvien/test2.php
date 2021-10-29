<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button id="btnTest2" class="btn btn-info"></button>
<script src='<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>'></script>
<script>
  $("#btnTest2").click(function() {
    var id = "MinhHN";
    $.ajax({
      type: 'POST',
      url: './test.php',
      data: {
        data: id
      },
      // dataType:('html', 'text', 'json', 'xml'),
      success: function(data) {
          alert(data);
      },
      error: function() {
        alert('Lỗi');
      }
    });
  });
</script>
</body>
</html>