<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Título hipotético</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function showFeedback(message) {
            alert(message);
        }
        const urlParams = new URLSearchParams(window.location.search);
        const feedback = urlParams.get("feedback");
        if (feedback) {
            showFeedback(feedback)
        }
    </script>
</head>