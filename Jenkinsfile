pipeline {
    agent any  
    stages {
        stage("test") {
            steps {
                echo "hello world"
            }
        }
        stage("build") {
            steps {
                sh 'docker --version'
                //sh "docker-compose up -d --build"
            }
        }
        stage('Terraform Init') {
            steps {
                
               // sh 'cd /Users/bug_as_a_service/.jenkins/workspace/g3/terra/'
              /*  terraformInit()
                terraformPlan()
                terraformApply()
                terraformDestroy()*/
                sh 'terraform init'
                sh 'terraform plan'
                sh 'echo "yes" | terraform apply -auto-approve'
            }
        }
       /* stage("deploy to Kubernetes") {
            steps {
                withCredentials([file(credentialsId: 'testkubernetes', variable: 'KUBECONFIG')]) {
                    script {
                        // Déployer sur Kubernetes
                        sh "kubectl apply -f kubernetes/bd-deployer.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                        sh "kubectl apply -f kubernetes/bd-service.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                        sh "kubectl apply -f kubernetes/php-deployer.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                        sh "kubectl apply -f kubernetes/php-service.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                    }
                }
            }
        }*/
    }
    post {
        success {
            emailext (
                subject: "Notification de build Jenkins - Succès",
                body: "Le build de votre pipeline Jenkins s'est terminé avec succès.",
                to: "elhadji1.diagne@uadb.edu.sn",
            )
        }
        failure {
            emailext (
                subject: "Notification de build Jenkins - Échec",
                body: "Le build de votre pipeline Jenkins a échoué.",
                to: "elhadji1.diagne@uadb.edu.sn",
            )
        }
    }
}
