    <?php 
$origin = $_SERVER['HTTP_ORIGIN'];
$allowed_domains = [
    'https://www.instagram.com',
    'https://*.fbcdn.net',
    'https://*.instagram.com',
    'https://*.cdninstagram.com',
    'https://*.facebook.com',
    'https: //*.fbsbx.com'
];

if (in_array($origin, $allowed_domains)) {
    header('Access-Control-Allow-Origin: ' . $origin);
}

 ?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$.ajax({
    url: "https://instagram.com/oguzhanahiskali/?__a=1",
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
        'Cookie': 'csrftoken=TWASYkuhth8Vxxqxz5O6M8cT9HBInlGB; ig_did=398DEDF5-CB7B-4FF9-8A42-D870F53C7BB6; ig_nrcb=1; mid=YLIBXQAEAAFH4pgdZutOHznR1YZr',
        'User-Agent': 'PostmanRuntime/7.28.0'
    },
    crossDomain: true,

    type: "GET", /* or type:"GET" or type:"PUT" */
    dataType: "jsonp",

    data: function (r){
        console.log(r);
    },
    success: function (result) {
        console.log(result);
    },
    error: function () {
        console.log("error");
    }
});

</script>
</head>
    