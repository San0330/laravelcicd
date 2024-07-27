pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                // echo "building"
                sh 'composer install --no-interaction'
                // sh 'npm install'
                // sh 'npm run dev'

            }
        }
        stage('Test') {
            steps {
                sh './vendor/bin/phpunit'
            }
        }
        stage('Deploy') {
            steps {
                echo "deploying"
            }
        }
    }
}
