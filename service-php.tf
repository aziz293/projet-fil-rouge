resource "kubernetes_service" "php-service" {
  metadata {
    name = "php-service"
  }

  spec {
    selector = {
      app = "php"
    }

    port {
      protocol = "TCP"
      port = 80
      target_port = 80
    }

    type = "NodePort"
  }
}
