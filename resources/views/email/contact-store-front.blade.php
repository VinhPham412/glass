<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo Liên Hệ Mới</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px;
            background-color: #ffffff;
        }
        h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .message {
            background-color: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f1f3f5;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Thông Báo Liên Hệ Mới</h1>
    </div>
    <div class="content">
        <p>Bạn đã nhận được một tin nhắn mới từ biểu mẫu liên hệ:</p>
        <div class="message">
            {!! nl2br(e($emailContent)) !!}
        </div>
        <p><strong>Gửi bởi:</strong> {{ $email }}</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Tên Công Ty Của Bạn. Đã đăng ký bản quyền.</p>
    </div>
</div>
</body>
</html>