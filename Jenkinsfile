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

        // stage('Deploy to Staging') {
        //     steps {
        //         sh 'ssh server@192.168.56.102 "cd /var/www/html/laravelcicd; \
        //             git pull origin master; \
        //             composer install --no-interaction; \
        //             php artisan migrate --force; \
        //             php artisan cache:clear; \
        //             php artisan config:cache "'
        //     }
        // }


        stage('Deploy') {

            input {
                message "Shall we go ahead?"
                ok "Yes Please."
            }

            steps {
                sh 'ssh server@192.168.56.102 "cd /var/www/html/laravelcicd; \
                    git pull origin main; \
                    composer install --no-interaction --no-dev; \
                    php artisan migrate --force; \
                    php artisan cache:clear; \
                    php artisan config:cache "'
            }
        }
    }
}
