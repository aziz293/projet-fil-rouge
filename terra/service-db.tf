resource "kubernetes_service" "mysql-service" {
  metadata {
    name = "mysql"
  }

  spec {
    selector = {
      app = "db"
    }

    port {
      protocol = "TCP"
      port = 3306
      target_port = 3306
    }
  }
}
