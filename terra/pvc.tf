resource "kubernetes_persistent_volume_claim" "mysql-db-pvc" {
  metadata {
    name = "mysql-db-pvc"
  }

  spec {
    access_modes = ["ReadWriteOnce"]
    resources {
      requests = {
        storage = "1Gi"
      }
    }
  }
}
