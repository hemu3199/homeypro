pipeline {
    agent any
    
        stages { 
            stage("Download Code")
            {
                steps{
                git credentialsId: 'github-homey', url: 'https://github.com/ganjivasu/Homey.git', branch: 'main'
                }
            }
            stage("Build & generate artifact")
            {
                steps {
                    sh 'composer update'
                }


            }
            stage("Deploy"){
                steps{
                    sh 'php *.php'
                }
            }
        }
    }
