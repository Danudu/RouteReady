
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Example</title>
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .content2 {
            padding: 20px;
        }
    </style>
</head>

<body>
    <li id="showPopup">Show Popup</li>

    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" id="close">&times;</span>
            <div class="content2">
                <div>
                    <h1>Terms & Conditions</h1>
                    <!-- PHP echo statement for last updated date -->
                    <p>Last Updated on <?php echo $data['lastdate']; ?></p>
                </div>
                <?php foreach ($data['posts'] as $post): ?>
                    <ul>
                        <li>
                            <h4><?php echo $post->title; ?></h4>
                            <p><?php echo $post->body; ?></p>
                        </li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('showPopup').addEventListener('click', function () {
        console.log("Show popup clicked"); // Debug statement
        // Show the popup
        document.getElementById('popup').style.display = 'block';
    });

    document.getElementById('close').addEventListener('click', function () {
        console.log("Close button clicked"); // Debug statement
        // Close the popup
        document.getElementById('popup').style.display = 'none';
    });
</script>
</body>

</html>