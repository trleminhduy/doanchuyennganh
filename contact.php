<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .about-container,
        .contact-container {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .contact-form label {
            display: block;
            margin-bottom: 8px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .contact-form button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="about-container">
        <h2>Về chúng tôi</h2>
        <p>
            Chào mừng bạn đến với cửa hàng của chúng tôi. Chúng tôi là một đội ngũ chuyên nghiệp đầy nhiệt huyết,
            cam kết mang lại trải nghiệm tốt nhất cho khách hàng.
        </p>
    </div>

    <div class="contact-container">
        <h2>Liên hệ với chúng tôi</h2>
        <form class="contact-form" action="#" method="post">
            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Lời nhắn:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Gửi</button>
            <a href="index.php">Quay về trang chủ</a>
        </form>
    </div>

</body>

</html>