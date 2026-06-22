output "resource_group_name" {
  description = "Name of the Azure resource group"
  value       = azurerm_resource_group.main.name
}

output "storage_account_name" {
  description = "Name of the storage account"
  value       = azurerm_storage_account.main.name
}

output "storage_account_url" {
  description = "Primary blob endpoint for resume uploads"
  value       = azurerm_storage_account.main.primary_blob_endpoint
}

output "resumes_container_name" {
  description = "Name of the blob container for resumes"
  value       = azurerm_storage_container.resumes.name
}