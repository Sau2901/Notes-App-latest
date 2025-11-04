pipeline {
    agent { label "dev" }
    
    environment {
        IMAGE_NAME = "notes-app:latest"
        CONTAINER_NAME = "notes-app-container"
        PORT = "9092"
        HOST = "13.202.13.75"
        DOCKER_USER = "sau2901"
    }
    
    stages {
        stage("Checkout") {
            steps {
                git branch: "main", url: "https://github.com/Sau2901/Notes-App-latest.git"
            }
        }

        stage("Build Docker Image") {
            steps {
                sh '''
                echo "======Building Docker Image======"
                docker build -t $IMAGE_NAME .
                '''
            }
        }  

        stage('Push to Docker Hub') {
            steps {
                withCredentials([usernamePassword(
                    credentialsId: 'Docker_Hub_id_Pwd',
                    usernameVariable: 'DOCKER_USER',
                    passwordVariable: 'DOCKER_PASS'
                )]) {
                    sh '''
                    echo "==========Logging in to Docker Hub====="
                    echo $DOCKER_PASS | docker login -u $DOCKER_USER --password-stdin

                    echo "====Tagging Image====="
                    docker tag $IMAGE_NAME $DOCKER_USER/$IMAGE_NAME

                    echo "====Pushing image to docker hub===="
                    docker push $DOCKER_USER/$IMAGE_NAME
                    '''
                }
            }
        }

        stage("Stop Old Containers") {
            steps {
                sh '''
                echo "=====Stopping old container(if any)===="
                docker stop $CONTAINER_NAME || true
                docker rm $CONTAINER_NAME || true
                '''
            }
        }

        stage("Run Container") {
            steps {
                sh '''
                echo "=====Running Container===="
                docker run -d --name $CONTAINER_NAME -p $PORT:80 $IMAGE_NAME
                '''
            }
        }

        stage("Verify") {
            steps {
                sh '''
                echo "=====Checking app response====="
                sleep 10
                curl -s http://$HOST:$PORT | head -n 20
                '''
            }
        }
    }

    post {
        success {
            echo "Notes-app deployed successfully: http://${HOST}:${PORT}"
        }
        failure {
            echo "Build or deploy failed. Check logs."
        }
    }
}
