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
                        -Dsonar.host.url=http://192.168.0.21:9000
                    """
                }
            }
        }

        stage('Quality Gate') {
            steps {
                timeout(time: 10, unit: 'MINUTES') {
                    script {
                        def qg = waitForQualityGate()
                        echo "Quality Gate status: ${qg.status}"
                        if (qg.status != 'OK') {
                            echo "Quality Gate failed. Check issues in SonarQube."
                            // No aborta la build para pruebas
                        } else {
                            echo "Quality Gate passed!"
                        }
                    }
                }
            }
        }
    } // cierre de stages
} // cierre de pipeline
