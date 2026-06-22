terraform {
  required_providers {
    azurerm = {
      source  = "hashicorp/azurerm"
      version = "~> 3.85"
    }
    random = {
      source  = "hashicorp/random"
      version = "~> 3.6"
    }
  }
}

provider "azurerm" {
  features {}
}

resource "azurerm_resource_group" "main" {
  name     = "rg-${var.project_name}-${var.environment}"
  location = var.location
}
resource "random_string" "storage_suffix" {
  length  = 6
  special = false
  upper   = false
}
resource "azurerm_storage_account" "main" {
  name                     = "${var.project_name_safe}${random_string.storage_suffix.result}"
  resource_group_name      = azurerm_resource_group.main.name
  location                 = azurerm_resource_group.main.location
  account_tier             = "Standard"
  account_replication_type = "LRS"

  tags = {
    environment = var.environment
    project     = var.project_name
  }
}
resource "azurerm_storage_container" "resumes" {
  name                  = "resumes"
  storage_account_name  = azurerm_storage_account.main.name
  container_access_type = "private"
}
# NOTE: Azure MySQL Flexible Server requires regional capacity approval
# Uncomment when subscription capacity is available
# resource "azurerm_mysql_flexible_server" "main" {
#   name                   = "mysql-${var.project_name}-${var.environment}-${random_string.storage_suffix.result}"
#   resource_group_name    = azurerm_resource_group.main.name
#   location               = var.mysql_location
#   administrator_login    = var.mysql_admin_username
#   administrator_password = var.mysql_admin_password
#   sku_name               = "B_Standard_B1ms"
#   version                = "8.0.21"
#   backup_retention_days        = 7
#   geo_redundant_backup_enabled = false
#   tags = {
#     environment = var.environment
#     project     = var.project_name
#   }
# }

# resource "azurerm_mysql_flexible_server_firewall_rule" "allow_azure" {
#   name                = "allow-azure-services"
#   resource_group_name = azurerm_resource_group.main.name
#   server_name         = azurerm_mysql_flexible_server.main.name
#   start_ip_address    = "0.0.0.0"
#   end_ip_address      = "0.0.0.0"
# }