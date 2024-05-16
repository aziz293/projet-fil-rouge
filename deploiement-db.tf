resource "kubernetes_deployment" "db-deployment" {
  metadata {
    name = "db-deployment"
  }

  spec {
    replicas = 1

    selector {
      match_labels = {
        app = "db"
      }
    }

    template {
      metadata {
        labels = {
          app = "db"
        }
      }

      spec {
        container {
          name = "db"
          image = "aziz293/projetbd1"
          port {
            container_port = 3306
          }
          env {
            name = "MYSQL_ROOT_PASSWORD"
            value = "root" # Consider using a more secure way to store passwords (e.g., Secrets)
          }
          env {
            name = "MYSQL_DATABASE"
            value = "profil"
          }
        }
      }
    }
  }
}
