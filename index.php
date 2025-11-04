<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DevOps Batch 20 Notes App</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        header {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            background: rgba(255,255,255,0.15);
            padding: 12px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            transition: 0.3s;
        }

        nav a:hover {
            color: #ffc107;
            transform: scale(1.1);
        }

        .container {
            max-width: 900px;
            background: #fff;
            margin: 30px auto;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        h1 {
            text-align: center;
            color: #0d6efd;
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        h2 {
            color: #0d6efd;
            margin-bottom: 15px;
        }

        p {
            color: #333;
            font-size: 16px;
            line-height: 1.6;
        }

        textarea {
            padding: 14px;
            border: 2px solid #0d6efd;
            border-radius: 10px;
            font-size: 15px;
            resize: vertical;
            min-height: 120px;
            margin-bottom: 14px;
            width: 100%;
        }

        button {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: linear-gradient(135deg, #6610f2, #0d6efd);
        }

        .notes-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 12px;
            border: 1px solid #ddd;
            max-height: 300px;
            overflow-y: auto;
        }

        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            color: #222;
        }

        .footer {
            text-align: center;
            margin: 20px 0;
            color: white;
            font-size: 14px;
        }

        .footer span {
            color: #ffc107;
        }

        .hidden {
            display: none;
        }
    </style>

    <script>
        function showPage(pageId) {
            const pages = document.querySelectorAll('.page');
            pages.forEach(p => p.classList.add('hidden'));
            document.getElementById(pageId).classList.remove('hidden');
        }
    </script>
</head>

<body>
    <header>
        <h1>DevOps Batch 20 Notes App</h1>
    </header>

    <nav>
        <a href="#" onclick="showPage('home')">Home</a>
        <a href="#" onclick="showPage('notes')">Notes</a>
        <a href="#" onclick="showPage('resources')">Resources</a>
        <a href="#" onclick="showPage('about')">About</a>
        <a href="#" onclick="showPage('contact')">Contact</a>
    </nav>

    <div class="container">

        <!-- Home Page -->
        <div id="home" class="page">
            <h2>Welcome!</h2>
            <p>This Notes App is designed for <b>DevOps Batch 20</b> by <b>Saurav Kumar</b>.  
               You can save your learning notes, explore DevOps resources, and know more about this project.</p>
        </div>

        <!-- Notes Page -->
        <div id="notes" class="page hidden">
            <h2>Write Your DevOps Notes</h2>
            <form action="save.php" method="post">
                <textarea name="note" placeholder="Write your DevOps notes here..."></textarea><br>
                <button type="submit">💾 Save Note</button>
            </form>

            <h2>Saved Notes:</h2>
            <div class="notes-box">
                <pre>
<?php
if (file_exists("/data/notes.txt")) {
    echo file_get_contents("/data/notes.txt");
} else {
    echo "No notes yet. Start writing your first DevOps note!";
}
?>
                </pre>
            </div>
        </div>

        <!-- Resources Page -->
        <div id="resources" class="page hidden">
            <h2>DevOps Resources</h2>
            <ul>
                <li><a href="https://www.docker.com/" target="_blank">Docker Official Site</a></li>
                <li><a href="https://kubernetes.io/" target="_blank">Kubernetes Docs</a></li>
                <li><a href="https://docs.github.com/en/actions" target="_blank">GitHub Actions</a></li>
                <li><a href="https://aws.amazon.com/devops/" target="_blank">AWS DevOps</a></li>
                <li><a href="https://www.jenkins.io/doc/" target="_blank">Jenkins Documentation</a></li>
            </ul>
        </div>

        <!-- About Page -->
        <div id="about" class="page hidden">
            <h2>About This App</h2>
            <p>This project was developed by <b>Saurav Kumar</b> (Batch 20) as part of DevOps learning at Haldia Institute of Technology.</p>
            <p>It demonstrates basic PHP file handling, web UI design, and DevOps workflow for deployment automation.</p>
        </div>

        <!-- Contact Page -->
        <div id="contact" class="page hidden">
            <h2>Contact</h2>
            <p>For queries or suggestions, reach out:</p>
            <p><b>Email:</b> saurav.devops20@example.com</p>
            <p><b>GitHub:</b> <a href="https://github.com/Sau2901" target="_blank">github.com/Sau2901</a></p>
        </div>
    </div>

    <div class="footer">
        Made with ❤️ by <span>Saurav Kumar (DevOps Batch 20)</span>
    </div>
</body>
</html>

