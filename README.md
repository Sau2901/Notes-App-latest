# 📝 Notes App

A PHP-based Notes Web Application to write, search, and view notes instantly.  
Fully containerized using **Docker** and deployed automatically using **Jenkins CI/CD**.

## 🚀 Features
- Add and display saved notes dynamically.
- Stay on the same page after saving.
- Search existing notes instantly.
- Clean UI with gradient design and animations.

## 🧩 Tech Stack
- Frontend: HTML, CSS
- Backend: PHP
- Containerization: Docker
- CI/CD: Jenkins + GitHub Webhook
- Version Control: Git & GitHub

## 🐳 Docker Commands
```bash
docker build -t notes-app .
docker run -d -p 8080:80 notes-app
```

## ⚙️ Jenkins CI/CD Pipeline
1. Pulls latest code from GitHub  
2. Builds Docker image  
3. Pushes to DockerHub  
4. Deploys container automatically

## 📂 Folder Structure
```
Notes-App/
├── index.php
├── save.php
├── Dockerfile
├── Jenkinsfile
├── README.md
└── /data/
    └── notes.txt
```

## 👨‍💻 Author
Developed with ❤️ by Saurav Kumar

