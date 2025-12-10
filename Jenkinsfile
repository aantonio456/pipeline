pipeline {
    agent any

    environment {
        SONAR_SCANNER = tool 'sonar-scanner'
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main',
                    url: 'https://github.com/aantonio456/pipeline.git'
            }
        }

        stage('SonarQube Analysis') {
            steps {
                withSonarQubeEnv('SonarQube') {
                    sh """
                        ${SONAR_SCANNER}/bin/sonar-scanner \
                        -Dsonar.projectKey=pipeline-vulnerable \
                        -Dsonar.sources=. \
                        -Dsonar.php.exclusions=vendor/** \
                        -Dsonar.host.url=http://localhost:9000
                    """
                }
            }
        }

        stage('Quality Gate') {
            steps {
                timeout(time: 15, unit: 'MINUTES') {
                    script {
                        // Espera 15 segundos para que SonarQube procese el análisis
                        echo "Waiting 15 seconds for SonarQube to finish processing..."
                        sleep(time: 15, unit: 'SECONDS')

                        def qg = waitForQualityGate()
                        echo "Quality Gate status: ${qg.status}"

                        if (qg.status != 'OK') {
                            echo "Quality Gate failed. Revisa los problemas en SonarQube."
                        } else {
                            echo "Quality Gate passed!"
                        }
                    }
                }
            }
        }
    }
}

