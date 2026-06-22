variable "project_name" {
  description = "Prefix used for naming all Azure resources"
  type        = string
  default     = "career-nav"
}

variable "location" {
  description = "Azure region where resources will be created"
  type        = string
  default     = "East US"
}

variable "environment" {
  description = "Deployment environment (dev, staging, prod)"
  type        = string
  default     = "dev"
}

variable "mysql_admin_username" {
  description = "Admin username for the MySQL database"
  type        = string
  default     = "navadmin"
}

variable "mysql_admin_password" {
  description = "Admin password for the MySQL database"
  type        = string
  sensitive   = true
}
variable "project_name_safe" {
  description = "Project name without hyphens, for resources that don't allow them (e.g. storage account)"
  type        = string
  default     = "careernav"
}